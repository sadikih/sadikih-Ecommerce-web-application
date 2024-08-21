<?php

	require_once('db_connect_class.php');
	
	class Main_Category extends DB_CONNECT{
		
		public function main_category_insert($data){
			
			//print_r($data);
			$main_categ_name=trim($data['add_mcname']);
			$main_categ_folder=strtolower($main_categ_name);
			
			if(str_word_count($main_categ_folder)>1){
				$main_categ_folder=str_replace(' ','_',$main_categ_folder);
			}
			
			$folder_directory='../images/products/'.$main_categ_folder;
			///echo $main_categ_folder;
			if(!file_exists($folder_directory)){
				################################
				####### Db Insert start ########
				
				$db_connt=$this->connect;
				$sql_insert="INSERT INTO main_category (main_categ_name, main_categ_folder) VALUES ('$main_categ_name', '$main_categ_folder')";
				
				$result=$db_connt->query($sql_insert);
				if(!$result){
					die('Error: '.$db_connt->error);
				}else{
					echo '<div class="alert alert-success text-center"> New '.$main_categ_name.' Category Added Successfully</div>';
					################# Folder Create Functions
					mkdir($folder_directory,0777);
					header('refresh:2; url=category.php');
				}

				
			}else{
				echo '<div class="alert alert-danger text-center"> This Main Category Name Already Used..</div>';
			}
			
		}// main_category_insert method
		
		##################################################
		############# Main Category View #################
		
		public function main_category_view(){
			################################
			####### Db View start ########
			
			$db_connt=$this->connect;
			$sql_view="SELECT * FROM main_category";
			
			$result=$db_connt->query($sql_view);
			if(!$result){
					die('Error: '.$db_connt->error);
			}else{
				return $result;
			}
			
		}// main_category_view
		
	}// Main_Category class

	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>