<?php

header('text/plain');
header('Access-Control-Allow-Origin: http://localhost:3200',false);
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');


function addToFile($fileName,$content)
{
	$f = fopen($fileName,"a+");	
	fwrite($f, $content . "@@@");	
	fclose($f);
}

function readFromFileAndSaveToArray($fileName)
{
	$f = fopen($fileName,"a+");	
	fclose($f);	
	
	$f = fopen($fileName,"r");
	$s = fgets($f);	
	fclose($f);	
	
	$mass = array();
	$mass = explode("@@@",$s);
	return $mass;
}


function registerUser($login,$password)
{
	addToFile("loginsFile.dat",$login);
	addToFile("passwordsFile.dat",$password);
}

function isCorrectUserAndPassword($login, $password)
{
	$loginsArray = readFromFileAndSaveToArray("loginsFile.dat");
	$passwordArray = readFromFileAndSaveToArray("passwordsFile.dat");
	
	$n = count($loginsArray);
	
	for($i = 0; $i < $n; $i++)
	{
		$log = $loginsArray[$i];
		$pass = $passwordArray[$i];		
		if($login == $log && $password == $pass) return true;
	}
	
	return false;
}

function isLoginInDB($login)
{
	$loginsArray = readFromFileAndSaveToArray("loginsFile.dat");
	$n = count($loginsArray);
	
	for($i = 0; $i < $n; $i++)
	{
		$log = $loginsArray[$i];
		if($login == $log) return true;
	}
	
	return false;
}

function write($s)
{
	$s = $s . "";
	echo $s;
	exit();
	die("");
}

function param($s)
{
	$s = $s . "";
	if(isset($_REQUEST[$s]) == false) write("PARAM_ERROR");
}

?>






