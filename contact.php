
<?php
  include "config.php";
  if(@$_REQUEST['b']=='submit')
  {
    $username=@$_REQUEST['username'];
    $useremail=@$_REQUEST['useremail'];
    $userphone=@$_REQUEST['userphone'];
    $usersub=@$_REQUEST['usersub'];

   $cat->adddata($con, "contact", array("con_name"=>$username,"con_email"=>$useremail,"con_phone"=>$userphone,"con_sub"=>$usersub));
	/// mysqli_query($con,"insert into  contact set con_name='".$username."' , con_email='".$useremail."' , con_phone='".$userphone."' , con_sub='".$usersub."';");
    echo "<script>alert('Data Inserted')</script>";
   

  

  }  
?>


<?php include "header.php" ?>
<!--main-->
<div class="main_btm">
<div class="wrap">
<div class="main">
	<div class="contact">
		<div class="section group">				
				<div class="col span_1_of_2">
					<div class="contact_info">
			    	 	<h2>Find Us Here</h2>
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.8570301459295!2d70.74144421425237!3d22.245502685352083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cb93b67e7871%3A0x4fabd9742c7bbad8!2sGEC%20Rajkot%20Library!5e0!3m2!1sen!2sin!4v1570419460625!5m2!1sen!2sin"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color: #575757;text-align:left;font-size:13px">View Larger Map</a></small>
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h2>Address </h2>
						<p>Rajkot, Gujarat 360005</p>
						<p>Near Kankot pati,</p>
						<p>INDIA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <a href="gecr@gmail.com">gecr.com</a></p>
				   		<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>

				   </div>
				   <div class="clear"></div>
				</div>				
				<div class="col span_2_of_4">
				  <div class="contact-form">
				  	<h2 class="style">Contact Us</h2>
					       <form>
					    	<div>
					    		  <div class="form-group">
						    	<span><label>NAME</label></span>
						    	<span><input name="username" class="form-control" type="text" pattern="[A-z]{3,10}" placeholder="Name" title="No Number is allowed" required class="textbox" size="150px"></span>
						        </div>
						    </div>
						    <div>
						    	<div class="form-group">
						    	<span><label>E-MAIL</label></span>
						    	<span><input class="textbox" class="form-control" name="useremail" pattern="[a-z]+@[a-z]+\.[a-z]{2.4}" placeholder="Email" type="email" size="170px" required ></span>
						    </div>
						      </div>
						    <div>
						    	<div class="form-group">
						     	<span><label>MOBILE</label></span>
						    	<span><input name="userphone" class="form-control" type="text"  pattern="[0-9]{10,10}" title="Enter 10 digits number." placeholder="Mobile" max="10" min="10" size="170px" required ></span>
						    </div>
						      </div>
						    <div>
						    	<div class="form-group">
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="usersub" class="form-control"> </textarea></span>
						    </div>
						      </div>
						   <div>
						   		<span><input type="submit" value="submit" name="b"></span>
						  </div>
						    </div>
					    </form>
				    </div>
  				</div>		
  			<div class="clear"></div>
		  </div>
	</div>
</div>
</div>
</div>
<!--footer-->
<?php include "footer.php" ?>