<?php
include 'template_start.php';

if ($_SESSION['id_user'] == 0) {
    echo "Вы не авторизованы";
    die();
}

if (isset($_POST['delete'])) {
    $arr = $_SESSION['pocket'];

    $ind = -1;
    for ($i = 0; $i <= count($arr) + 2; $i++) {
        //echo "Session $i :" . $arr[$i] . " Sended" . $_POST['delete'];
        if ($arr[$i] == $_POST['delete'])
            $ind = $i;
    }

    if ($ind != -1)
        unset($arr[$ind]);

    if (count($arr) == 0)
        $_SESSION['pocket'] = null;
    else
        $_SESSION['pocket'] = $arr;
}

if(isset($_POST["clear"]))
    $_SESSION['pocket'] = null;

if (isset($_POST["zakaz"]) && isset($_SESSION['pocket'])) {
    $arr = $_SESSION['pocket'];

    $ids = "";
    $comma = false;
    foreach ($arr as $a) {
        if ($comma) $ids .= " ,";
        else $comma = true;

        $ids .= $a;
    }

    $userId = $_SESSION['id_user'];
    $sql = "INSERT INTO `заказы`(`пользователь`, `техника`) VALUES ( $userId , '$ids');";
    mysql_query($sql);
    $_SESSION['pocket'] = null;
}

?>

<table class="list">
    <tr>
        <th>Фото</th>
        <th>Марка</th>
        <th>Модель</th>
        <th>Цена</th>
        <th>Удалить</th>
    </tr>

    <?php

    $av_price = 0;

    if (isset($_SESSION['pocket'])) {

        $arr = $_SESSION['pocket'];
        $sql = "SELECT * FROM `техника` WHERE";

        $or = false;
        foreach ($arr as $a) {
            if ($or) $sql .= " OR ";
            else $or = true;
            $sql .= "`id` = " . $a;
        }
        $sql .= ";";

        $res = mysql_query($sql) or die(mysql_error());

        while ($row = mysql_fetch_array($res)) {
            $id = $row["id"];
            $photo = $row["фото"];
            $man = $row["марка"];
            $model = $row["модель"];
            $price = $row["цена"];
            $av_price += $price;
            ?>

            <tr>
                <td><img src="<?php echo $photo; ?>"/></td>
                <td><?php echo $man; ?></td>
                <td><?php echo $model; ?></td>
                <td><?php echo $price; ?>(руб)</td>
                <td>
                    <form method="post">
                        <input type="hidden" value="<?php echo $id; ?>" name="delete">
                        <input type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<form method="post">
    <h2><span>Сумма заказа: <?php echo $av_price; ?>(руб)</span><br>
        <input type="submit" value="Заказать" name="zakaz" class="button">
        <input type="submit" value="Очистить" name="clear" class="button">
</form>
<?php
include 'template_end.php';
?>
