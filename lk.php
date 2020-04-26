<?php
	include 'template_start.php';
?>

<?php
	if ( $_SESSION['id_user'] == 0 )
	{
		echo "Вы не авторизованы";
		die();
	}
?>

<?php
	$msg = "";
	if ( $_POST[ 'save_btn' ] )
	{
		if ( $_POST[ 'pass' ] != $_POST[ 'pass2' ] )
		{
			$msg = "Пароли отличаются";
		} else {

			$req_upd = "UPDATE `пользователи` SET `имя`=\"". $_POST['name'] ."\",`логин`=\"". $_POST['login'] ."\",`пароль`=\"".$_POST['pass']."\" WHERE `номер_пользователя`=". $_SESSION['id_user'] ;

			$res_upd = mysql_query( $req_upd) ;

			if ( $res_upd )
			{
				$msg = "Данные успешно изменены";
			} else {
				$msg = "Ошибка БД";
			}


		}
	}
?>


<?php
	$ID_user = $_SESSION[ 'id_user' ];
	$req_user = "SELECT * FROM `пользователи` WHERE `номер_пользователя`=\"" . $ID_user . "\"";
	$res_user = mysql_query( $req_user)  ;

	if ( $res_user )
	{
		$user = mysql_fetch_row($res_user);

		$name_user = $user[ 3 ];
		$login_user = $user[ 1 ];
		$pass_user = $user[ 2];

	} else {
		echo "Ошибка БД";
	}

?>

	<form action="" method="post">
    <table class="auto-style7">
        <tr>
            <td>Имя:</td>
            <td>
                <input type="text" size="20" name="name" Value="<?php echo $name_user;?>">
            </td>
        </tr>
        <tr>
            <td>Логин:</td>
            <td>
                <input type="text" size="20" name="login" Value="<?php echo $login_user;?>">
            </td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td>
                <input type="password" size="20" name="pass" Value="<?php echo $pass_user;?>">
            </td>
        </tr>
        <tr>
            <td>Подтвердите пароль:</td>
            <td>
                <input type="password" size="20" name="pass2" Value="<?php echo $pass_user;?>">
            </td>
        </tr>
        <tr>
            <td>
				<span style="color:#be9656">
                <?php echo $msg; ?>
				</span>
            </td>
            <td>
				<input type="submit" value="Изменить" name="save_btn" class="button">
                <input type="reset" value="Сбросить" class="button">
            </td>
        </tr>
    </table>
	</form>

<?php
	include 'template_end.php';
?>
