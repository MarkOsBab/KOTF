<?php
include("config.php");
include('userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';

/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
{
$id=$userClass->userLogin($usernameEmail,$password);
if($id)
{
$url=BASE_URL.'home/';
header("Location: $url"); // Page redirecting to home 
}
else
{
$errorMsgLogin="Please check login details.";
}
}
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
$username=$_POST['usernameReg'];
$email=$_POST['emailReg'];
$password=$_POST['passwordReg'];
$name=$_POST['nameReg'];
$gender=$_POST['Gender'];
$race = $_POST['Race'];
/* Regular expression check */
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
{
if ($race == 1) {

if ($gender == 'M') {
	$idMale=$userClass->HumanMaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idMale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
} elseif ($gender == 'F') {
	$idFemale=$userClass->HumanFemaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idFemale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
}
} 

if ($race == 2) {

if ($gender == 'M') {
	$idMale=$userClass->UndeadMaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idMale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
} elseif ($gender == 'F') {
	$idFemale=$userClass->UndeadFemaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idFemale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
}
} 

if ($race == 3) {

if ($gender == 'M') {
	$idMale=$userClass->ElfMaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idMale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
} elseif ($gender == 'F') {
	$idFemale=$userClass->ElfFemaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idFemale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
}
} 

if ($race == 4) {

if ($gender == 'M') {
	$idMale=$userClass->BeastMaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idMale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
} elseif ($gender == 'F') {
	$idFemale=$userClass->BeastFemaleRegistration($username,$password,$email,$name,$gender,$race);

	if($idFemale) {
		$url=BASE_URL.'home/';
		header("Location: $url"); // Page redirecting to home 
	}
	else {
		$errorMsgReg="Username or Email already exists.";
	}
}
} 


}
}


?>