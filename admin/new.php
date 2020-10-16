<?php 
	include "config.php";
	$newoption=@$_REQUEST['option'];
	    $q=$cat->getdata($con,"c_id  "," catagery","where department = '".$newoption."'","");
	//$q=mysqli_query($con,"SELECT c_id FROM catagery WHERE department='".$newoption."'");
$a=mysqli_fetch_array($q);
echo $a['c_id'];

?>