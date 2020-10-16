<?php 

include "config.php";

       $id1 = @$_REQUEST['email'];
       if(@$_REQUEST['check']=='check')
       {
            $res=$cat->getdata($con," * "," facultydata"," where email = '".$id1."'","");

            $r=mysqli_fetch_array($res);


            if ($r==NULL) 
            {
            echo "<script>alert('No such faculty');</script>";
            }

                  $fineres=$cat->getdata($con,"book_submit1 , book_submit2 "," facultydata"," where email = '".$id1."'","");
                  $rf=mysqli_fetch_array($fineres);
                  $d1=date('y-m-d');
                  $d1=strtotime($d1);
                  $s1= $rf['book_submit1'];
                  $s2=$rf['book_submit2'];

                  if($s1!="0000-00-00" or $s1>="0000-00-01")                    
                  {

                  $s1=strtotime($s1);
                  $secs = $d1 - $s1;
                  $days = $secs / 86400;
                  $eid=@$_REQUEST['email'];

                          if($days>0)
                          {
                          $fine=$days*10;
                          //$cat->editdata($con,"facultydata ",array('book1_fine' => $fine)," where email = ".$id1);
                          $q="UPDATE `facultydata` SET `book1_fine` = '$fine' WHERE `facultydata`.`email` = '$id1'";

                          mysqli_query($con,$q);

                          echo "<script>alert('$fine');</script>";
                          echo "<script>alert('$id1');</script>";
                          }
                  }

                  if($s2!="0000-00-00" or $s2>="0000-00-01")
                  {                  
                  $s2=strtotime($s2);
                  $secs2 = $d1 - $s2;
                  $days2 = $secs2 / 86400;
                  $eid=@$_REQUEST['email'];

                         if($days2>0)
                         {
                          $fine1=$days2*10;
                          $q1="UPDATE `facultydata` SET `book2_fine` = '$fine1' WHERE `facultydata`.`email` = '$eid'";
                          mysqli_query($con,$q1);

                         }
                 }
       }

       if(@$_REQUEST['pay']=='pay')
       {
              $eid=@$_REQUEST['email'];
              //$cat->editdata($con,"facultydata ",array('book1_fine' =>'', 'book2_fine' =>'' )," where email = ".$eid);

              $q2="UPDATE `facultydata` SET  `book1_fine` = '' , `book2_fine` = '' WHERE `facultydata`.`email` = '$eid'";
                          mysqli_query($con,$q2);
              echo "<script>alert('Paid');</script>";
       }


if(@$_REQUEST['add']=="add")
{

    $b1=@$_REQUEST['book1'];
    $b2=@$_REQUEST['book2'];
    $eid=@$_REQUEST['email'];

    $bookreq=$cat->getdata($con," * "," books"," where b_code = '".$b1."'","");
   // $bookreq = mysqli_query($con,"select * from books where book_code1 = '".$b1."'"); 
    $r=mysqli_fetch_array($bookreq);
    $bookreq1=$cat->getdata($con," * "," books"," where b_code = '$b2' ","");
   // $bookreq1 = mysqli_query($con,"select * from books where book_code1 = '".$b2."'"); 
    $r1=mysqli_fetch_array($bookreq1);
    
    if (!$b1==null) {
                
                  if ($r['b_code']==null) {
                    echo "<script>alert('No such Book');</script>";
                  }
                  else{
						
                       $d1=date('y-m-d');
                       $s1=date('y-m-d', strtotime($d1.'+ 1 day'));
                       if($cat->editdata($con,"facultydata ",array('book_code1' => $b1, 'book_issue1' => $d1, 'book_submit1' => $s1)," where email = '".$eid."'")){}
                        // mysqli_query($con,"update studentdata set b1='$b1', book_issue1='$d1', book_submit1='$s1'  where email ='".$eid."'; ");
                        echo "<script>alert('Book added');</script>";
                     }
    }
    else if ($b1==null) {

                       if($cat->editdata($con,"facultydata ",array('book_code2' => '', 'book_issue1' =>'', 'book_submit1' =>'')," where email = '".$eid."'")){}
           //  mysqli_query($con,"update studentdata set b1='', book_issue1='', book_submit1=''  where email ='".$eid."'; ");
    }


  if(!$b2==null)
  {
	  if ($r1['b_code']==null) {
              echo "<script>alert('No such Book');</script>";
        }
     else{
         $d=date('y-m-d');
         $s=date('y-m-d', strtotime($d.'+ 1 day'));
              if($cat->editdata($con,"facultydata ",array('book_code2' => $b2, 'book_issue2' => $d, 'book_submit2' => $s)," where email = '".$eid."'"))
              {

              }
         //mysqli_query($con,"update studentdata set b2='$b2', book_issue2='$d', book_submit2='$s'  where email ='".$eid."'; ");
       }
  }

  else if ($b2==null) {
              if($cat->editdata($con,"facultydata ",array('book_code2' => '', 'book_issue2' =>'', 'book_submit2' =>'')," where email = '".$eid."'"))
              {

              }
        // mysqli_query($con,"update studentdata set b2='', book_issue2='', book_submit2=''  where email ='".$eid."'; ");
  }
  /*echo "<script>alert('Record updated');</script>";
  echo "<script>window.location.replace('bookissue.php')</script>";*/
}

if (@$_REQUEST['clean']=='clean') {
    
        $eid=@$_REQUEST['email'];
             if($cat->editdata($con,"facultydata ",array('b1' => '', 'b2' => '', 'book_issue2' =>'', 'book_issue1' =>'', 'book_submit1' =>'', 'book_submit2' =>'')," where email =  '".$eid."'"))
             {}

         //mysqli_query($con,"update studentdata set b1='', b2='', book_issue2='', book_submit2='', book_issue1='', book_submit1=''  where email ='".$eid."'; ");
        echo "<script>alert('All clear');</script>";
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
 <!-- <script>
   function ajaxfetch()
      {
        var option=document.getElementById('a').value;
        http=new XMLHttpRequest();
        http.open("GET","new.php?option="+option,false);
        http.send();
       // alert(http.responseText);
        document.getElementById("cid").value=http.responseText;
      }

      </script>-->
</head>
<body>
    
     <?php include "navgation.php" ?>
    

    <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-md-9">
                    <br><br><br>
                 <form method="post">
                
                      <div class="form-group">  
                      <input type="email" class="form-control"  name="email" placeholder="Email">
                      </div>
                      <input type="submit" name="check" class="btn btn-success"               value="check">
                  </form>
                  <hr>
                     <form method="post">
                
                      <div class="form-group"> 
                            <input type="email" required class="form-control"  name="email" placeholder="Email" value="<?php echo @$r['email']; ?>">

                      </div>
                      <div class="form-group"> 
                        <input type="number" required class="form-control"  name="book1" placeholder="Book 1 code" value="<?php echo @$r['book_code1']; ?>">
                      </div>

                      <div class="form-group"> 
                         <input type="number" class="form-control"  name="book2" placeholder="Book 2 code " value="<?php echo @$r['book_code2']; ?>">
                      </div>

                      <input type="submit" name="add" class="btn btn-info"               value="add">
                      <input type="submit" name="clean" class="btn btn-info"   onClick="javascript:return confirm('Do you want to clear book data ');"            value="clean">
                      <input type="submit" name="pay" class="btn btn-info"   onClick="javascript:return confirm('Student has paid fine');"            value="pay">

                  </form>

              <?php 
                $con1=mysqli_connect("localhost","root","","library_management_system") or die(mysqli_error());

                if (@$_REQUEST['check']=='check') {
                  $email=@$_REQUEST['email'];
                          $res1=$cat->getdata($con," * "," facultydata "," where email = '".$email."'","");
                /// $res1 = mysqli_query($con1,"select * from studentdata where email='$email'");
                echo "<br><br>";
                 echo "<table  class='table' >";

                 while($rec=mysqli_fetch_array($res1))
                {
                      echo "<tr>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Phone number</th>
                      <th>Email</th>
                      <th>Department</th> 
                      <th>Book-1</th>
                      <th>Date</th>
                      <th>Book-2</th>
                      <th>Date</th>
                      <th>Book1 Fine</th>
                      <th>Book2 Fine</th>
                      </tr>";
                     

                     echo "<tr>
                     <td>".$rec['name']."</td>
                     <td>".$rec['surname']."</td>
                     <td>".$rec['mobile']."</td>
                     <td>".$rec['email']."</td>
                     <td>".$rec['dept']."</td>";
                     echo "<td>".$rec['book_code1']."</td>
                     <td>".$rec['book_issue1']." to ".$rec['book_submit1']."</td>
                     <td>".$rec['book_code2']."</td>
                      <td>".$rec['book_issue2']." to ".$rec['book_submit2']."</td>
                      <td>".$rec['book1_fine']."</td>
                      <td>".$rec['book2_fine']."</td></tr>";                }
              echo "</table>";
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
    $cat->editdata($con,"subcategory ",array('sc_name' => $name, 'c_id' => $c_id)," where sc_id = ".$eid);
  ///mysqli_query($con,"update subcategory set sc_name='".$name."' , c_id='".$c_id."'  where sc_id ='".$eid."'; ");
  echo "<script>alert('Record updated');</script>";
  echo "<script>window.location.replace('subcat_view.php')</script>";
}?>

                      
                  </div>
              </div>
          </section>
      </section>

     </body>
    </html>
<?php include "footer.php" ?>