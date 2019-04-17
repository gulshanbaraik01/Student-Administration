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
?>
<link rel="stylesheet" href="../css/dashboard.css">

<section id="intro" class="clearfix">
    <div class="container">

    <div class="intro-info">
        <h2 align="center">Admin Dashboard</h2>
        <div>
        
    <!-- Material form subscription -->
<div class="card" style="box-shadow: 0 35px 45px rgba(94, 4, 4, 1.0); background-color: rgba(0,0,0,0.5);">

<h5 class="card-header info-color white-text text-center py-4" style="color: yellow;">
    <strong>Admin Panel</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: rgba(0,0,0,0.1);"><a href="addstudent.php">Add Student Details</a></button>
    <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: rgba(0,0,0,0.1)";><a href="updatestudent.php">Update Student Details</a></button>
    <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: rgba(0,0,0,0.1)";><a href="deletestudent.php">Delete Student Details</a></button>
    <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: rgba(0,0,0,0.1)";><a href="changeadmin.php">Change Admin Details</a></button>
</div>

</div>
<!-- Material form subscription -->

        </div>
      </div>

    </div>
  </section><!-- #intro -->