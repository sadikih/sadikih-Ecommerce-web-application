<?php

	require_once('db_connect_class.php');
	
	class EMAIL extends DB_CONNECT{
		
		public function contact_email($data){
			print_r($data);
			 $name=$data['name'];
			 $phone=$data['phone-number'];
			 $email=$data['email'];
			 $message=$data['message'];
			
			$to='manikbd.888@gmail.com';
			$sub = 'Email Send by '.$email;
			
			$msg= 'Dear Sir,'."/r/n";
			$msg.= $message."/r/n";
			$msg.= $name."/r/n";
			$msg.= $phone."/r/n";
			$msg.= $email."/r/n";
			
			$sender = 'From:'.$email;
			
			$check= mail($to, $sub, $msg, $sender);
			if($check==true){
				echo '<div class="alert alert-success text-center">Email Sent Successfully</div>';
				header('refresh:5; url=contact.php');
			}else{
				echo '<div class="alert alert-danger text-center">Email does not send..</div>';
				header('refresh:5; url=contact.php');
			}
			
		}// contact_email method
		
	}// EMAIL class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>