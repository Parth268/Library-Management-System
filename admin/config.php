<?php
		$con=mysqli_connect("localhost","root","","library_management_system") or die("Error".mysqli_error());
		require_once('myclass.php');
        $cat=new mylibrary;
?>