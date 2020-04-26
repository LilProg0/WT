<?php
include 'template_start.php';

if ($_POST['zak']) {
    $id_user = $_SESSION['id_user'];
    if ($_SESSION['id_user'] == 0) {
        echo "Ошибка";
        die();
    }

    $array_zak = $_POST['selected'];
    $array_zak_sess = $_SESSION['pocket'];

    foreach ($array_zak as $a) {
        $add = true;
        foreach ($array_zak_sess as $b)
            if ($a == $b) $add = false;

        if ($add) $array_zak_sess[count($array_zak_sess)] = $a;
    }

    $_SESSION['pocket'] = $array_zak_sess;
}

?>

    <form action="" method="post">
        <input type="submit" value="Показать все" name="all" class="button">

        <select size="1" name="filter">
            <option></option>
            <option value="JCB">JCB</option>
            <option value="TOMCST">TOMCST</option>
            <option value="Беларус">Беларус</option>
            <option value="Камаз">Камаз</option>
        </select>

        <input type="submit" value="Отфильтровать" name="filtr1" class="button">
    </form>

    <br>
    <form action="" method="post">
        <table class="list">
            <tr>
                <th>Фото</th>
                <th>Марка</th>
                <th>Модель</th>
                <th>Цена</th>
                <?php if ($_SESSION['id_user'] != 0) echo "<th>Выбор</th>"; ?>
            </tr>

            <?php
            $sql = "SELECT * FROM `техника`";

            if (isset($_POST["filter"]))
                if ($_POST["filter"] != "")
                    $sql = $sql . " WHERE `марка` LIKE '" . $_POST["filter"] . "'";

            $sql = $sql . ";";

            $res = mysql_query($sql) or die(mysql_error());

            while ($row = mysql_fetch_array($res)) {
                $id = $row["id"];
                $photo = $row["фото"];
                $man = $row["марка"];
                $model = $row["модель"];
                $price = $row["цена"];
                ?>

                <tr>
                    <td><img src="<?php echo $photo; ?>"/></td>
                    <td><?php echo $man; ?></td>
                    <td><?php echo $model; ?></td>
                    <td><?php echo $price; ?>(руб)</td>
                    <?php if ($_SESSION['id_user'] != 0) echo " <td><input type='checkbox' name='selected[]' value='$id'/></td>" ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
        if ($_SESSION['id_user'] != 0)
            echo "<input type=\"submit\" value=\"Добавить в корзину\" name=\"zak\" class=\"button\">"
                . "<input type=\"reset\" value=\"Сбросить выбор\" class=\"button\">";
        ?>

    </form>
<?php
include 'template_end.php';