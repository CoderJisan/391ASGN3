<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "root", "Car");
include 'connect.php';
if ($_SESSION['use']) {
	# code...
	if ($conn) {
	# code...
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
		// $sql = "";
			$sql = mysqli_query($conn, "DELETE FROM car WHERE uid = $id");
			if($sql){
				header("location: home.php");
			}else
			{
				header("location: admin.php");
			}
		}
	}
	else{
		header("location: index.php");
	}
}
else{
	header("location: admin.php");
}
?>