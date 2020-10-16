<?php 
  
    include "config.php";
    if(@$_REQUEST['submitnews']=='submit'){
      
       @$ph = "img/".$_FILES['photo']['name'];
       move_uploaded_file(@$_FILES['photo']['tmp_name'], @$ph);
       $title=@$_REQUEST['title'];
       $desp=@$_REQUEST['description'];
      $cat->adddata($con, "news", array("img"=>$ph, "title"=>$title, "description"=>$desp));

      //  $d=mysqli_query($con,"insert into news set img='$ph', title='$title', description='$desp';");
      
    }


    $id=@$_REQUEST['id'];
    if(isset($_REQUEST['id']))
    {
               $cat->deldata($con,"news"," where n_id = ".$id);
   // mysqli_query($con,"delete from news where n_id='$id'");

    }


?>

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
     <?php include "navgation.php"; ?>

    <section id="main-content">
          <section class="wrapper">
             <div class='row'>
              <div class='col-md-9'>
                <br><br>
    <?php 
      echo "<div class='container-fluid'>";
     echo "<form method='post' enctype= 'multipart/form-data'>";
      echo "<table class='table'  cellpadding='10'>
          <tr>

              <td >Add IMGAGE <input type='file' required name='photo' ><br></td>
              <div class='form-group'>
              <td></td>
              <td colspan='2'><input type='text' required class='form-control' name='title' placeholder='NEWS TITLE'></td>
          </tr>
          <tr>
              <div class='form-group'>
              <td colspan='3'><textarea type='text' required class='form-control' name='description' height='40' weight='40' placeholder='NEWS DESCRIPTION'></textarea></td>
              </div>
          </tr>        
      </table>";
      echo "<input type='submit' value='submit' name='submitnews' class='btn btn-info'>";
      echo "</form></div>";
      echo "<br><br><br><br>";
    ?>

    <?php 
      echo "<div class='container-fluid'>";
      $req=$cat->getdata($con," * "," news","","");

     // $req=mysqli_query($con,"select * from news;");
      echo "<table  class='table table-striped' cellpadding='5'>";
      while($rec=mysqli_fetch_array($req))
      {
      echo "<tr>
              <td rowspan='2'><img height='80' weight='100' src='".$rec['img']."' ></td>
              <td>".$rec['title']."</td>
            </tr>";
      echo "<tr>
                <td>".$rec['description']."</td>
                <td><a type='button'  href='addnews.php?id=".$rec['n_id']."'  class='btn btn-danger'>Delete</a></td>
            </tr>";
      }
      echo "</table></div>";
    ?>

  </div><!--/row --></div><!--/row -->
          </section>
      </section>

</body>
</html>                          
                 

      <!--main content end-->
      <!--footer start-->
<?php include "footer.php"; ?>