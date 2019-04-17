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
    <strong>Delete Student Details</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5">

    <form method="post" action="deletestudent.php" enctype="multipart/form-data">    

        <div class="md-form mt-3">
            <label for="materialSubscriptionFormPasswords">Enter Standard</label>
            <input type="number" name="standard" class="form-control" placeholder="Enter Standard" required="required">
        </div>

        <div class="md-form">
            <label for="materialSubscriptionFormEmail">Enter Student Name</label>
            <input type="text" name="stuname" class="form-control" placeholder="Enter Student Name" required="required">
        </div>

            <!-- Sign in button -->
        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit" style="color:red;"><b>Search</b></button>
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
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Rollno</th>
      <th scope="col"> Edit </th>
    </tr>
  </thead>
  <tbody>
    <?php
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		$standard = $_POST['standard'];
		$name = $_POST['stuname'];
		
		$sql = "SELECT * FROM `student` WHERE `standard`='$standard' AND `name` LIKE '%$name%'";
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
					<td> <img src="../dataimg/<?php echo $data['image'];?>" style="max-width:100px; height: 100px;"/></td>
					<td> <?php echo $data['name']; ?> </td>
					<td> <?php echo $data['rollno']; ?> </td>
					<td> <a href="deleteform.php?sid=<?php echo $data['id']; ?>"> Delete </a> </td>
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