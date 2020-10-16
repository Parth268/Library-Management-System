<?php include "config.php"; ?>

<?php include 'header.php'; ?>



<div class='main_btm'>
<div class='wrap'>
<div class='main'>
<div class='contact'>
<div class='section group'>	
<?php 
      echo "<div class='container-fluid'>";
          $req=$cat->getdata($con," * "," news","","");

     // $req=mysqli_query($con,"select * from news;");
      echo "<table  class='table table-striped' cellpadding='5'>";
      while($rec=mysqli_fetch_array($req))
      {
      echo "<tr>
              <td rowspan='2'><img height='80' weight='100' src='admin/".$rec['img']."' ></td>
              <td>".$rec['title']."</td>
            </tr>";
      echo "<tr>
                <td>".$rec['description']."</td>
            </tr>";
      }
      echo "</table></div>";
    ?>
</div>
</div>
</div>
</div>
</div>
<?php include "footer.php" ?>