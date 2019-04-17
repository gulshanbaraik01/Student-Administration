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
    <strong>Change Admin Details</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <form method="post" action="changeadmin.php" enctype="multipart/form-data">    

        <div class="md-form mt-3">
            <label for="materialSubscriptionFormPasswords">Enter Standard</label>
            <input type="text" name="adminuser" class="form-control" placeholder="Enter Admin Username" required="required">
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Enter Admin Password</label>
            <input type="password" name="adminpass" class="form-control" placeholder="Enter Admin Password" required="required">
        </div>

            <!-- Sign in button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit" style="color:red;"><b>Update</b></button>
    </form>
</div>

</div>
<!-- Material form subscription -->

        </div>
      </div>

    </div>

    <div>
        <br/>
        <br/>

    <table class="table" width="80%" border="3" style="margin-top:10px; border-color: white;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		$adminuser = $_POST['adminuser'];
		$adminpass = $_POST['adminpass'];
		
		$sql = "SELECT * FROM `admin` WHERE `username` = '$adminuser';";
		$run = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($run)<1)
		{
			echo "<tr style='color:white;'><td colspan='5'><b>No Record Found !!</b></td></tr> ";
		}
		else
		{
			$count = 0;
			while ($data = mysqli_fetch_assoc($run))
			{
				$count++;
				?>
				<tr align="center" style="color:white; font-size:22px;">
                <td> <?php echo $count; ?> </td>
					<td> <?php echo $data['username']; ?> </td>
					<td> <?php echo $data['password']; ?> </td>
					<td> <a href="updateadminform.php?sid=<?php echo $data['id']; ?>"> Change </a> </td>
				</tr>
				<?php
			}
		}
	}
?>
  </tbody>
</table>

    </div>

  </section><!-- #intro -->
  
  </body>
</html>