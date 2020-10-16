<?php
  include "config.php";
  if(@$_REQUEST['b']=='submit')
  {
    $cname=@$_REQUEST['name'];
        $res=$cat->getdata($con," * "," catagery","where department = '".$cname."'","");
   // $res =mysqli_query($con,"select * from catagery where department = '".$cname."'");

    if($rec=mysqli_fetch_array($res))
    {
      echo "<script>alert('allready inserted');</script>";

    }
    else{
     $cat->adddata($con, "catagery", array("department"=>$cname));
//mysqli_query($con,"insert into catagery set department='".$cname."';");
      echo "<script>window.location.replace('vcat.php')</script>";
    }

  }  

  $id1 = @$_REQUEST['id'];

if(isset($_REQUEST['id']))
{
    $res=$cat->getdata($con," * "," catagery","where c_id = '".$id1."'","");
//$res = mysqli_query($con,"select * from catagery where c_id = '".$id1."'");
$rec=mysqli_fetch_array($res);

}

if(@$_REQUEST['s2']=="update")
{
  $name=@$_REQUEST['name'];
    $eid=$_REQUEST['cid'];
    $cat->editdata($con,"catagery ",array('department' => $name)," where c_id = ".$eid);
 // mysqli_query($con,"update catagery set department='".$name."' where c_id = '".$eid."'; ");
  echo "<script>alert('Record updated');</script>";
  echo "<script>window.location.replace('vcat.php')</script>";
}
?>
<?php include "header.php" ?>
      <!--header end-->
      
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
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-md-9">
                    <br><br><br>
                  <form method="post">

                    <input type="hidden" placeholder="id" name="cid"   value="<?php echo $rec['c_id']; ?>" >
                    <div class="form-group">  
                     <label for="email">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="cname" value="<?php echo @$rec['department']; ?>">
                    </div>
                  
                      <input type='submit' class='btn btn-success' name='b' value='submit'>
                     <input type='submit' class='btn btn-info' name='s2' value='update' >
                  </form>
                  	
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php" ?>