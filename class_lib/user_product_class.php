<?php

	require_once('db_connect_class.php');
	
	class User_Product extends DB_CONNECT{
		public function all_product_view(){
			$db_connt=$this->connect;
			$sql_all_view="SELECT * FROM all_products";
			
			$result=$db_connt->query($sql_all_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
				return $result;
			}
		}/// all_product_view
		
	##############################################################
	#################### Single Product View ##################
		public function product_single_view($data){
			$db_connt=$this->connect;
			$sql_single_view="SELECT ap.*, mc.main_categ_name, sc.sub_categ_name
							  FROM all_products as ap, main_category as mc, sub_category as sc 
							  WHERE ap.prod_code='$data' AND ap.prod_main_id=mc.sl_id AND ap.prod_sub_id=sc.sl_id";
			
			$result=$db_connt->query($sql_single_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					return $result;
			}
		}/// product_single_view
		
	#############################################################
	#################### category Product View ##################
		public function product_categ_view($data){
			$main_id=$data['m_id'];
			$sub_id=$data['s_id'];
			
			
			$db_connt=$this->connect;
			$sql_categ_view="SELECT * FROM all_products WHERE prod_main_id='$main_id' && prod_sub_id='$sub_id'";
			
			$result=$db_connt->query($sql_categ_view);
			if(!$result){
				die('Product Error: '.$db_connt->error);
			}else{
					return $result;
			}
		}/// product_categ_view
		
		
		
		
	}// User_Product class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>