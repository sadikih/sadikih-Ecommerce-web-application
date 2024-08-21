<?php

	require_once('db_connect_class.php');
	
	class addTOcart extends DB_CONNECT{
		public function addtocart_insert($data){
			////print_r($data);
			
			$addtocart_invoice_id=$data['invoice_id'];
			$addtocart_prod_id=$data['p_code'];
			$addtocart_prod_quantity=$data['prod_quantity'];
			
			
			///// DB CONNECTION /////
			$db_connt=$this->connect;
			
			###### GET product details from product table #####
			
			$sql_single_view="SELECT prod_name, prod_price, prod_img FROM all_products WHERE prod_code='$addtocart_prod_id'";
			
			$result=$db_connt->query($sql_single_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
				if($result->num_rows ==1){
					$prod_data=$result->fetch_assoc();
					///print_r($prod_data);
					$addtocart_prod_name=$prod_data['prod_name'];
					$addtocart_prod_price=$prod_data['prod_price'];
					$addtocart_prod_img=$prod_data['prod_img'];
					
					################# Add to Cart Insert ###################

					$sql_addtocart_insert="INSERT INTO addtocart(addtocart_invoice_id, addtocart_prod_id, addtocart_prod_name, addtocart_prod_img, addtocart_prod_quantity, addtocart_prod_price) 
					VALUES ('$addtocart_invoice_id', '$addtocart_prod_id', '$addtocart_prod_name', '$addtocart_prod_img', '$addtocart_prod_quantity', '$addtocart_prod_price')";
					

					$result=$db_connt->query($sql_addtocart_insert);
					
					if(!$result){
						die('Product Add to Cart Error: '.$db_connt->error);
					}else{
						echo '<div class="alert alert-success text-center" style="width:100%;">Product Added Successfully..</div>';
						
						header('refresh:2; url=product.php');
					}
					
				}else{
					echo '<div class="alert alert-warning text-center">Product ID Does Not Match...</div>';
				}
			}
			
			
		} /// addtocart_insert
		
	################################################################
	####################### Add to Cart View #######################
		public function addtocart_view($data){
			$db_connt=$this->connect;
			$sql_addtocart_view="SELECT addtocart_invoice_id, addtocart_prod_id, addtocart_prod_name, addtocart_prod_img, addtocart_prod_quantity, addtocart_prod_price FROM addtocart WHERE addtocart_invoice_id='$data' ORDER BY addtocart_time DESC";
			
			$result=$db_connt->query($sql_addtocart_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					return $result;
			}
		}/// product_single_view
		
		
	}// addTOcart class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>