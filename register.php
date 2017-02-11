<?php require_once('includes/config.php');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Top Players - Register</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body >
 <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img class="logo-custom" src="assets/img/logo180-50.png" alt=""  /></a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="index.php">HOME</a></li><!--
                     <li><a href="#features-sec">ABOUT US</a></li>
                    <li><a href="#faculty-sec">HOW IT WORKS</a></li>
                     <li><a href="#course-sec">TESTIMONIES</a></li>
                     <li><a href="#contact-sec">CONTACT</a></li><-->
                </ul>
            </div>
           
        </div>
    </div>
      <!--NAVBAR SECTION END-->
       <div class="home-sec" id="home">
           <div class="overlay">
 <div class="container">
           <div class="row text-center " >
           
               <div class="col-lg-12  col-md-12 col-sm-12">
               
                <div class="flexslider set-flexi" id="main-section" >
                    <ul class="slides move-me">
                        <!-- Slider 01 -->
                        <li>
                              <h3>Welcome To Top Players</h3>
                           <h1>THE UNIQUE METHOD</h1>
						   <h3>Sign Up to your Top Players Account</h3>
                    	<div class="row set-row-pad"  data-scroll-reveal="enter from the bottom after 0.5s" >
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
				    <?php 
   if(isset($_POST)){
   extract($_POST);
   if(isset($username)){
   if($password !== $c_password){
   $pass_mismatch="passwords dont match. please try again";
   }
   if($bank_name=="--Bank Name--"){
	   $bank_name_error='please, select a bank';
	   }
	if(mysql_num_rows(mysql_query("SELECT * FROM user WHERE username='".$username."'",$db))>0){
	$user_exist_error="username already exist";
	}
	if(!isset($pass_mismatch) and !isset($bank_name_error) and !isset($user_exist_error) and !isset($bank_name_error)){
	if(mysql_num_rows(mysql_query("SELECT * FROM user WHERE bank_account_number='".$bank_account_number."'",$db))>0){
	   			$bank_name_exist_error="bank account exist";
	   							}
	   if(!isset($bank_name_exist_error)){
	   $t=mysql_query("INSERT INTO user(username,fullname,password,phone_number,bank_account_name,bank_account_number,bank_name,role) VALUES('".$username."','".$fullname."','".md5($password)."','".$phone_number."','".$bank_account_name."','".$bank_account_number."','".$bank_name."','non-admin')",$db);
	   header('Location: login.php');
	   exit;
	   }
	}
   }
   }
   
   ?>

					<form method="post" action="register.php">
					     <div class="form-group">
                            <input type="text" class="form-control "  required="required" placeholder="Fullname" name="fullname" id="fullname" />
                        </div>

                        <div class="form-group">
						<?php if(isset($user_exist_error)){echo $user_exist_error;}?>
                            <input type="text" class="form-control "  required="required" placeholder="Username" name="username" id="username" />
                        </div>
						<div class="form-group">
                            <input type="text" class="form-control "  required="required" placeholder="Your Email Address" name="email" id="email" />
                        </div>
                        <div class="form-group">
						<?php if(isset($pass_mismatch)){echo $pass_mismatch;}?>
                            <input type="password" class="form-control "  required="required" placeholder="Password" name="password" id="password" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control "  required="required" placeholder="Confirm Password" name="c_password" id="c_password" />
                        </div>                        
						<div class="form-group">
                            <input type="text" class="form-control "  required="required" placeholder="Phone Number" name="phone_number" id="phone_number" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control " required="required"  placeholder="Bank Account Name" name="bank_account_name" id="bank_account_name" />
                        </div>
                        <div class="form-group">
						<?php if(isset($bank_name_exist_error)){echo $bank_name_exist_error;}?>
                            <input type="text" class="form-control " required="required"  placeholder="Bank Account Number" id="bank_account_number" name="bank_account_number" />
                        </div>
						<div class="form-group">
						<?php if(isset($bank_name_error)){echo $bank_name_error;}?>
							<select id="bank_name" class="form-control" name="bank_name" required="required" placeholder="Bank Name">
							<option>--Bank Name--</option>
							<option>First Bank</option><option>UBA</option><option>Fidelity Bank</option>
							<option>Ecobank</option><option>Access</option><option>Diamond Bank</option>
							<option>Guaranty Trust Bank</option><option>Heritage Bank</option><option>Citi Bank</option>
							<option>Keystone Bank</option><option>Skye Bank</option><option>MainStreet Bank</option>
							<option>Skye Bank</option><option>Stanbic IBTC Bank</option><option>Standard Chartered Bank</option>
							<option>Sterling Bank</option><option>Sun Trust</option><option>Union Bank</option>
							<option>Unity Bank</option><option>Wema Bank</option><option>Zenith Bank</option>
							<option>First City Monument Bank</option><option>Enterprise Bank</option>
							</select>
							</div>                   
							By clicking the "Create Account" button, you are indicating that you have read and agreed to our <a href="">Terms and Conditions</a>
						<div class="form-group">
                            <button type="submit" class="btn btn-info btn-block btn-lg">REGISTER</button>
                        </div>

                    </form>
					</div></div>
                        </li>
                    </ul>
                </div>
                
               </div>
                </div>
           </div>
           
       </div>
       <!--HOME SECTION END-->   
        <div id="footer">
          &copy 2017 All Rights Reserved |  <a href="http://www.facebook.com/philipdavid" style="color: #fff" target="_blank">Design by : philipsz-davido</a>
    </div>

    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="assets/js/custom.js"></script>
</body>
</html>
