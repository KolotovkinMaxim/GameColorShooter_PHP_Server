<?php

require "functions.php";

param('login');
param('password');

$login = $_REQUEST['login'] . "";
$password = $_REQUEST['password'] . "";

if(isLoginInDB($login) == true)
{
	write("NO");
}

registerUser($login,$password);

write("YES");

?>