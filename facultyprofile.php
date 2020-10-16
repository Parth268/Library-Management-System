<?php 
  session_start();
  include "config.php";
  $enroll=@$_SESSION['facultyemail'];
 if(@$_REQUEST['namesearch']=='search')
  {
        $search1=@$_REQUEST['sh'];
        $_SESSION['shs']=$search1;
        $_SESSION['code']=$search1;
  echo "<script>window.location.replace('search.php')</script>";

  }

    $d=date('y-m-d');
   $s=date('y-m-d', strtotime($d.'+ 3 day'));
   $s1=date('y-m-d', strtotime($d.'+ 2 day'));
   $s2=date('y-m-d', strtotime($d.'+ 1 day'));
    $qu=$cat->getdata($con," * "," facultydata","where email = '".$enroll."'","");

  // $qu=mysqli_query($con,"select * from facultydata where email='$enroll';");
   if($re=mysqli_fetch_array($qu)){
     $sub=$re['s_date'];
     $sub2=$re['s1_date'];
   }
      $s3=date('y-m-d', strtotime($d.'- 1 day'));
            $s4=date('y-m-d');

   if('20'.$s==$sub||$sub2=='20'.$s)
   {
      echo "<script>alert('4')</script>";
      $note="Your book deadline is near kindly return or renew 4 day left";
   }
   else if ('20'.$s1==$sub||$sub2=='20'.$s1) {
          echo "<script>alert('3')</script>";
          $note="Your book deadline is near kindly return or renew 3 day left";
   }
   else if ('20'.$s2==$sub||$sub2=='20'.$s2) {
          echo "<script>alert('2')</script>";
          $note="Your book deadline is near kindly return or renew 2 day left";
   }
    else if ('20'.$s3==$sub||$sub2=='20'.$s3) {
          $note="Kindly return or renew book today or you will be fine";
   }
    else if ('20'.$s4>=$sub||$sub2<='20'.$s4) {

          $note="Kindly pay your fine and return your books";
             @$fine=$d-$sub;

             $fine=$fine/10;

             $fine=$fine-1;
   }
   else
   {
      $note="No message";
   }

?>

<!DOCTYPE HTML>
<html>
<head>

<title>The Public-Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='//fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>

<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<div class="btm_border">
<div class="h_bg">
<div class="wrap">
  <div class="header">
    <div class="logo">
      <h1><a href="index.php"><img src="images/1logo.png" alt=""></a></h1>
    </div>

      
    <div class="social-icons">
      <ul>
           <li><a class="facebook" href="#" target="_blank"> </a></li>
           <li><a class="twitter" href="#" target="_blank"></a></li>
           <li><a class="googleplus" href="#" target="_blank"></a></li>
           <li><a class="dribbble" href="#" target="_blank"></a></li>
           <li><a class="vimeo" href="#" target="_blank"></a></li>
           <li>



           </li>
           
       </ul>
    </div>  
    <div class="clear"></div>
  </div>





  <div class='h_btm'>
    <div class='cssmenu'>
      <ul> <?php 
         echo "<li class='active'><a href='index.php'><span>Home</span></a></li>
          <li><a href='about.php'><span>About</span></a></li>
          <li><a href='staff.php'><span>Staff</span></a></li>
                    <li ><a href='news.php'><span>News</span></a></li>          

          <li class='last'><a href='contact.php'><span>Contact</span></a></li>";
          echo "<li ><a href='facultylogout.php'><span>Logout</span></a></li>";
          echo "<li ><a href='facultyprofile.php'><span>Profile</span></a></li>";
           echo "<li><div>
              <form class='form-group' method='post'>";
              echo "<input type='text' required class='form-control' placeholder='Search..' name='sh'>
                    </li><li><input type='submit' name='namesearch' class='btn btn-default' value='search'>";
              echo "</form></div>

              </li>";
              echo "<li>
<div class='dropdown'>
  <i style='margin-left:20px' class='glyphicon glyphicon-bell dropdown-toggle' weight='30px' height='30px'  id='id' data-toggle='dropdown'></i>
  <ul class='dropdown-menu bg-light text-info' style='margin-left:1000px' arial-labelledby='id' role='menu'>
                              <li style='padding:10px'>Notification</li>
                               <li><hr></li>
                              <li style='padding:10px'>$note</li>
                             <li><hr></li>
  </ul>
</div></li>";

          ?>
    </div>
<div class="clear"></div>
</div>
</div>
</div>
</div>


<div class='main_btm'>
<div class='wrap'>
<div class='main'>
<div class='contact'>
<div class='section group'> 
  <?php

  if(@$_REQUEST['update']!='update'){
    if (!@$_SESSION['stat2']) {
      
        $query=$cat->getdata($con," * "," facultydata","where email = '".$enroll."'","");

    //$query=mysqli_query($con,"select * from facultydata where email= '$enroll' ;");

    echo "<table class='table table-striped' >";
  if($rec=mysqli_fetch_array($query))
  {
    echo "<tr><td>Name</td><td> ".$rec['name']." </td></tr>";
    echo "<tr><td>Surname</td><td> ".$rec['surname']." </td></tr>";
    echo "<tr><td>Enroll</td><td> ".$rec['email']." </td></tr>";
    echo "<tr><td>Mobile</td><td> ".$rec['mobile']." </td></tr>";
    echo "<tr><td>Semester</td><td> ".$rec['sem']." </td></tr>";
    echo "<tr><td>Department</td><td> ".$rec['dept']." </td></tr>";
    echo "<tr><td>Book1</td><td> ".$rec['b1']." </td><tr>
          </tr><td>Date</td><td>".$rec['i_date']." to ".$rec['s_date']."</td></tr>";
    echo "<tr><td>Book2</td><td> ".$rec['b2']." </td><tr>
          </tr><td>Date</td><td>".$rec['i1_date']." to ".$rec['s1_date']."</td></tr>";

  }
  echo "</table>";
    /*  $query1=mysqli_query($con,"select * from studentdata where enroll= '$enroll' ;");

echo "<table class='table table-striped' >";
  if($rec1=mysqli_fetch_array($query1))
  {
    echo "<tr><td>Book1</td><td> ".$rec1['b1']." </td><td>Date</td><td>".$rec1['i_date']." to ".$rec1['s_date']."</td></tr>";
    echo "<tr><td>Book2</td><td> ".$rec1['b2']." </td><td>Date</td><td>".$rec1['i1_date']." to ".$rec1['s1_date']."</td></tr>";

  }
  echo "</table>"; */
  
 
 }
 else
 {
  header("location:index.php");
 }
    }

  
    if(@$_REQUEST['facultyupdate']=='done')
    {

    $name=@$_REQUEST['name'];
    $surname=@$_REQUEST['surname'];
    $email=@$_REQUEST['email'];
    $mobile=@$_REQUEST['mobile'];
    $sem=@$_REQUEST['sem'];
    $dept=@$_REQUEST['dept'];

        $statues=$cat->editdata($con,"facultydata", array("name" => $name, "sem" => $sem, "surname" => $surname, "mobile" => $mobile, "dept" => $dept ) , " where email = '".$email."'");


   //mysqli_query($con,"update facultydata set name='".$name."', sem='".$sem."', surname='".$surname."', mobile='".$mobile."', dept='".$dept."' where email='".$email."';");
         if($statues){ 
                     echo "<script>alert('Record updated');</script>";
                      echo "<script>window.location.replace('facultyprofile.php')</script>";
                    }
         else{
                      echo "<script>alert('Record Not updated');</script>";
                      echo "<script>window.location.replace('facultyprofile.php')</script>";
             }

  }  
    echo  "<a href='#' data-toggle='modal' data-target='#facultyupdate' class='btn btn-info'>Update</a>";

?>


<div id="facultyupdate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content for Student-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Profile</h4>
      </div>
      <div class="modal-body">
        <form   method="post">

       <div class="form-group">

        <input type="hidden" name="email" value="<?php echo $rec['email'] ?>">
        <br></div>
                <div class="form-group">
        <input type="text" autofocus="autofocus" name="name" required  class="form-control" value="<?php echo $rec['name'] ?>" placeholder="Name" >
        <br></div>
                
        <div class="form-group">
        <input type="text" name="surname"  required class="form-control" value="<?php echo $rec['surname'] ?>" placeholder="Surname" >
        <br></div>

         <div class="form-group">
        <input type="text" name="sem"  required class="form-control" value="<?php echo $rec['sem'] ?>" placeholder="Semester" >
        <br></div>
                <div class="form-group">

        <input type="text" max="10" min="10" name="mobile" pattern="[0-9]{10,10}" title="Enter 10 digits number." required value="<?php echo $rec['mobile'] ?>" class="form-control" placeholder="Mobile" >
        <br></div>
                <div class="form-group">

        <input type="text" name="dept" required  class="form-control" value="<?php echo $rec['dept'] ?>" placeholder="Department" >
        <br></div>
        <div class="form-group">

        <input type="text" name="pass" required  class="form-control" value="<?php echo $rec['password'] ?>" placeholder="Password" >
        </div>
         </div>
      <div class="modal-footer" >
        <input type="submit" class="btn btn-default"   name="facultyupdate" value="done" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form> 

    </div> 
  </div>
</div>


</div>
</div>
</div>
</div>
</div>
<?php include "footer.php" ?>