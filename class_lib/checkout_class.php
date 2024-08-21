<?php

	require_once('db_connect_class.php');
	
	class CHECKOUT extends DB_CONNECT{
		public function checkout_insert($data){
			//print_r($data);
			
			$user_id=$_SESSION['usr_id'];
			$product_discount=$data['p_discount'];
			$service_charge=$data['p_service'];
			$delivery_c_number=$data['delivery_c_number'];
			$delivery_address=$data['delivery_address'];
			if(isset($data['homedelivery'])){
				$payment_method=$data['homedelivery'];
				$payment_s_number=0;
				$payment_tid=0;
			}
			if(isset($data['bkash_payment'])){
				$payment_method=$data['bkash_payment'];
				$payment_s_number=$data['payment_s_number'];
				$payment_tid=$data['payment_tid'];
			}
			
			
			$invoice_id=session_id();
			/////////////// Database Connection
			$db_connt=$this->connect;
			$sql_view="SELECT addtocart_prod_id, addtocart_prod_quantity FROM addtocart WHERE addtocart_invoice_id='$invoice_id'";
			$result=$db_connt->query($sql_view);
			
			if(!$result){
				echo '<div class="alert alert-warning">'.$db_connt->error.'</div>';
			}else{
				$multi_sql_insert='';
				while($cart_data=$result->fetch_assoc()){
					$product_code=$cart_data['addtocart_prod_id'];
					$product_quantity=$cart_data['addtocart_prod_quantity'];
					
					$multi_sql_insert .="INSERT INTO user_cart(invoice_id, user_id, product_code, product_quantity, product_discount, service_charge, delivery_c_number, delivery_address, payment_method, payment_s_number, payment_tid) VALUES ('$invoice_id', '$user_id', '$product_code', '$product_quantity', '$product_discount', '$service_charge', '$delivery_c_number', '$delivery_address', '$payment_method', '$payment_s_number', '$payment_tid');";
				}// insert while
				$multi_sql_insert .="DELETE FROM addtocart WHERE addtocart_invoice_id='$invoice_id'";
				$multi_result=$db_connt->multi_query($multi_sql_insert);
				
				if($db_connt->error){
					echo '<div class="alert alert-warning">Multi Query Error:'.$db_connt->error.'</div>';
					echo '<div class="alert alert-warning">Multi Query Does Not Work....</div>';
				}else{
					echo '<div class="alert alert-success text-center" style="padding:25px 10px; font-size:24px;">Thank You For Your Payment...</div>';
					header('refresh:5; url=cart.php');
				}
			}
			
			
		} /// checkout_insert
	
	################################################################
	####################### Number of Invoice ID #######################
		public function checkout_num_invoice_id(){
			$db_connt=$this->connect;
			$sql_invoice_id="SELECT uc.invoice_id, ua.u_name, ua.u_email
						FROM user_cart as uc, user_access as ua
						WHERE uc.user_id=ua.u_id
						GROUP BY invoice_id
						";
			
			$result=$db_connt->query($sql_invoice_id);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					//print_r($result);
					return $result;
			}
		}/// checkout_num_invoice_id
			
	################################################################
	####################### checkout_admin_view #######################
		public function checkout_admin_view($data){
			$db_connt=$this->connect;
			$sql_view="SELECT uc.*, ua.u_name, ua.u_email, ap.prod_name, ap.prod_price, ap.prod_img
						FROM user_cart as uc, user_access as ua, all_products as ap
						WHERE uc.user_id=ua.u_id AND uc.product_code=ap.prod_code AND uc.invoice_id='$data'
						ORDER BY cart_time DESC
						";
			
			$result=$db_connt->query($sql_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					//print_r($result);
					return $result;
			}
		}/// checkout_admin_view
		
	################################################################
	####################### checkout_user_view #######################
		public function checkout_user_view(){
			$user_id= $_SESSION['usr_id'];
			$db_connt=$this->connect;
			$sql_view="SELECT uc.invoice_id, ua.u_name, ua.u_email
						FROM user_cart as uc, user_access as ua
						WHERE uc.user_id='$user_id' AND uc.user_id=ua.u_id
						GROUP BY invoice_id
						";
			
			$result=$db_connt->query($sql_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					//print_r($result);
					return $result;
			}
		}/// checkout_user_view
		
		
	}// CHECKOUT class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>