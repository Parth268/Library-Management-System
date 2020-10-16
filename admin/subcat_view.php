<?php
    include "config.php";

$id1 = @$_REQUEST['id'];

if(isset($_REQUEST['id']))
{ 
      $cat->deldata($con,"subcategory"," where sc_id = ".$id1);
  //mysqli_query($con,"delete from subcategory where sc_id = '".$id1."';");
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
   // $query=$cat->getdata($con," subcategory.sc_name, subcategory.c_id, catagery.department, subcategory.sc_id "," subcatagery JOIN catagery ON subcategory.c_id = catagery.c_id","","");
  $query=mysqli_query($con,"select subcategory.sc_name, subcategory.c_id, catagery.department, subcategory.sc_id  from subcategory JOIN catagery ON subcategory.c_id = catagery.c_id;");
    echo "<section id='main-content'><section class='wrapper'><div class='row'><div class='col-md-9'>";
   
    echo "<br>";
    echo "<br>";
        echo "<div class='container'>";
    echo "<table class='table table-striped'  cellpadding='5'>";
    echo "<tr><th>Sub-name</th><th>C_ID</th><th>delete</th><th>Update</th></tr>";
    while($rec=mysqli_fetch_array($query))
    {
      echo "<tr><td>".$rec['sc_name']."</td><td>".$rec['department']."</td>"; 
      echo "<td><a type='button' class='btn btn-danger' href='subcat_view.php?id=".$rec['sc_id']."' onClick=\"javascript:return confirm('do you want to delete');\"><span class='glyphicon glyphicon-trash'></span> Delete</a> </td>";
      echo "<td><a type='button' class='btn btn-info' href='subcat_insert.php?id=".$rec['sc_id']."'>Update</a></td></tr>";
    }
    echo "</table>";
    echo "</div></div></div></section></section>";
    echo "<br>";
    echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";echo "<br>";
    echo "<br>";
    ?>

                              
         </body>
    </html>         

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php" ?>