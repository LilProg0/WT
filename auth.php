<form action="" method="post" >
                <table class="auto-style7">
                    <tr>
                        <td colspan="2">
                            <?php 
								if ( $_SESSION[ "id_user" ] == 0 )
									echo "Авторизация";
								else
									echo "Здравствуйте, ". $_SESSION["name_user"];
							?>
                        </td>
                    </tr>
                    <tr>
                        <td>
							<?php
								if ( $_SESSION[ "id_user" ] == 0 )
									echo "Логин:";
							?>
                            
                        </td>
                        <td>
							
							<?php
							if ( $_SESSION[ "id_user" ] == 0 )
							{
								echo "<span class=\"auth_input\">";
								echo "<input type=\"text\" size=\"20\" name=\"login\">";
								echo "</span>";
							}
							?>
							
                        </td>
                    </tr>
                    <tr>
                        <td>
							<?php
								if ( $_SESSION[ "id_user" ] == 0 )
									echo "Пароль:";
							?>
                        </td>
                        <td>
							
								<?php
								if ( $_SESSION[ "id_user" ] == 0 )
								{
									echo "<span class=\"auth_input\">";
									echo "<input type=\"password\" size=\"20\" name=\"pass\">";
									echo "</span>";
								}
								?>
							
                        </td>
                    </tr>
                    <tr>
                        <td>
							<?php
								if ($_SESSION[ "id_user" ] == 0 )
								{
									echo "<input type=\"submit\" value=\"Вход\" name=\"entry\" class=\"button\">";
								} else {
									echo "<input type=\"button\" value=\"Личный кабинет\" onClick=\"location.href='lk.php'\" class=\"button\">";
								}
							?>
							
							
                        </td>
                        <td>
							<?php
								if ($_SESSION[ "id_user" ] == 0 )
								{
									echo "<input type=\"button\" value=\"Регистрация\" name=\"reg\" onClick=\"location.href='reg.php'\" class=\"button\">";	
								} else { 
									
									echo "<input type=\"submit\" value=\"Выход\" name=\"exit\" class=\"button\">";									
								}
							?>
							
							<?php 
								if ( !$_SESSION[ 'id_user' ] )
									echo "<input type=\"submit\" value=\"Скрыть авторизацию\" name=\"close_auth\" class=\"button\">";
								?>
                        </td>
                    </tr>
                </table>
				</form>