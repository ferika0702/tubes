<?php
$namaHost="localhost";
$username="root";
$password="";

$connect=mysqli_connect($namaHost, $username, $password);

$sql="CREATE DATABASE TugasBesarWeb1";
if(mysqli_query($connect, $sql)){
		echo "Database berhasil dibuat";
	}else{
		echo "Database gagal dibuat <br>";
	}
	mysqli_close($connect);
?>