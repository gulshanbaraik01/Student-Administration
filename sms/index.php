<?php
 session_start();
include('dbcon.php');
if (isset($_SESSION['uid']))
{
	
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
  <link href="css/style.css" rel="stylesheet">
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
          <li class="active"><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
          <li><a href="about.php"><i class="fa fa-at"></i>About Us</a></li>
          <li><a href="developer.php"><i class="fa fa-smile-o"></i>Developer</a></li>
          <?php if(isset($_SESSION['uid'])){ ?>
          <li><a href="admin/admindash.php">Dashboard</a></li>
          <li style="background-color:red;"><a href="admin/logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
          <?php }else{ ?>
          <li style="background-color:red;"><a href="login.php"><i class="fa fa-user-circle"></i>Admin Login</a></li>
          <?php } ?>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-info">
        <h2>Student Information</h2>
        <div>
        <form method="post" action="index.php" >
          <div class="form-group col-md-5">
            <label for="exampleFormControlSelect1" style="color:red;">Standard</label>
              <select class="form-control" id="exampleFormControlSelect1" name="std">
                <option>--choose standard--</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
          </div>
  
          <div class="form-group col-md-5">
            <label for="exampleFormControlText1" style="color:red;">Roll No</label>
            <input class="form-control" type="text" name = "rollno" placeholder="Enter Your Rollno">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" style="margin-left:15px;">Show Info</button>
	      </form>
        </div>
      </div>

    </div>
  </section><!-- #intro -->
  

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-7 footer-info">
            <h3>SMS</h3>
            <p>This is the Student Management Portal for<br/>Organizing records of the Students.</p>
            <h2>Welcome to Student Management System</h2>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About us</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              National Institute Of Technology <br>
              Jamshedpur, JH 831014<br>
              India <br>
              <strong>Phone:</strong> +91 969 6939 380<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

  </footer><!-- #footer -->

</body>
</html>

<?php
	
	if(isset($_POST['submit']))
	{
		$standard = $_POST['std'];
		$rollno = $_POST['rollno'];
		
		include('dbcon.php');
		include('function.php');
		
		showdetails($standard, $rollno);
		
	}
?>
