<?php

	require(__DIR__.'/../db_details.php');
	
	class DB_CONNECT{
		
		private $db_host=DB_HOST;
		private $db_user=DB_USER;
		private $db_pass=DB_PASS;
		private $db_name=DB_NAME;
		
		protected $connect;
		
		public function __construct(){
			$this->db_connection();
		}
		private function db_connection(){
			$this->connect=new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
			
			if($this->connect->connect_error){
				die('DB Error: '.$this->connect->connect_error);
			}else{
				return $this->connect;
				//echo 'Database Connect Sucessfully';
			}
			
		}//db_connection method
		
	}// DB_CONNECT class

?>