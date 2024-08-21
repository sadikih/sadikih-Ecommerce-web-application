<?php
	include'header.php';
	//require'header.php';
	
	
	if(isset($_GET['a_submit'])){
		
		require_once('functions.php');
		applicant_reg($_GET);
		
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
				<form>
					<div class="form-group"><!-- =======================field 01 -->
						<label for="fullname">Applicant Fullname</label><span style="color:red;">**</span>
						<input name="a_fullname" type="text" class="form-control" id="fullname" placeholder="Applicant Fullname">
					</div>
					<div class="form-group"><!-- =======================field 02 -->
						<label for="email">Applicant Email</label>
						<input name="a_email" type="email" class="form-control" id="email" placeholder="Applicant Email">
					</div>
					<div class="form-group"><!-- =======================field 03 -->
						<label for="phone">Applicant Phone</label>
						<input name="a_phone" type="text" class="form-control" id="phone" placeholder="Applicant Phone">
					</div>
					<div class="form-group"><!-- =======================field 04 -->
						<label class="radio" for="gender">Applicant Gender</label>
						<label class="radio-inline">
						  <input type="radio" name="a_gender" id="gender" value="M" checked> Male
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_gender" id="gender" value="F"> Female
						</label>
					</div>
					<div class="form-group"><!-- =======================field 05 -->
						<label for="dob">Applicant DoB</label><br>
						<select name="dob_day" class="form-control a_dob" id="dob">
						  <option value="" >Day</option>
							  <?php
									for($x=1; $x<=31;$x++){
										
										echo '<option value="'.$x.'">'.$x.'</option>';
									}
								
							  ?>
						</select>
						<select name="dob_mth" class="form-control a_dob">
						  <option value="" >Month</option>
						  <?php
								$mth=array('jan'=>'Jan','feb'=>'Feb','mar'=>'Mar','apr'=>'Apr','may'=>'May','jun'=>'Jun','jul'=>'Jul','aug'=>'Aug','sep'=>'Sep','oct'=>'Oct','nov'=>'Nov','dec'=>'Dec');
								
								foreach($mth as $mtv=>$mtd){
									echo '<option value="'.$mtv.'">'.$mtd.'</option>';
								}
						  ?>
						</select>
						<select name="dob_yr" class="form-control a_dob">
						  <option value="" >Year</option>
						  <?php
								for($x=2018; $x>=1980;$x--){
									
									echo '<option value="'.$x.'">'.$x.'</option>';
								}
							
						  ?>
						</select>
						
					</div>
					<div class="form-group"><!-- =======================field 06 -->
						<label for="nationality">Applicant Nationality</label>
						<input name="a_nationality" type="text" class="form-control" id="nationality" placeholder="Applicant Nationality">
					</div>
					<div class="form-group"><!-- =======================field 07 -->
						<label for="nid_bc">Applicant NID/BC</label>
						<input name="a_nid_bc" type="text" class="form-control" id="nid_bc" placeholder="Applicant NID/BC">
					</div>
					<div class="form-group"><!-- =======================field 08 -->
						<label for="religion">Applicant Religion</label>
						<select name="a_relg" class="form-control" id="religion">
						  <option value="" >Your Religion</option>
						  <?php
								$relg=array('islam'=>'Islam','hindus'=>'Hindus','buddisht'=>'Buddisht','cirstian'=>'Cirstian','others'=>'Others');
								
								foreach($relg as $relgv=>$relgn){
									echo '<option value="'.$relgv.'">'.$relgn.'</option>';
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
									echo '<option value="'.$b_groupv.'">'.$b_groupn.'</option>';
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
									echo '<option value="'.$a_divisv.'">'.$a_divisn.'</option>';
								}
						  ?>
						</select>
					</div>
					<div class="form-group"><!-- =======================field 11 -->
						<label class="radio" for="mar_sta">Applicant Marital Status</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="single"> Single
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="married"> Married
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="divorse"> Divorse
						</label>
						<label class="radio-inline">
						  <input type="radio" name="a_mar_sta" id="mar_sta" value="widow"> Widow
						</label>
					</div>
					<div class="form-group" style="overflow: hidden;"><!-- =======================field 12 -->
						<label for="course">Choose Your Subjects</label><br>
						<div class="col-xs-6">
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" id="course" value="web_design" checked>Web Design
							</label><br>
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="basic_php">Basic Php
							</label>
						</div>
						<div class="col-xs-6">
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="php_oop">Php & OOP
							</label><br>
							<label class="checkbox-inline">
							<input name="a_course[]" type="checkbox" value="advance_project">Advance Project Php & OOP
							</label>
						</div>
					</div>
					<div class="form-group"><!-- =======================field 13 -->
						<label for="address">Applicant Address</label>
						<textarea name="a_addr" type="text" class="form-control" id="address" placeholder="Applicant Address"></textarea>
					</div>
					<div class="form-group"><!-- =======================field 14 -->
						<label for="username">Applicant Username</label>
						<input name="a_uname" type="text" class="form-control" id="username" placeholder="Applicant Username">
					</div>
					<div class="form-group"><!-- =======================field 15 -->
						<label for="password">Password</label>
						<input name="a_passw" type="password" class="form-control" id="password" placeholder="Applicant Password">
					</div>
					<div class="form-group"><!-- =======================field 16 -->
						<label for="cpassword">Confirm Password</label>
						<input name="a_cpassw" type="password" class="form-control" id="cpassword" placeholder="Applicant Confirm Password">
					</div>
					<div class="form-group"><!-- =======================field 17 -->
						<label class="checkbox-inline">
						  <input name="a_agree" type="checkbox" id="trn_con" value="agree_trm_con"> I agree with this<a href="#"> term and condition.</a>
						</label>
					</div>
					<div class="form-group"><!-- =======================field Submit -->
						<button type="reset" class="btn btn-warning" >Reset</button>
						<button name="a_submit" type="submit" class="btn btn-primary">Submit</button>
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