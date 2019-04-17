<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location: ../login.php');
	}
?>
<?php
	include('header.php');
	include('../dbcon.php');
	
	$sid = $_GET['sid'];
	$sql = "SELECT * FROM `admin` WHERE `id` = '$sid'";
	$run = mysqli_query($con, $sql);
	$data = mysqli_fetch_assoc($run);
?>

<link rel="stylesheet" href="../css/dashboard.css">
<style>
    label{color: yellow;}
</style>

<section id="intro" class="clearfix">
    <div class="container">

    <div class="intro-info">
        <h2 align="center"><a href="admindash.php"><i class="fa fa-arrow-circle-o-left"></i>Back To Admin Dashboard<a></h2>
        <div>
        
    <!-- Material form subscription -->
<div class="card" style="box-shadow: 0 35px 45px rgba(94, 4, 4, 1.0); background-color: rgba(0,0,0,0.5);">

<h5 class="card-header info-color white-text text-center py-4" style="color: yellow;">
    <strong>Change Admin Details</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <form method="post" action="updateadmindata.php" enctype="multipart/form-data">    

        <div class="md-form mt-3">
            <label for="materialSubscriptionFormPasswords">New Admin Username</label>
            <input type="text" name="username" class="form-control" placeholder="Admin Username" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">New Admin Password</label>
            <input type="text" name="password" class="form-control" placeholder="Admin Password" required>
        </div>

            <!-- Sign in button -->
        <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit" style="color:red;"><b>Submit</b></button>
    </form>
</div>

</div>
<!-- Material form subscription -->

        </div>
      </div>

    </div>
  </section><!-- #intro -->

  </body>
</html>
