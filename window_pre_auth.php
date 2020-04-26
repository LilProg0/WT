				<form action="" method="post" style="visibility:<?php if ($_SESSION['open_auth'] == "off") echo "visible"; else echo "hidden";?>" >
					<table class="auto-style7">
						<tr>
							<td>
								<input type="submit" value="Авторизация" name="open_auth" class="button">
							</td>
							
							<td>
								<input type="button" value="Регистрация" name="reg" onClick="location.href='reg.php'" class="button">
							</td>
						
						</tr>
					</table>
				</form>
