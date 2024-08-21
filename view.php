<?php
	include'header.php';
	//require'header.php';
	require_once('functions.php');
	$applicant_table=applicant_view();
	//echo '<pre>';
	//print_r($applicant_table);
	///print_r(mysqli_fetch_array($applicant_table));
	//print_r(mysqli_fetch_assoc($applicant_table));
	//echo '</pre>';
	
#################### Delete User ############
if(isset($_GET['delete_id'])){
	///echo $_GET['delete_id'];
	require_once('functions.php');
	applicant_delete($_GET['delete_id']);
}

#############################################
?>


<!-- ==================== Header Footer add er class video 6 no class a ase
========================= sobai ai video ta aber dekhe nibebn ============================= -->

<!-- ==================== Content Part ============================= -->
	<section class="container">
		<div class="row">
			<table class="table table-bordered table-striped">
				<tr>
					<th>sl</th>
					<th>Applicant Fullname</th>
					<th>Applicant Email</th>
					<th>Applicant Phone</th>
					<th>Applicant Gender</th>
					<th>Applicant DoB</th>
					<th>Applicant Nationality</th>
					<th>Applicant NID/BC</th>
					<th>Applicant Religion</th>
					<th>Applicant Blood Group</th>
					<th>Applicant Division</th>
					<th>Applicant Marital Status</th>
					<th>Applicant Subjects</th>
					<th>Applicant Address</th>
					<th>Applicant Username</th>
					<th>Action</th>
				</tr>
<?php
	if($applicant_table->num_rows >0){
		$x=1;
		while($applicant_data = mysqli_fetch_assoc($applicant_table)){
			######## applicant Id
			//echo $applicant_data['sl_id'];
			//echo '<pre>';
			//print_r($applicant_data);
			//echo '</pre>';
			?>
			
				<tr>
					<td><?php echo $x++; ?></td>
					<td><?php echo $applicant_data['applicant_name']; ?></td>
					<td><?php echo $applicant_data['applicant_email']; ?></td>
					<td><?php echo $applicant_data['applicant_phone']; ?></td>
					<td><?php echo $applicant_data['applicant_gender']; ?></td>
					<td><?php echo $applicant_data['applicant_dob']; ?></td>
					<td><?php echo $applicant_data['applicant_nationality']; ?></td>
					<td><?php echo $applicant_data['applicant_nid_bc']; ?></td>
					<td><?php echo $applicant_data['applicant_relg']; ?></td>
					<td><?php echo $applicant_data['applicant_bgroup']; ?></td>
					<td><?php echo $applicant_data['applicant_div']; ?></td>
					<td><?php echo $applicant_data['applicant_mstatus']; ?></td>
					<td><?php echo $applicant_data['applicant_course']; ?></td>
					<td><?php echo $applicant_data['applicant_addr']; ?></td>
					<td><?php echo $applicant_data['applicant_addr']; ?></td>
					
					<td style="white-space: nowrap; vertical-align:middle;">
					<a href="applicant_update.php?update_id=<?php echo $applicant_data['sl_id']; ?>" role="button" class="btn btn-xs btn-warning">Edit</a> 
					<a href="?delete_id=<?php echo $applicant_data['sl_id']; ?>" role="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
			<?php
		}// while loop
		
	}else{
		?>
				<tr>
					<td colspan="16" class="alert alert-info text-center">Their have No Data in this Table</td>
				</tr>		
		
		<?php
	}
?>

			</table>
		</div>
	</section>
	
	
	
	
	
	
	
<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>
