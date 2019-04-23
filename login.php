<?php
	require_once 'password.php';
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	session_start();
	require 'dbconnect.php';
	header('Content-Type: text/html; charset=utf-8');
	$username = $_POST["txtUser"];
	$username = htmlspecialchars($username,ENT_QUOTES);
	$username = mysqli_real_escape_string($conn,$username);
	$password = $_POST["txtPass"];
	$password = htmlspecialchars($password,ENT_QUOTES);
	$password = mysqli_real_escape_string($conn,$password);
	$sql_checkpass = "select * FROM userlogin where username = '$username'";
	$query_checkpass = mysqli_query($conn,$sql_checkpass);
	$numRows = mysqli_num_rows($query_checkpass);

	if($numRows  == 1){
		$row = mysqli_fetch_assoc($query_checkpass);
		$password_en = password_verify($password,$row['password']);
		if(password_verify($password,$row['password'])){
			$sql = "SELECT * FROM userlogin WHERE username='$username'";
			$query = mysqli_query($conn,$sql);
			$data = mysqli_fetch_array($query);

			$_SESSION["user"] = $data["username"];
			$_SESSION["permission"] = $data["permission_group"];
			$_SESSION["userID"] = $data["id"];

			$sql_count = "SELECT * FROM network_detail WHERE user_id=".$data['id']."";
			$result = mysqli_query($conn,$sql_count);
			$count = mysqli_num_rows($result);
			session_write_close();

			if ($count >= 1) {
				Header("Location: home/".$data['id']."");
			} else {
				Header("Location: page1/".$data['id']."/menu=add");
			}

		}
		else{
			echo "<script type='text/javascript'>alert('รหัสผ่านไม่ถูกต้อง');javascript:history.go(-1);</script>";

		}
	}
	else{
		echo "<script type='text/javascript'>alert('ไม่มีผู้ใช้นี้');javascript:history.go(-1);</script>";

	}
	mysqli_close($conn);
?>
