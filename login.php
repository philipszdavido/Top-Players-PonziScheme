<?php require_once('/includes/config.php');
if($user->is_logged_in())
{
header('Location: admin');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Top Players - Login</title>
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
   <?php 
   if(isset($_POST)){
   extract($_POST);
   if(isset($username)){
   if($user->login($username,$password))
   {
   header('Location: admin');
   }
   else
   {
   $login_error='wrong username or password';
   }
   }
   }
   ?>
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
						   <h3>Login to your Top Players Account</h3>
                    	<div class="row set-row-pad"  data-scroll-reveal="enter from the bottom after 0.5s" >
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
				 <?php if(isset($login_error)){echo $login_error;}?>
					<form method="post" action="login.php">
                        <div class="form-group">
                            <input type="text" class="form-control "  required="required" placeholder="Your Username" name="username" id="username" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control " required="required"  placeholder="Your Password" name="password" id="password" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block btn-lg">LOGIN</button>
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
