<?php
    include "config.php";

$id1 = @$_REQUEST['id'];

if(isset($_REQUEST['id']))
{ 
  $cat->deldata($con,"contact","where con_id = '".$id1."';");
 // mysqli_query($con,"delete from contact where con_id = '".$id1."';");
}?>
<?php include "header.php" ?>
      <!--header end-->
      <!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
     <?php include "navgation.php" ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <?php
    include "config.php";
    echo "<section id='main-content'><section class='wrapper'><div class='row'><div class='col-md-9'>";
     $result_per_page=2;

        $query=$cat->getdata($con," * "," contact","","");
 // $query=mysqli_query($con,"select * from catagery;");
          $num_of_result=mysqli_num_rows($query);

          $num_of_page=ceil($num_of_result/$result_per_page);

      if(!isset($_GET['page']))
  {
    $page=1;
  }
  else{
    $page=$_GET['page'];
  }
  
  $this_page_first=($page-1)*$result_per_page;
   $r=$cat->getdata($con," * "," contact","LIMIT ".$this_page_first.",".$result_per_page."","");
   // $r=mysqli_query($con,"SELECT * FROM contact LIMIT ".$this_page_first.",".$result_per_page);

    echo "<br>";
    echo "<br>";
    echo "<div class='container'>";
    echo "<table  class='table table-striped' cellpadding='5'>";
    echo "<tr><th>Name</th><th>Email</th><th>Phone number</th><th>Subject</th><th>Delete</th></tr>";
    while($rec=mysqli_fetch_array($r))
    {
      echo "<tr><td>".$rec['con_name']."</td><td>".$rec['con_email']."</td><td>".$rec['con_phone']."</td><td>".$rec['con_sub']."</td>"; 
      echo "<td><a type='button' class='btn btn-danger' href='contact_view.php?id=".$rec['con_id']."' onClick=\"javascript:return confirm('do you want to delete');\"><span class='glyphicon glyphicon-trash'></span> Delete</a> </td>";
    }
echo "</table>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><div class='container'><div class='text-center'>";
echo "<ul class='pagination'>";
  for ($page=1; $page<=$num_of_page; $page++) { 
    echo '<li class="page-item"><a href="contact_view.php?page='.$page.'" class="page-link">'.$page.'</a></li>';
  }
 
  echo "</ul>";    echo "</div></div></div></section></section>";
    
    ?>

    </body>
    </html>                          
                 

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php" ?>