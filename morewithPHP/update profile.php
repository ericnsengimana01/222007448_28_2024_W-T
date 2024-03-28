<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("location:login.html");
	exit();

}
$connection = new mysqli("localhost","","mytest");
if ($conection->connect_error){
	die("connection failed:".$connection->connect_error);

}
$user_id =$_session['user_id'];
if($_SERVER["REQUEST_METHOD"]==POST){

	$firstname =$_POST['firstname'];
	$lastname =$_POST['lastname'];
	$sql="UPDATE profile SET firstname='$firstname',lastname='$lastname';
	if($connection->query($sql)==TRUE){

		echo"profile update successfuly:";
	header("location:#");
}else{
	echo "error updating profile:".$connection->
}
		