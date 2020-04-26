<?php
session_start();
include "setup.php";
?>

<?php
if ($_POST['entry']) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $req_user = "SELECT * FROM `пользователи` WHERE `логин`=\"" . $login . "\"";

    $res_user = mysql_query($req_user) or die("Ошибка " . mysql_error());

    if ($res_user) {
        $user = mysql_fetch_row($res_user);

        if ($user[2] == $pass) {
            $_SESSION["id_user"] = $user[0];
            $_SESSION["name_user"] = $user[3];
            $_SESSION["login_user"] = $user[1];

            $req_add_auth = "INSERT INTO `аутентификация`(`номер_пользователя`, `ip_пользователя`, `дата`, `номер_сессии`)
                        VALUES (\"" . $_SESSION["id_user"] . "\",\"" . $_SERVER['REMOTE_ADDR'] . "\",\"" . time() . "\", \"" . session_id() . "\")";
            $res_add_auth = mysql_query($req_add_auth);// or die("Ошибка " . mysql_error($link));
        } else {
            echo "<script>alert('Не верный логин или пароль')</script>";
        }

    } else {
        echo "Не верный логин";
    }
    //	}
}

if ($_POST['exit']) {
    $req_del_auth = "DELETE FROM `аутентификация` WHERE `номер_сессии`=\"" . session_id() . "\"";
    $res_del_auth = mysql_query($req_del_auth);//or die("Ошибка " . mysql_error($link));

    session_destroy();
    echo "<script>alert(\"До свидания!\");window.location.href = window.location.href;</script>";

}


if ($_POST['open_auth'])
    $_SESSION['open_auth'] = "on";

if ($_POST['close_auth'])
    $_SESSION['open_auth'] = "off";

if (!$_SESSION['open_auth'])
    $_SESSION['open_auth'] = "off";
?>


<?php
$req_unic_IP = "SELECT COUNT(DISTINCT ip_пользователя) FROM аутентификация";
$res_IP = mysql_query($req_unic_IP);// or die("Ошибка " . mysql_error($link));

$req_auth_user = "SELECT COUNT(DISTINCT номер_пользователя) FROM аутентификация";
$res_Users = mysql_query($req_auth_user);//or die("Ошибка " . mysqli_error($link));


$Stat_user = mysql_fetch_row($res_Users);
$Stat_IP = mysql_fetch_row($res_IP);

$Stat_IP = $Stat_IP[0];
$Stat_user = $Stat_user[0];
?>

<html>
<head>
    <title>Библиотеки</title>
    <link href="holy.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<table class="header">
    <tr>
        <td class="logo"><a href="/"><img src="pic/logo.png"/></a></td>
        <td class="headerText"><H1>Аренда спецтехники</H1></td>
        <td class="auth">
            <?php
            if (($_SESSION['id_user']) || ($_SESSION['open_auth'] == "on"))
                include "auth.php";
            else
                include "window_pre_auth.php";
            ?>
        </td>
    </tr>
</table>

<div class="left_menu">
    <div class="left_menu_item">
        <a href="/">Главная страница</a>
    </div>
    <div class="left_menu_item">
        <a href="catalogue.php">Список техники</a>
    </div>
    <div class="left_menu_item">
        <a href="email.php">Обратная связь</a>
    </div>
    <div class="left_menu_item">
        <?php
        if ($_SESSION["id_user"] != 0)
            if ($_SESSION["login_user"] == "admin")
                echo "<a href='orders.php'>Заказы</a>";
            else
                echo "<a href=\"basket.php\">Корзина</a>";
        ?>
    </div>
    <div>Авторизовано: <?php echo $Stat_user; ?></div>
    <div>IP адресов: <?php echo $Stat_IP; ?></div>
</div>

<table class="content">
    <tr>
        <td style="width:180px"></td>
        <td>