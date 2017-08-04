<?php

require "functions.php";

param('login');
param('password');

$login = $_REQUEST['login'] . "";
$password = $_REQUEST['password'] . "";

$flag = isCorrectUserAndPassword($login, $password);

if($flag == true)
{
	write("AVT_YES");
}

write("AVT_NO");

?>