<?php
$connection = new mysqli("localhost", "root", "", "mytest");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$email =$_post['email'];
    	$password =$_post['password'];
    	$sql ="SELECT * FROM USER WHERE email='$email'";
    	$result =$conection->query($sql);

    	if($result->num_rows==1){
    		$row =$result->fetch_assoc();

    		if(password_verify($password,$row['password'])){
    			$_SESSION['user_id']=$row['id'];
    			header("location:landing.php");
    			exit();
    		}
    	}