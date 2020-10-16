<?php
  include "config.php";
  if(@$_REQUEST['b']=='submit')
  {
    $name=@$_REQUEST['name'];
    $code=@$_REQUEST['code'];
    $sem=@$_REQUEST['sem'];
    $dept=@$_REQUEST['dept'];
    $price=@$_REQUEST['price'];
    $author=@$_REQUEST['author'];
    $count=@$_REQUEST['count'];
    $res=$cat->getdata($con," * "," books","where b_code = '".$code."'","");

   //$res =mysqli_query($con,"select * from books where  b_code='$code' ");

    if($rec=mysqli_fetch_array($res))
    {
      echo "<script>alert('allready Books is exists');</script>";

    }
    else{
           $cat->adddata($con, "books", array("b_name"=>$name,"b_code"=>$code,"b_sem"=>$sem,"b_price"=>$price,"b_dept"=>$dept,"b_author"=>$author,"b_count"=>$count));
    //  mysqli_query($con,"insert into books set  b_name ='$name', b_code='$code', b_sem='$sem', b_price='$price', b_dept='$dept', b_author='$author';");

      echo "<script>window.location.replace('view_books.php')</script>";
    }

  }  

  $id1 = @$_REQUEST['id'];

if(isset($_REQUEST['id']))
{
$res=$cat->getdata($con," * "," books","where b_id = '".$id1."'","");
//$res = mysqli_query($con,"select * from books where b_id = '".$id1."'");
$rec=mysqli_fetch_array($res);

}

if(@$_REQUEST['s2']=="update")
{
  $name=@$_REQUEST['name'];
    $code=@$_REQUEST['code'];
    $sem=@$_REQUEST['sem'];
    $dept=@$_REQUEST['dept'];
    $price=@$_REQUEST['price'];
    $author=@$_REQUEST['author'];
    $id=@$_REQUEST['id'];
    $count=@$_REQUEST['count'];
 $cat->editdata($con,"books ",array('b_name' => $name,'b_code' => $code,'b_sem' => $sem,'b_price' => $price,'b_dept' => $dept,'b_author' => $author,"b_count"=>$count)," where b_id = ".$id);
 //mysqli_query($con,"update books set b_name ='$name', b_code='$code',   b_sem='$sem',   b_price='$price',   b_dept='$dept',   b_author='$author' where b_id='$id' ");
  echo "<script>alert('Record updated');</script>";
  echo "<script>window.location.replace('view_books.php')</script>";
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

                    <input type="hidden" placeholder="id" name="id"   value="<?php echo $rec['b_id']; ?>" >
                    <div class="form-group">  
                     <label for="email">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Book name" value="<?php echo @$rec['b_name']; ?>">
                    </div>
                  <div class="form-group">  
                     <label >Book Code</label>
                      <input type="number" class="form-control" name="code" placeholder="Book Code" value="<?php echo @$rec['b_code']; ?>">
                    </div>
                  <div class="form-group">  
                     <label >Author</label>
                      <input type="text" class="form-control" name="author" placeholder="Book author" value="<?php echo @$rec['b_author']; ?>">
                    </div>
                  <div class="form-group">  
                     <label >Semester</label>
                      <input type="number" class="form-control" name="sem" placeholder="Book Semester" value="<?php echo @$rec['b_sem']; ?>">
                    </div>
                  <div class="form-group">  
                     <label >Department</label>
                      <input type="text" class="form-control" name="dept" placeholder="For which department" value="<?php echo @$rec['b_dept']; ?>">
                    </div>
                  <div class="form-group">  
                     <label >Price</label>
                      <input type="text" class="form-control" name="price" placeholder="Book Price" value="<?php echo @$rec['b_price']; ?>">
                    </div>
                   <div class="form-group">  
                     <label >Total books Count</label>
                      <input type="text" class="form-control" name="count" placeholder="Book Count" value="<?php echo @$rec['b_count']; ?>">
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