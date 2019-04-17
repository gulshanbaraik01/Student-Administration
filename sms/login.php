<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header('location: admin/admindash.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style1.css" rel="stylesheet">
  <script type="text/javascript" src="js/time.js"></script>

</head>

<body onload="startTime()">

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        
        <a href="index.php" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
        <a href="index.php" class="scrollto" style="color: white;"><b>Welcome To Student Management System</b></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><p id="time" style="font-size:14px; color: white; font-family:'Dancing script',cursive;display:inline-block;position:relative; margin-top:10px;"> </p> </li>
          <li><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
          <li><a href="about.php"><i class="fa fa-at"></i>About Us</a></li>
          <li><a href="developer.php"><i class="fa fa-smile-o"></i>Developer</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <section id="intro" class="clearfix">
    <div class="container">

    <div class="intro-info">
        <h2 align="center">Student Information</h2>
        <div>
        
    <!-- Material form subscription -->
<div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Login</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <!-- Form -->
    <form class="text-center" style="color: #757575;" action="login.php" method="post">

        <!-- Name -->
        <div class="md-form mt-3">
            <input type="text" id="materialSubscriptionFormPasswords" class="form-control" placeholder="Enter Username" name="uname" required>
            <br>
        </div>

        <!-- E-mai -->
        <div class="md-form">
            <input type="password" id="materialSubscriptionFormEmail" class="form-control" placeholder="Enter Password" name="pass" required>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="Login" value="Login">Login</button>

    </form>
    <!-- Form -->

</div>

</div>
<!-- Material form subscription -->

        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <?php

	include('dbcon.php');
	if(isset($_POST['Login']))
	{
		$username = $_POST['uname'];
		$password = $_POST['pass'];
		
		$qry = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
		$run = mysqli_query($con, $qry);
		$row = mysqli_num_rows($run);
		if ($row <1)
		{
			?>
			<script>
				alert("Username or Password not match !!");
				window.open('login.php', '_self');
			</script>
			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			
			$id = $data['id'];
			
			
			
			$_SESSION['uid'] = $id;
			
			header('location: admin/admindash.php');
			
		}
	}
?>
</body>
</html>