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
    <strong>Add Student Details</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <form method="post" action="addstudent.php" enctype="multipart/form-data">    

        <div class="md-form mt-3">
            <label for="materialSubscriptionFormPasswords">Roll No</label>
            <input type="text" name="rollno" class="form-control" placeholder="Enter Rollno" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">City</label>
            <input type="text" name="city" class="form-control" placeholder="Enter City" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Parent's Contact No.</label>
            <input type="text" name="pcon" class="form-control" placeholder="Enter the Contact No. of parents" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Standard</label>
            <input type="number" name="std" class="form-control" placeholder="Enter Standard" required>
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Image</label>
            <input type="file" name="simg" class="form-control-file" required>
        </div>

            <!-- Sign in button -->
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

<?php
	if(isset($_POST['submit']))
	{
		
		include('../dbcon.php');
		
		$roll = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcon = $_POST['pcon'];
		$std = $_POST['std'];
		$imagename = $_FILES['simg']['name'];
		$tempname = $_FILES['simg']['tmp_name'];
		
		move_uploaded_file($tempname, "../dataimg/$imagename");
		
	
		
		$qry = "INSERT INTO `student`( `rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$roll', '$name', '$city', '$pcon', '$std', '$imagename')";
		
		$run = mysqli_query($con, $qry);
		if($run ==true)
		{
			?>
			<script>
				alert('Data Inserted Sucessfully !!');
			</script>
			<?php
			

		}
	}
?>