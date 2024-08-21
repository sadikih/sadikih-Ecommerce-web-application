<?php

	require_once('db_connect_class.php');
	
	class Sub_Category extends DB_CONNECT{
		
		public function sub_category_insert($data){
			///////// db Connect
			$db_connt=$this->connect;
			
			//print_r($data);
			$main_categ_id=$data['s_main_category'];
			$sub_categ_name=trim($data['add_scname']);
			$sub_categ_folder=strtolower($sub_categ_name);
			
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
					die('Main Category Name Error');
				}
			}
			
			################# Sub Category Folder
			if(str_word_count($sub_categ_folder)>1){
				$sub_categ_folder=str_replace(' ','_',$sub_categ_folder);
			}
			///echo $sub_categ_folder;
			
			################ Folder Directory
			$folder_directory='../images/products/'.$main_categ_folder.'/'.$sub_categ_folder;
			///echo $folder_directory;
			
			if(!file_exists($folder_directory)){
				################################
				####### Db Insert start ########
				
				$sql_insert="INSERT INTO sub_category (sub_categ_name, sub_categ_folder, main_categ_id) VALUES ('$sub_categ_name', '$sub_categ_folder','$main_categ_id')";
				
				$result=$db_connt->query($sql_insert);
				if(!$result){
					die('Error: '.$db_connt->error);
				}else{
					echo '<div class="alert alert-success text-center"> New '.$sub_categ_name.' Sub Category Added Successfully</div>';
					################# Folder Create Functions
					mkdir($folder_directory,0777);
					header('refresh:2; url=category.php');
				}

				
			}else{
				echo '<div class="alert alert-danger text-center"> This Sub Category Name Already Used..</div>';
			}
			
		}// sub_category_insert method
		
		######################################################
		############# Sub Category View Main #################
		
		public function sub_categ_view_main($data){
			################################
			####### Db View start ########
			
			$db_connt=$this->connect;
			$sql_view="SELECT * FROM sub_category WHERE main_categ_id='$data'";
			
			$result=$db_connt->query($sql_view);
			if(!$result){
					die('Error: '.$db_connt->error);
			}else{
				return $result;
			}
			
		}// sub_categ_view_main
		
		######################################################
		############# Sub Category View All #################
		
		public function sub_categ_view(){
			################################
			####### Db View start ########
			
			$db_connt=$this->connect;
			$sql_view="SELECT * FROM sub_category";
			
			$result=$db_connt->query($sql_view);
			if(!$result){
					die('Error: '.$db_connt->error);
			}else{
				return $result;
			}
			
		}// sub_categ_view
		
	}// Sub_Category class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>