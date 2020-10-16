<!DOCTYPE HTML>
<html>
<head>

<title>The Public-Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<div class="btm_border">
<div class="h_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="images/1logo.png" alt=""></a></h1>
		</div>
		<div class="social-icons">
			<ul>
			     <li><a class="facebook" href="#" target="_blank"> </a></li>
			     <li><a class="twitter" href="#" target="_blank"></a></li>
			     <li><a class="googleplus" href="#" target="_blank"></a></li>
			     <li><a class="pinterest" href="#" target="_blank"></a></li>
			     <li><a class="dribbble" href="#" target="_blank"></a></li>
			     <li><a class="vimeo" href="#" target="_blank"></a></li>
		   </ul>
		</div>	
		<div class="clear"></div>
	</div>




	<div class='h_btm'>
		<div class='cssmenu'>
			<ul> <?php 
			   echo "<li class='active'><a href='index.php'><span>Home</span></a></li>
			    <li><a href='about.php'><span>About</span></a></li>
			    <li><a href='staff.php'><span>Staff</span></a></li>
			    <li class='has-sub'><a href='service.php'><span>Services</span></a></li>
			    <li class='last'><a href='contact.php'><span>Contact</span></a></li>";
			    echo "<li ><a href='logout.php'><span>Logout</span></a></li>";
			    echo "<li ><a href='profile.php'><span>Profile</span></a></li>";
			    ?>
    </div>
<div class="clear"></div>
</div>
</div>
</div>
</div>



<div class="main_btm">
<div class="wrap">
<div class="main">
<div class="contact">
<div class="section group">	
<?php
	session_start();
		include "config.php";
	$email=@$_SESSION['facultyemail'];
	    $query=$cat->getdata($con," * "," facultydata","where email = '".$email."'","");

    //$query=mysqli_query($con,"select * from facultydata where email='$email';");
    echo "<table class='table table-striped' >";
 	if($rec=mysqli_fetch_array($query))
 	{
 		echo "<tr><td>Name</td><td> ".$rec['name']." </td></tr>";
 		echo "<tr><td>Surname</td><td> ".$rec['surname']." </td></tr>";
 		echo "<tr><td>Email</td><td> ".$rec['email']." </td></tr>";
 		echo "<tr><td>Mobile</td><td> ".$rec['mobile']." </td></tr>";
 		echo "<tr><td>Department</td><td> ".$rec['dept']." </td></tr>";
 	}
 	echo "</table>";
?>

</div>
</div>
</div>
</div>
</div>
<?php include "footer.php" ?>