<?php 
	
	session_start();
	session_destroy();
	echo "<script>alert('logout');</script>";
	header('location:index.php');

?>