<?php
	
	include('../dbcon.php');
		
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['sid'];
	
		
		
	$qry = "UPDATE `admin` SET `username`='$username',`password`='$password' WHERE `id` = '$id'; " ;    
	
	$run = mysqli_query($con, $qry);
	if($run == true)
	{
		?>
		<script>
			alert('Admin Data Updated Sucessfully !!');
			window.open('changeadmin.php? sid=<?php echo $id;?>','_self');
		</script>
		<?php
			

	}
?>