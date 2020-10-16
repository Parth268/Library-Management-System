
<?php include 'header.php'; ?>
<div class='main_btm'>
<div class='wrap'>
<div class='main'>
<div class='contact'>
<div class='section group'>
<?php 

	include "config.php";
	$searching=@$_SESSION['shs'];
	$code=@$_SESSION['code'];
    $req=$cat->getdata($con," * "," books","where b_name = '".$searching."'","");
	///$req=mysqli_query($con,"select * from books where b_name= '$searching' ");
    echo "<table class='table table-striped' >";
    echo "<tr><th><b>Book Name</b></th><th><b>Book code</b></th><th><b>Semester</b></th><th><b>Department</b></th><th><b>Price</b></th></tr>";

 	if($rec=mysqli_fetch_array($req))
 	{

 		    echo "<tr><td>".$rec['b_name']."</td><td>".$rec['b_code']."</td>><td>".$rec['b_sem']."</td>><td>".$rec['b_dept']."</td>><td>".$rec['b_price']."/- .Rs</td>>"; 

 	}
 	echo "</table>"; 
?>


</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
