<?php

	require_once('db_connect_class.php');
	
	class All_Product extends DB_CONNECT{
		
		public function product_insert($data){
			//// echo'<pre>';
			//// print_r($data);
			//// print_r($_FILES);
			//// echo'</pre>';
			
			///////// db Connect ##################
			$db_connt=$this->connect;
			
			$prod_categ =explode('_',$data['prod_category']);
			/// print_r($prod_categ);
			$main_categ_id=$prod_categ[0];
			$sub_categ_id=$prod_categ[1];
			
			############ Main Category Folder Name #############
			$sql_main_folder="SELECT * FROM main_category WHERE sl_id='$main_categ_id'";
			$main_result=$db_connt->query($sql_main_folder);
			if(!$main_result){
					die('Error: '.$db_connt->error);
			}else{
				if($main_result->num_rows ==1){
					$main_categ=$main_result->fetch_assoc();
					$main_categ_folder=$main_categ['main_categ_folder']; /// main Category folder name
				}else{
					die('Main Category Does not Match');
				}
			}
			
			############ Sub Category Folder Name #############
			$sql_sub_folder="SELECT * FROM sub_category WHERE sl_id='$sub_categ_id'";
			$sub_result=$db_connt->query($sql_sub_folder);
			if(!$sub_result){
					die('Error: '.$db_connt->error);
			}else{
				if($sub_result->num_rows ==1){
					$sub_categ=$sub_result->fetch_assoc();
					$sub_categ_folder=$sub_categ['sub_categ_folder']; /// sub Category folder name
				}else{
					die('Sub Category Does not Match');
				}
			}
			
			$prod_code =$data['prod_code'];
			$prod_name =$data['prod_name']; 
			$prod_price =$data['prod_price']; 
			$prod_desc =$data['prod_desc']; 
			$prod_avail =$data['prod_avail']; 
			
			############################################
			############# Files Data ###################
			
			$image_name= $_FILES['prod_img']['name'];
			$image_temp_name= $_FILES['prod_img']['tmp_name'];
			$image_size= $_FILES['prod_img']['size'];
			
			$image_destination='images/products/'.$main_categ_folder.'/'.$sub_categ_folder.'/'.					   strtolower($prod_code).time().$image_name;
			
			###################### others file validation###
			///// $file_extension=pathinfo($image_name,PATHINFO_EXTENSION);
			///// echo $file_extension;
			///// $file_access=array('jpg','jpeg','png'); // just change your targeted files extenstions
			///// $image_check=in_array($file_extension,$file_access);
			
			##################### others file validation ########################
			
			///////////// only for image
			$image_check=getimagesize($image_temp_name);
			
			
			if(!$image_check){
				echo '<div class="alert alert-danger text-center">Please Insert only jpg/ jpeg/ png Image...</div>';
			}else{
				///// image size validation
				if($image_size < 240000){
					########### data insert ###########
					
					$sql_insert="INSERT INTO all_products 
								(prod_code, prod_name, prod_price, prod_desc, prod_avail, prod_img, prod_main_id,prod_sub_id) 
								VALUES 
								('$prod_code', '$prod_name', '$prod_price', '$prod_desc', '$prod_avail', '$image_destination', '$main_categ_id', '$sub_categ_id')";
								
					$result=$db_connt->query($sql_insert);
					if($db_connt->error){
						die('Error: '.$db_connt->error);
					}else{
						move_uploaded_file($image_temp_name,'../'.$image_destination);
						echo '<div class="alert alert-success text-center">Product Upload Successfully..</div>';
						header('refresh:1; url=product.php');
					}
					
				}else{
					echo '<div class="alert alert-warning text-center">Product Image size not more then 200kb..</div>';
				}
				
			}
			
			
		}// product_insert
		
		############################################################
		#################### Product Serial Id #####################
		
		public function prod_serial_id(){
			$db_connt=$this->connect;
			$sql_select="SELECT prod_id FROM all_products ORDER BY prod_id DESC LIMIT 1";
			$result=$db_connt->query($sql_select);
			if($db_connt->error){
				die('Error: '.$db_connt->error);
			}else{
				if($result->num_rows==1){
					$prod_id=$result->fetch_assoc();
					$prod_id=++$prod_id['prod_id'];
					if($prod_id < 9){
						$prod_id='00'.$prod_id;
					}else if($prod_id < 99){
						$prod_id='0'.$prod_id;
					}
					return $prod_id;
					
				}else{
					return $prod_id='001'; 
				}
			}
		}
		
	}// All_Product class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>