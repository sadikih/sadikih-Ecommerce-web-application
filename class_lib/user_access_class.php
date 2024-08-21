<?php

	require_once('db_connect_class.php');
	
	class User_Access extends DB_CONNECT{
		
		public function member_insert($data){
			//print_r($data);
			$u_name=$data['m_name'];
			$u_email=$data['m_email'];
			$u_phone=$data['m_phone'];
			$u_address=$data['m_address'];
			$u_pass=$data['m_pwd'];
			
			
			$db_connt=$this->connect;
			$sql_insert="INSERT INTO user_access(u_name, u_email, u_phone, u_address, u_pass) VALUES ('$u_name', '$u_email','$u_phone','$u_address','$u_pass')";
			
			$result=$db_connt->query($sql_insert);
			if($db_connt->error){
				echo '<div class="alert alert-warning text-center" style="padding:5px;position: inherit;
    z-index: 9999;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						Sorry !!! You already have an account..</div>';
			}else{
				echo '<div class="alert alert-success text-center" style="padding:5px;position: inherit;
    z-index: 9999;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				Congratulation!!! you are now our member..</div>';
			}
			
			
		}/// member_insert method
		
	###################################################################
	################## User Log-In ####################################
		public function user_login($data){
			//print_r($data);
			$u_email=$data['u_email'];
			$u_pass=$data['u_pwd'];
			

			$db_connt=$this->connect;
			$sql_check="SELECT * FROM user_access WHERE u_email='$u_email' && u_pass='$u_pass'";
			$result=$db_connt->query($sql_check);
			
			if(!$result){
				die('Error: '.$db_connt->error);
			}else{
				//print_r($result);
				if($result->num_rows==0){
					echo '<div class="alert alert-danger text-center"> Your Email or Password is Invalid..</div>';
					header('refresh:2; url=payment.php');
				}else{
					///echo '<div class="alert alert-success text-center"> You are user</div>';
					$user_data=$result->fetch_assoc();
					//print_r($user_data);
					$user_name=$user_data['u_name'];
					$user_id=$user_data['u_id'];
					################## Cookie Set
					if(isset($data['u_remember'])){
						setcookie('u_email',$u_email,time()+2*60,'/');/// user email
						setcookie('u_pass',$u_pass,time()+2*60,'/');/// user password
					}else{
						setcookie('u_email','',0,'/');/// user email
						setcookie('u_pass','',0,'/');/// user password
					}
					################## Session Start
					$_SESSION['usr_name']=$user_name;
					$_SESSION['usr_email']=$u_email;
					$_SESSION['usr_id']=$user_id;
					$_SESSION['usr_ase']='asi';
					
					//header('Location: user/user.php');
				}
			}
			
		}/// user_login method
#############################################################
################### User Log Out ###########################
		public function user_logout(){
			
			session_unset();
			session_destroy();
			
			header('Location:../index.php');
		}/// user_logout method
		
	}// DB_CONNECT class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>