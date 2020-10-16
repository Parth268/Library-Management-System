<?php
  include "config.php";
  if(@$_REQUEST['b']=='submit')
  {
    $scname=@$_REQUEST['name'];
    $s_cid=@$_REQUEST['cid'];
         $cat->adddata($con, "subcategory", array("sc_name"=>$scname,"c_id"=>$s_cid));
   // mysqli_query($con,"insert into  subcategory set sc_name='".$scname."' , c_id='".$s_cid."' ;");
    echo "<script>window.location.replace('subcat_view.php')</script>";
  }  

  $id1 = @$_REQUEST['id'];
 if(isset($_REQUEST['id']))
 {
  $res=$cat->getdata($con," * "," subcategory","where sc_id = '".$id1."'","");
  //$res = mysqli_query($con,"select * from subcategory where sc_id = '".$id1."'");
  $rec=mysqli_fetch_array($res);
 }

if(@$_REQUEST['s2']=="update")
{
  $name=@$_REQUEST['name'];
    $eid=@$_REQUEST['scid'];
    $c_id=@$_REQUEST['cid'];
        $cat->editdata($con,"subcategory ",array('sc_name' => $name,    "c_id"=>$c_id)," where sc_id = ".$eid);
 // mysqli_query($con,"update subcategory set     sc_name='".$name."' , c_id='".$c_id."'  where sc_id ='".$eid."'; ");
  echo "<script>alert('Record updated');</script>";
  echo "<script>window.location.replace('subcat_view.php')</script>";
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
      <script >

      function ajaxfetch()
      {
        var option=document.getElementById('a').value;
        http=new XMLHttpRequest();
        http.open("GET","new.php?option="+option,false);
        http.send();
       // alert(http.responseText);
        document.getElementById("cid").value=http.responseText;
      }

      </script>
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
                   
                      <input type="hidden"  name="scid"    value="<?php echo $rec['sc_id']; ?>" >
                    <div class="form-group">  
                     <label >Name</label>
                      <input type="text" class="form-control"  name="name" placeholder="scname" value="<?php echo @$rec['sc_name']; ?>">
                    </div>
                     <div class='form-group'>
                      <label for='drop'>Department</label>
                      <select name="cat" onchange="ajaxfetch()" id="a" class='form-control'>;

                      <?php $con1=mysqli_connect("localhost","root","","library_management_system");

                           $res1=$cat->getdata($con1," * "," catagery","","");

                          //$res1 = mysqli_query($con1,"select * from  catagery");
   
                            
                              while($rec1=mysqli_fetch_array($res1))
                              {
                                echo "<option>".$rec1['department']."</option>";
                             }
                                
                      ?>
                    
                      </select></div>
                      <div class="form-group">  
                     <label for="email">C_ID</label>
                      <input type="text" class="form-control"  name="cid" placeholder="cid"   id="cid"  value="<?php echo @$rec['c_id']; ?>">
                      </div>
                      <input type="submit" name="b"         class="btn btn-success"               value="submit">
                      <input type="submit" name="s2"          class="btn btn-info"              value="update" >
                     </div>
                  </form>
                  	
                      
                  </div><!-- /col-lg-3 -->
              </div>
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php" ?>