<?php
	include'header.php';
	//require'header.php';
	
	if(isset($_GET['update_id'])){
		///echo $_GET['update_id'];
		require_once('functions.php');
		$result=applicant_view_each($_GET['update_id']);
		//echo '<pre>';
		///////// Getting Applicant Data
		$applicant_data=mysqli_fetch_assoc($result);
		//print_r($applicant_data);
		//echo '</pre>';
		
		////////// Explode for Applicant Date of Birth
		$applicant_dob=explode('-',$applicant_data['applicant_dob']);
		///print_r($applicant_dob);
		
		////////// Explode for Applicant Courses
		$applicant_course=explode(',',$applicant_data['applicant_course']);
		///print_r($applicant_course);
	}
	
	###################################
	//////// Update Data Insert ///////
	if(isset($_POST['a_update'])){
		require_once('functions.php');
		applicant_update($_POST);
		///print_r($_POST);
	}
?>
<style>
.a_dob{
	width:32%;
	display:inline-block;
}

</style>
				
<!-- ==================== Header Footer add er class video 6 no class a ase
========================= sobai ai video ta aber dekhe nibebn ============================= -->

<!-- ==================== Content Part ============================= -->
	<section class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
				<h1 class="text-center" >Applicant Registration</h1>
				
				<!-- ============ Form Start ======================= -->
				<form method="post">
					<input name="sl_id" value="<?php echo $_GET['update_id']; ?>" hidden>
					<div class="form-group"><!-- =======================field 01 -->
						<label for="fullname">Applicant Fullname</label><span style="color:red;">**</span>
						<input name="a_fullname" type="text" class="form-control" id="fullname" value="<?php echo $applicant_data['applicant_name']; ?>" placeholder="Applicant Fullname">
					</div>
					<div class="form-group"><!-- =======================field 02 -->
						<label for="email">Applicant Email</label>
						<label class="form-control" style="border:0;"><?php echo $applicant_data['applicant_email']; ?></label>`
					</div>
					<div class="form-group"><!-- =======================field 03 -->
						<label for="phone">Applicant Phone</label>
						<input name="a_phone" type="text" class="form-control" id="phone"  value="<?php echo $applicant_data['applicant_phone']; ?>" placeholder="Applicant Phone">
					</div>
					<div class="form-group"><!-- =======================field 04 -->
						<label class="radio" for="gender">Applicant Gender</label>
						<label class="radio-inline">
						  <input type="radio" name="a_gender" id="gender" value="M"  <?php if($applicant_data['applicant_gender']=='M')echo 'checked'; ?> > Male
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_gender" id="gender" value="F" <?php if($applicant_data['applicant_gender']=='F')echo 'checked'; ?>> Female
						</label>
					</div>
					<div class="form-group"><!-- =======================field 05 -->
						<label for="dob">Applicant DoB</label><br>
						<select name="dob_day" class="form-control a_dob" id="dob">
						  <option value="" >Day</option>
							  <?php
									for($x=1; $x<=31;$x++){
										?>
										<option value="<?php echo $x; ?>" <?php if($applicant_dob[0]==$x){ echo 'selected';}  ?>> <?php echo $x; ?></option>
										<?php
									}
								
							  ?>
						</select>
						<select name="dob_mth" class="form-control a_dob">
						  <option value="" >Month</option>
						  <?php
								$mth=array('jan'=>'Jan','feb'=>'Feb','mar'=>'Mar','apr'=>'Apr','may'=>'May','jun'=>'Jun','jul'=>'Jul','aug'=>'Aug','sep'=>'Sep','oct'=>'Oct','nov'=>'Nov','dec'=>'Dec');
								
								foreach($mth as $mtv=>$mtd){
									?>
										<option value="<?php echo $mtv; ?>" <?php if($applicant_dob[1]==$mtv){ echo 'selected';}  ?>> <?php echo $mtd; ?></option>
									<?php
								}
						  ?>
						</select>
						<select name="dob_yr" class="form-control a_dob">
						  <option value="" >Year</option>
						  <?php
								for($x=2018; $x>=1980;$x--){
									?>
										<option value="<?php echo $x; ?>" <?php if($applicant_dob[2]==$x){ echo 'selected';}  ?>> <?php echo $x; ?></option>
									<?php
								}
							
						  ?>
						</select>
						
					</div>
					<div class="form-group"><!-- =======================field 06 -->
						<label for="nationality">Applicant Nationality</label>
						<input name="a_nationality" type="text" class="form-control" id="nationality" 
					value="<?php echo $applicant_data['applicant_nationality']; ?>" placeholder="Applicant Nationality">
					</div>
					<div class="form-group"><!-- =======================field 07 -->
						<label for="nid_bc">Applicant NID/BC</label>
						<input name="a_nid_bc" type="text" class="form-control" id="nid_bc" 
					value="<?php echo $applicant_data['applicant_nid_bc']; ?>" placeholder="Applicant NID/BC">
					</div>
					<div class="form-group"><!-- =======================field 08 -->
						<label for="religion">Applicant Religion</label>
						<select name="a_relg" class="form-control" id="religion">
						  <option value="" >Your Religion</option>
						  <?php
								$relg=array('islam'=>'Islam','hindus'=>'Hindus','buddisht'=>'Buddisht','cirstian'=>'Cirstian','others'=>'Others');
								
								foreach($relg as $relgv=>$relgn){
									?>
									<option value="<?php echo $relgv; ?>" <?php if($applicant_data['applicant_relg']==$relgv){ echo 'selected';}  ?>> <?php echo $relgn; ?></option>
									<?php
								}
						  ?>
						</select>
					</div>
					<div class="form-group"><!-- =======================field 09 -->
						<label for="blood_group">Applicant Blood Group</label>
						<select name="a_b_group" class="form-control" id="blood_group">
						  <option value="" >Your Blood Group</option>
						  <?php
								$b_group=array('ap'=>'A+','an'=>'A-','bp'=>'B+','bn'=>'B-','op'=>'O+','on'=>'O-','abp'=>'AB+','abn'=>'AB-');
								
								foreach($b_group as $b_groupv=>$b_groupn){
									?>
									<option value="<?php echo $b_groupv; ?>" <?php if($applicant_data['applicant_bgroup']==$b_groupv){ echo 'selected';}  ?>> <?php echo $b_groupn; ?></option>
									<?php
								}
						  ?>
						</select>
					</div>
					<div class="form-group"><!-- =======================field 10 -->
						<label for="division">Applicant Division</label>
						<select name="a_divis" class="form-control" id="division">
						  <option value="" >Your Division</option>
						  <?php
								$a_divis=array('dhk'=>'Dhaka','ctg'=>'Chittagong','syl'=>'Sylhet','rang'=>'Rangpur','raj'=>'Rajshahi','bar'=>'Barishal','may'=>'Maymanshing','khu'=>'Khulna');
								
								foreach($a_divis as $a_divisv=>$a_divisn){
									?>
									<option value="<?php echo $a_divisv; ?>" <?php if($applicant_data['applicant_div']==$a_divisv){ echo 'selected';}  ?>> <?php echo $a_divisn; ?></option>
									<?php
								}
						  ?>
						</select>
					</div>
					<div class="form-group"><!-- =======================field 11 -->
						<label class="radio" for="mar_sta">Applicant Marital Status</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="single" <?php if($applicant_data['applicant_mstatus']=='single'){echo 'checked';} ?>> Single
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="married" <?php if($applicant_data['applicant_mstatus']=='married'){echo 'checked';} ?>> Married
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="divorse" <?php if($applicant_data['applicant_mstatus']=='divorse'){echo 'checked';} ?>> Divorse
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="widow" <?php if($applicant_data['applicant_mstatus']=='widow'){echo 'checked';} ?>> Widow
						</label>
					</div>
					<div class="form-group" style="overflow: hidden;"><!-- =======================field 12 -->
						<label for="course">Choose Your Subjects</label><br>
						<div class="col-xs-6">
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" id="course" value="web_design" <?php if(in_array('web_design',$applicant_course)){echo 'checked';} ?>>Web Design
							</label><br>
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="basic_php" <?php if(in_array('basic_php',$applicant_course)){echo 'checked';} ?>>Basic Php
							</label>
						</div>
						<div class="col-xs-6">
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="php_oop" <?php if(in_array('php_oop',$applicant_course)){echo 'checked';} ?>>Php & OOP
							</label><br>
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="advance_project" <?php if(in_array('advance_project',$applicant_course)){echo 'checked';} ?>>Advance Project Php & OOP
							</label>
						</div>
					</div>
					<div class="form-group"><!-- =======================field 13 -->
						<label for="address">Applicant Address</label>
						<textarea name="a_addr" type="text" class="form-control" id="address"  placeholder="Applicant Address"> <?php echo $applicant_data['applicant_addr']; ?></textarea>
					</div>
					<div class="form-group"><!-- =======================field 14 -->
						<label for="username">Applicant Username</label>
						<input name="a_uname" type="text" class="form-control" id="username" value="<?php echo $applicant_data['applicant_uname']; ?>" placeholder="Applicant Username">
					</div>
					<div class="form-group"><!-- =======================field Submit -->
						<button type="reset" class="btn btn-warning" >Reset</button>
						<button name="a_update" type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
				<!-- ============ Form End ======================= -->
			</div>
		</div>
	</section>
	
	
	
	
	
	
	
	
<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>