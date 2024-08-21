<?php

	require_once('db_connect_class.php');
	
	class Add_Admin extends DB_CONNECT{
		
		public function admin_insert($data){
			//print_r($data);
			
			$admin_role= $data['add_arole'];
			$admin_name= $data['add_aname'];
			$admin_email= $data['add_aemail'];
			$admin_pass= $data['add_apwd'];
			
			################################
			####### Db Insert start ########
			
			$db_connt=$this->connect;
			$sql_insert="INSERT INTO admin_access (admin_name, admin_email, admin_pass, admin_role) VALUES ('$admin_name', '$admin_email', '$admin_pass', '$admin_role')";
			
			$result=$db_connt->query($sql_insert);
			if(!$result){
				die('Error: '.$db_connt->error);
			}else{
				echo '<div class="alert alert-success text-center"> New '.$admin_role.' Added Successfully</div>';
				header('refresh:2; url=add_admin.php');
			}
			
			
			
		}// admin_insert method
		
	}// Add_Admin class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>