<?php

	require_once('db_connect_class.php');
	
	class adminLogin extends DB_CONNECT{
		
		public function admin_login($data){
			//print_r($data);
			$a_email=$data['a_email'];
			$a_pass=$data['a_pwd'];
			

			$db_connt=$this->connect;
			$sql_check="SELECT * FROM admin_access WHERE admin_email='$a_email' && admin_pass='$a_pass'";
			$result=$db_connt->query($sql_check);
			
			if(!$result){
				die('Error: '.$db_connt->error);
			}else{
				//print_r($result);
				if($result->num_rows==0){
					echo '<div class="alert alert-danger text-center"> Your Email or Password is Invalid..</div>';
					header('refresh:2; url=index.php');
				}else{
					///echo '<div class="alert alert-success text-center"> You are admin</div>';
					$admin_data=$result->fetch_assoc();
					//print_r($admin_data);
					$admin_name=$admin_data['admin_name'];
					$admin_role=$admin_data['admin_role'];
					################## Cookie Set
					if(isset($data['a_remember'])){
						setcookie('a_email',$a_email,time()+2*60,'/');/// admin email
						setcookie('a_pass',$a_pass,time()+2*60,'/');/// admin password
					}else{
						setcookie('a_email','',0,'/');/// admin email
						setcookie('a_pass','',0,'/');/// admin password
					}
					################## Session Start
					$_SESSION['adm_name']=$admin_name;
					$_SESSION['adm_action']=$admin_role;
					$_SESSION['adm_ase']='asi';
					
					header('Location: admin.php');
				}
			}
			
		}/// admin_login method
#############################################################
################### Admin Log Out ###########################
		public function admin_logout(){
			
			session_unset();
			session_destroy();
			
			header('Location:index.php');
		}
		
	}// DB_CONNECT class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>