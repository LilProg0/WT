<?php
	include 'template_start.php';
?>

<?php
	if ( $_POST[ 'email_tema' ] )
	{

			mail( "admin@texnika", $_POST[ 'email_tema'], "Обратный адрес: " . $_POST['email_adr'] . "\nТекст письма: \n" . $_POST[ 'email_text' ] );
	}
?>


	<form action="" method="post">
    <table class="auto-style7">
        <tr>
            <td>Тема письма:</td>
            <td>
                <input type="text" size="20" name="email_tema">
            </td>
        </tr>
		<tr>
            <td>Обратный адрес:</td>
            <td>
                <input type="text" size="20" name="email_adr">
            </td>
        </tr>
        <tr>
            <td>Сообщение:</td>
            <td>
                <textarea name="email_text" cols="100" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>
				<span style="color:#be9656">
                <?php echo $msg; ?>
				</span>
            </td>
            <td>
				<input type="submit" value="Отправить" name="reg_btn" class="button">
                <input type="reset" value="Очистить" class="button">
            </td>
        </tr>
    </table>
	</form>

<?php
	include 'template_end.php';
?>
