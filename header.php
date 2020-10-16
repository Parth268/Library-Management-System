<?php 
    include "config.php";
    session_start();
    static $s=true;
  if(@$_POST['faculty']=='login')
  {
        $email=@$_POST['flemail'];
        $pass=@$_POST['flpass'];
        $req=$cat->getdata($con," * "," facultydata","where email = '".$email."' AND password = '".$pass."'","");

       // $req=mysqli_query($con,"select * from facultydata where email='".$email."' AND password='".$pass."';");
          if(@$rec=mysqli_fetch_array($req))
          {
                   $_SESSION['stat']=true;
                   $_SESSION['facultyemail']=$email;
          }
         else
          {
               echo "<script>alert('Wrong Email or password');</script>";
         }

  }


  if(@$_POST['student']=='login')
  {
        $ssenroll=@$_POST['slenroll'];
        $pass=@$_POST['slpass'];



         $req=$cat->getdata($con," * "," studentdata","where enroll = '".$ssenroll."' AND password = '".$pass."'","");
       // $req=mysqli_query($con,"select * from studentdata where enroll='".$ssenroll."' AND password='$pass';");
          if(@$rec=mysqli_fetch_array($req))
          {
                   $_SESSION['stat2']=true;
                   $_SESSION['studentenroll']=$ssenroll;
          }
         else
          {
               echo "<script>alert('Wrong Email or password');</script>";
         }
  }

    if(@$_POST['fsignup']=='done1')
  {
      $fsemail=@$_POST['fsemail'];
      $fsname=@$_POST['fssname'];
      $fssurname=@$_POST['fssurname'];
      $fspass=@$_POST['fspass'];
      $fsdept=@$_POST['fsdept'];
      $fssem=@$_POST['fssem'];
      $fsmobile=@$_POST['fsmobile'];
   // $re1=$cat->getdata($con," * "," facultydata","where email = '".$fsemail."'","");

      $re=$cat->getdata($con," * "," facultydata","where email = '".$fsemail."'","");
     // $re =mysqli_query($con,"select * from facultydata where email = '".$fsemail."'");

    if(!$rec=mysqli_fetch_array($re))
    {
      $r=$cat->adddata($con, "facultydata", array("email"=>$fsemail, "name"=>$fsname, "surname"=>$fssurname, "sem"=>$fssem, "mobile"=>$fsmobile, "password"=>$fspass, "dept"=>$fsdept));
     // $r=mysqli_query($con,"insert into facultydata set email='$fsemail', name='$fsname', surname='$fssurname', sem='$fssem', mobile='$fsmobile', password='$fspass', dept='$fsdept';");
      if($r==null)
      {
              echo "<script>alert('Inserted');</script>";

      }else{
              echo "<script>alert('Inserted');</script>";

      }
    }

    else if(@$_POST['faculty']!='login'&&@$_POST['student']!='login'){
              echo "<script>alert('Allready facultydata exist');</script>";
      }


  }


  if(@$_POST['ssignup']=='done')
  {
      $ssenroll=@$_POST['ssenroll'];
      $ssname=@$_POST['ssname'];
      $sssurname=@$_POST['sssurname'];
      $sspass=@$_POST['sspass'];
      $ssdept=@$_POST['ssdept'];
      $sssem=@$_POST['sssem'];
      $ssmobile=@$_POST['ssmobile'];

      $sre=$cat->getdata($con," * "," studentdata","where enroll = '".$ssenroll."'","");

      //$sre =mysqli_query($con,"select * from studentdata where enroll = '".$ssenroll."'");

      $hash=password_hash($sspass,PASSWORD_DEFAULT);


    if(!$srec=mysqli_fetch_array($sre))
    {
     $r=$cat->adddata($con, "studentdata", array("enroll"=>$ssenroll, "name"=>$ssname, "surname"=>$sssurname, "sem"=>$sssem, "mobile"=>$ssmobile, "password"=>$sspass, "dept"=>$ssdept));
     //  $r=mysqli_query($con,"insert into  studentdata set sem='".$sssem."', enroll='".$ssenroll."', name='".$ssname."', surname='".$sssurname."', mobile='".$ssmobile."', password='".$sspass."' , dept='".$ssdept."' ;");

      if($r==null)
      {
              echo "<script>alert('Inserted');</script>";
      }
      else
      {
              echo "<script>alert('Inserted');</script>";
      }
    }
     else if(@$_POST['student']!='login' && @$_POST['faculty']!='login')
      {
              echo "<script>alert('Allready studentdata exist');</script>";
      }
   /*else if($srec==mysqli_fetch_array($sre)){
     echo "<script>alert('Allready exist');</script>";

      }*/
  }

  
 if(@$_POST['namesearch']=='search')
  {
        $search1=@$_POST['sh'];
        $_SESSION['shs']=$search1;
        $_SESSION['code']=$search1;

  echo "<script>window.location.replace('search.php')</script>";

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
<script type="text/javascript">
    $(window).load(function() {
        $('#facultymodal').modal('show');
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
			<!--<ul>
			     <li><a class="facebook" href="#" target="_blank"> </a></li>
			     <li><a class="twitter" href="#" target="_blank"></a></li>
			     <li><a class="googleplus" href="#" target="_blank"></a></li>
			     <li><a class="pinterest" href="#" target="_blank"></a></li>
			     <li><a class="dribbble" href="#" target="_blank"></a></li>
			     <li><a class="vimeo" href="#" target="_blank"></a></li>
		   </ul>-->
		</div>	
		<div class="clear"></div>
	</div>




<!-- Modal for faculty -->
<div id="facultymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content for faculty-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faculty Login</h4>
      </div>
        <div class="modal-body">
         <form method="post">
            <div class="form-group">

        <input type="email"  name="flemail"  autocomplete="off" class="form-control" pattern="[a-z]+@[a-z]+\.[a-z]{2.4}" placeholder="Email" >
        <br></div> <div class="form-group">
        <input type="text" name="flpass" autocomplete="off" class="form-control" placeholder="Password" >
    </div>
        </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-default" name="faculty" value="login">
                <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#facultyloginModal">Sign up</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form> 
    </div>
  </div>
</div>



<!-- Modal for Faculty Sign Up -->
 	
<!-- Modal for Student Sign Up -->
<div id="studentloginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form >
    <!-- Modal content for Student-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Sign Up</h4>
      </div>
      <div class="modal-body">
            	<form   method="post">

        <div class="form-group">
        
        <input type="text" name="ssenroll" required autocomplete="off"  class="form-control" placeholder="Enrollment num" >
        <br></div>
                <div class="form-group">
        <input type="text" name="ssname" required autocomplete="off" class="form-control" placeholder="Name" >
        <br></div>
                <div class="form-group">
        <input type="text" name="sssurname" required autocomplete="off" class="form-control" placeholder="Surname" >
        <br></div>
                <div class="form-group">
        <input type="text" name="ssmobile" required autocomplete="off" pattern="[0-9]{10,10}" title="Enter 10 digits number." class="form-control" placeholder="Mobile" >
        <br></div>

         <div class="form-group">
        <input type="text" name="sssem" required autocomplete="off" pattern="[0-9]" title="Enter digits number." class="form-control" placeholder="Semester" >
        <br></div>

        <div class="form-group">

        <input type="text" name="ssdept" required autocomplete="off"  class="form-control" placeholder="Department" >
        <br></div>
                <div class="form-group">
        <input type="text" name="sspass" required autocomplete="off"  class="form-control" placeholder="Password" >

        </div>
            
         </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-default"  name="ssignup" value="done">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>
    </form> 
  </div>
</div>

  
<!-- Modal for Faculty Sign Up -->
<div id="facultyloginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form >
    <!-- Modal content for Faculty-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faculty Sign Up</h4>
      </div>
      <div class="modal-body">
              <form   method="post">

        <div class="form-group">
        
        <input type="email" name="fsemail" required autocomplete="off" pattern="[a-z]+@[a-z]+\.[a-z]{2.4}"  class="form-control" placeholder="Email" >
        <br></div>
                <div class="form-group">
        <input type="text" name="fssname" required autocomplete="off" class="form-control" placeholder="Name" >
        <br></div>
                <div class="form-group">
        <input type="text" name="fssurname" required autocomplete="off" class="form-control" placeholder="Surname" >
        <br></div>
                <div class="form-group">
        <input type="text" name="fsmobile" required autocomplete="off" pattern="[0-9]{10,10}" title="Enter 10 digits number." class="form-control" placeholder="Mobile" >
        <br></div>
        <div class="form-group">
        <input type="text" name="fssem" required autocomplete="off" pattern="[0-9]{1,1}" max="1" mix="1" class="form-control" placeholder="Sem" >
        <br></div>
        <div class="form-group">

        <input type="text" name="fsdept" required autocomplete="off"  class="form-control" placeholder="Department" >
        <br></div>
                <div class="form-group">
        <input type="text" name="fspass" required autocomplete="off"  class="form-control" placeholder="Password" >

        </div>
            
         </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default"  name="fsignup" value="done1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>
    </form> 
  </div>
</div>





<!-- Modal for Student -->
<div id='studentmodal' class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content for Student-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Login</h4>
      </div>
      <div class="modal-body">
         <form method="post">
      		  <div class="form-group">

        <input type="text" name="slenroll" autocomplete="off" class="form-control" required placeholder="Enrollment" >
        <br></div> <div class="form-group">
        <input type="text" name="slpass" autocomplete="off" class="form-control" required placeholder="Password" >
    </div>
        </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-default" name="student" value="login">

      	      	<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#studentloginModal">Sign up</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form> 
    </div>
  </div>
</div>





<!-- Modal for search 
<div id="search" class="modal fade" role="dialog">
  <div class="modal-dialog">

  
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search</h4>
      </div>
      <div class="modal-body">
         <form method="post">
            <div class="form-group">

         <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search" >
    </div>
        </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-default" name="searchname" value="done">

                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form> 
    </div>
  </div>
</div>
</div>-->







	<div class='h_btm'>
		<div class='cssmenu'>
			<ul> <?php 


         echo "<li ><a href='index.php'><span>Home</span></a></li>
          <li><a href='about.php'><span>About</span></a></li>
          <li><a href='staff.php'><span>Staff</span></a></li>
          <li ><a href='news.php'><span>News</span></a></li>          
          <li ><a href='contact.php'><span>Contact</span></a></li>";
             
                $_SESSION['on']=true;
            $f=@$_SESSION['stat'];
            $s=@$_SESSION['stat2'];
            $r=@$_SESSION['on'];
           

            if(!$f&&!$s&&$r)
            {
              echo "
                    <li><a href='#' data-toggle='modal' data-target='#facultymodal'><span>Faculty Login</span></a></li>
                    <li><a href='#' data-toggle='modal' data-target='#studentmodal'><span>Student Login</span></a></li>";
            }
            if($f==true&&!$s){ 
              echo "<li><a href='facultylogout.php'><span> Logout</span></a></li>
                    <li><a href='facultyprofile.php'><span>Profile</span></a></li>";
            }

            if($s==true&&!$f){ 
              echo "<li><a href='studentlogout.php' ><span> Logout</span></a></li>
                    <li><a href='studentprofile.php' ><span>Profile</span></a></li>";
            }
              echo "<li><div>
              <form class='form-group' method='post'>";
              echo "<input type='text' required class='form-control' placeholder='Search..' name='sh'>
                    </li><li><input type='submit' name='namesearch' class='btn btn-default' value='search'>";
              echo "</form></div></li>";
			     ?>
          
			 	<div class="clear"></div>
			 </ul>
	</div>
  
                 <!--<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#search">Search</button>-->

	

<div class="clear"></div>
</div>
</div>
</div>
</div>
