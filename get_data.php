
<?php


#To Do: Open a directory, and read its data
class cls_read_dir{
	
	protected static $file = null;
	protected $file_full_path;
	protected $basename;
	protected $filename;
	protected $fmt_allowed ; 
	
	
	
	//To Do:  read system files
	public function fxn_read_dir(){
		
		if (is_dir(_DATA_DIR_)){

			if ($dh = opendir(_DATA_DIR_)){
		  
				while (($file = readdir($dh)) !== false){
				
					//To Do: Safety:Jump the reserved directories from listing										
					if($file =='.' || $file=='..') continue;
					
					// To Do:Check file size limit //Check more later
						/*if (filesize($file) > 50000) {
							echo "<pre>ERROR:<i>Too large file found!</i></pre>";exit;
						}*/
								
						//To Do: Get the path information
						$file = pathinfo($file);
						
						//To Do: Extract the file information //Lower the case for consistency
						$basename		 = strtolower($file['basename']);
						$filename 		 = strtolower($file['filename']);
						$fmt_allowed 	 = strtolower($file['extension']);
						
						 //To Do: Get file full  path
						 $file_full_path = _DATA_DIR_.'/'.$basename;
						 
						 //To Do: Check file file format;To Do: Call Insert data op
						if($fmt_allowed == "jpg" || $fmt_allowed == "png" || $fmt_allowed == "gif" || $fmt_allowed == "jpeg" ){
							#$this->fxn_insert_data($basename,$fmt_allowed,$file_full_path );

						echo( '
							<div class="image polaroid rotate_right" style="background:url('.$file_full_path.') no-repeat;">
							<a href="'.$file_full_path.'" title="'.$filename.'" target="_blank">'.$filename.'</a>
							<div class="overlay"><div class="text">'.$filename.'.<br><span>1880-1970</span></div></div>
							</div>'
						);

						}else{
							 echo "<pre>ERROR:<i>Wrong file format found!</i></pre>";exit;
							
						}
					
				}
				
				//To Do: Then close the directory
				 closedir($dh);
				//To Do: Return the fullpath
				 return $file_full_path;
		  }
		}
		//To Do:Close connection after the last transaction
		$db_conn->close();
	}
	
		
	//To Do: Populate db
	public function fxn_insert_data($basename,$fmt_allowed,$file_full_path ){
				
			//To Do: Call Insert data op
			  $db_conn =$this->fxn_connect();
			 
			 //To Do: Change Insert db
			if($db_conn->select_db(CONS_MYSQL_INSERT_DB)){
				 
				//To Do: Create Insert db query
				$db_insert_query ="INSERT INTO tb_gallery (base_name,pic_fmt,pic_full_path,pic_post_date,pic_date_approved) 
					VALUES ('".$basename."','".$fmt_allowed."','".$file_full_path."',now(),now())";
					
				//To Do: Check query result
				if($db_conn->query($db_insert_query)== TRUE){/*BE SILENT*/;}
				else{ echo 'ERROR:'. $db_conn->error;}

				//To Do:Comment out this if you want the last transaction
				#$db_last_insert_id = $db_conn->insert_id;
			 }else{echo "DB selection failed!";}
	}
	
	//To Do: Connect to db
	public function fxn_connect(){
						
			$host = array(	
				'host'	=> CONS_HOST_SERVER,
				'user'	=> CONS_SERVER_USERNAME,
				'pass'	=> CONS_SERVER_PASSWORD,
				'db'	=> CONS_MYSQL_CONN_DB
			);
			
			//To Do: Housekeeping
			$db_host   		= htmlentities(htmlspecialchars($host['host'])); 
			$db_username   	= htmlentities(htmlspecialchars($host['user'])); 
			$db_password	= htmlentities(htmlspecialchars($host['pass']));
			$db_name    	= htmlentities(htmlspecialchars($host['db']));
			 
			//To Do: Create connection
			$db_conn = new mysqli($db_host, $db_username, $db_password, $db_name);
			
			// To Do:Check connection
			if ($db_conn->connect_error) {
					die("ERROR:Connection failed: " . $db_conn->connect_error);
			}else{
				 return $db_conn;
			}
	}
}

$read_dir_obj = new cls_read_dir();
$read_dir_obj ->fxn_read_dir();

?>
