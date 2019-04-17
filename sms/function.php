<?php

	function showdetails($standard, $rollno)
	{
		include('dbcon.php');
		
		$sql = "SELECT * FROM `student` WHERE `rollno` = '$rollno' AND `standard` = '$standard'";
		$run = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($run)>0)
		{
			$data = mysqli_fetch_assoc($run);
            ?>
            
            <table class="table" border="2" style="position: absolute; width: 47%; top:33%; left:700px; border-color:white;">
                <thead class="thead-light">
                <tr>
                    <th colspan="3" style="text-align:center;">Student Details</th>
                </tr>
                </thead>
                <tbody style="color:white;">
                <tr>
					<td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:400px; max-width:250px; padding: 20px; margin-top:40px;" /></td>
					<th> Roll No. </th>
					<td><?php echo $data['rollno']; ?></td>
				</tr>
				<tr>
					<th> Name </th>
					<td><?php echo $data['name']; ?></td>
				</tr>
				<tr>
					<th> Standard </th>
					<td><?php echo $data['standard']; ?></td>
				</tr>
				<tr>
					<th> Parents Contact No. </th>
					<td><?php echo $data['pcont']; ?></td>
				</tr>
				<tr>
					<th> City </th>
					<td><?php echo $data['city']; ?></td>
				</tr>
            </tbody>
        </table>

            <?php
		}
		else
		{
			echo "<script> alert('No Student Found !!');</script>";
		}
	}

?>