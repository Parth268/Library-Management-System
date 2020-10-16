<?php
    include "config.php";

$id1 = @$_REQUEST['id'];

if(isset($_REQUEST['id']))
{ 
      $cat->deldata($con,"books"," where b_id = ".$id1);

  //mysqli_query($con,"delete from books where  b_id = '".$id1."'");
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

        $query=$cat->getdata($con," * "," books","","");
 // $query=mysqli_query($con,"select * from books;");
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
          $r=$cat->getdata($con," * "," books","LIMIT ".$this_page_first.",".$result_per_page."","");

   // $r=mysqli_query($con,"SELECT * FROM books LIMIT ".$this_page_first.",".$result_per_page);

    echo "<br>";
    echo "<br>";
   echo "<div class='container'>";
    echo "<table class='table table-striped'  cellpadding='5'>";
        echo "<tr><th>Name</th><th>Code</th><th>author</th><th>Semester</th><th>Department</th><th>Price</th><th>Count</th><th>delete</th><th>Update</th></tr>";
    while($rec=mysqli_fetch_array($r))
    {
      echo "<tr><td>".$rec['b_name']."</td>"; 
      echo "<td>".$rec['b_code']."</td>"; 
      echo "<td>".$rec['b_author']."</td>"; 
      echo "<td>".$rec['b_sem']."</td>"; 
      echo "<td>".$rec['b_dept']."</td>"; 
      echo "<td>".$rec['b_price']."</td>"; 
      echo "<td>".$rec['b_count']."</td>"; 

      echo "<td><a type='button' class='btn btn-danger' href='view_books.php?id=".$rec['b_id']."' onClick=\"javascript:return confirm('do you want to delete');\"><span class='glyphicon glyphicon-trash'></span> Delete</a> </td>";
echo "<td><a type='button' class='btn btn-info' href='books.php?id=".$rec['b_id']."'>Update</a></td></tr>";
    }
    echo "</table>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><div class='container'><div class='text-center'><ul class='pagination '>";
  for ($page=1; $page<=$num_of_page; $page++) { 
    echo '<li><a href="view_books.php?page='.$page.'">'.$page.'</a></li>';
  }
  echo "</ul>";
    echo "</div></div></div></div></div></section></section>";
   
?>

 </body>
    </html>                               
                 

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php" ?>