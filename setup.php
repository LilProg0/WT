<html>

<head>
  <title></title>
</head>

<body>

<?php

$server = "localhost";
$user = "root";
$password="";
$BD="jjj";
if(!mysql_connect($server,$user,$password))
{
	echo "cannot connect";
}
else
{
	mysql_select_db($BD);
	mysql_query("set names utf8");
}

?>

</body>

</html>
