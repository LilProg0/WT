<?php
include 'template_start.php';

if ($_SESSION['id_user'] == 0) {
    echo "Вы не авторизованы";
    die();
}

if ($_SESSION["login_user"] != "admin") {
    echo "Вы не админ!";
    die();
}

?>
<table class="list">
    <tr>
        <th>Пользователь</th>
        <th>Индексы техники</th>
    </tr>

    <?php

    $sql = "SELECT `пользователи`.`логин`, `заказы`.`техника`\n"
        . "FROM `заказы`\n"
        . "JOIN `пользователи` ON `пользователи`.`номер_пользователя` = `заказы`.`id`;";

    $res = mysql_query($sql);
    while ($row = mysql_fetch_array( $res)) {
        echo
            "<tr>"
            ."<td>$row[0]</td>"
            ."<td>$row[1]</td>"
            ."</tr>";
    }
    ?>
</table>
