	<?php
/**
 * Webservices Controller
 *
 * PHP version 5
 *
 * @category Controller
 */
class WebservicesController extends AppController{
	/**
     * Controller name
     *
     * @var string
     * @access public
     */
	var	$name	=	'Webservices';
	/**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */	 
	var	$uses	=	array('User');	
	/*
	* beforeFilter
	* @return void
	*/
	 function beforeFilter(){
		parent::beforeFilter();	
		$this->Auth->allowedActions = array('*');
		$this->autoRender = false;
	}	 
	/*
	* Admin Login
	* auth magic
	*/
	
	
	function devicelogin(){
		$this->autoRender = false;
		//$data	=	'{"login":[{"imei_number":"353720058052248","user_id":"3","modal_name":"GT-I9300"}]}';
		
		
		$data = file_get_contents("php://input");
		$decoded = json_decode($data,true); 
		$imei_number	=	$decoded['login'][0]['imei_number'];
		$modal_name		=	$decoded['login'][0]['modal_name'];
		$user_id		=	$decoded['login'][0]['user_id'];
		
		/* $userData	=	$this->User->find('first',array(
						'conditions'=>array(
							'User.email'=>$username,
							'User.password2'=>$password
						)
					)); */
					
		$this->loadModel('Device');
		$fonData	=	$this->Device->find('first',array(
					'conditions'=>array(
						'Device.user_id'=>$user_id,
						'Device.imei_number'=>$imei_number
					)
				)); 
		if(!empty($fonData)){
			$msg	=	'sucess_'.$fonData['Device']['id'].'_'.$user_id;
			$responseData = array('message'=>$msg);
		}else{
			$da['Device']['user_id'] = $user_id;
			$da['Device']['imei_number'] = $imei_number;
			$da['Device']['modal_name'] = $modal_name;
			
			$this->Device->save($da);
			$id = $this->Device->id;
			$msg	=	'sucess_'.$id.'_'.$user_id;
			$responseData = array('message'=>$msg);
		}
		$data = array('response'=>$responseData);
		return json_encode($data);	
	}
	
	function login(){
		//$data	=	'{"login":[{"password":"1234356","imei_number":"353720058052248","email":"user4@gmail.com","modal_name":"GT-I9300","gcm_regid":"123456"}]}';
		
		
		$data = file_get_contents("php://input");
		$decoded = json_decode($data,true); 
		$email			=	$decoded['login'][0]['email'];
		$password		=	$decoded['login'][0]['password'];
		$imei_number	=	$decoded['login'][0]['imei_number'];
		$modal_name		=	$decoded['login'][0]['modal_name'];
		//$gcm_regid		=	$decoded['login'][0]['gcm_regid'];
		$userData	=	$this->User->find('first',array(
						'conditions'=>array(
							'User.email'=>$email,
							'User.password2'=>$password
						)
					));
		//die;	
		if(!empty($userData)){
			$this->loadModel('Device');
			$fonData	=	$this->Device->find('first',array(
						'conditions'=>array(
							'Device.user_id'=>$userData['User']['id'],
							'Device.imei_number'=>$imei_number
						)
					)); 
			if(!empty($fonData)){
				$msg	=	'sucess_'.$userData['User']['id'].'_'.$fonData['Device']['id'];
				$responseData = array('message'=>$msg);
				$devupd['Device']['id']			=	$fonData['Device']['id'];
				
				$this->Device->save($devupd);
			}else{
				
				$msg	=	'sucess_'.$userData['User']['id'];
				$responseData = array('message'=>$msg);
			}
		}else{
			$responseData = array('message'=>'failure'); 
		}
		
		$data = array('response'=>$responseData);
			
			return json_encode($data);	
	}
	
	function signup(){
		$this->loadModel('User');
		$this->loadModel('Device');
		$this->loadModel('Keyword');
		
		//$data	=	'{"signup":[{"password":"12345","email":"abc6@gmail.com","gcm_regid":"APA91bG3LffG8_sDc5VHEPdBfaX-9hkwzBn0SCuqf3e3TIj7LV5-KcVeXyImbWPNIGhNI7-3jZ-oZrQxpLz84phxQk_7iV-qSc9M4rFYsFHceYD9yfptG2Q"}]}';
		
		
		$data = file_get_contents("php://input");
		$decoded 		= 	json_decode($data,true); 
		$email			=	$decoded['signup'][0]['email'];
		$password		=	$decoded['signup'][0]['password'];
		$gcm_regid		=	$decoded['signup'][0]['gcm_regid'];
		$userData	=	$this->User->find('first',array(
						'conditions'=>array(
							'User.email'=>$email
						)
					));
		//die;	
		if(empty($userData)){
			$u['User']['password2'] 	= $password;
			$u['User']['email'] 		= $email;
			$u['User']['gcm_regid'] 	= $gcm_regid;
			
			$this->User->save($u);
			$last_insert_user_id = $this->User->id;
			
			$keyword_string = "Rkt,Pre's,Shank,Toke,Burner,Wavey,Sket,Ho,Crow,Blunted,Beef,DTD,Gwop,Booty call,CREAM,Ganga,ism,wet";	
			$keyword_array = explode(",","Rkt,Pre's,Shank,Toke,Burner,Wavey,Sket,Ho,Crow,Blunted,Beef,DTD,Gwop,Booty call,CREAM,Ganga,ism,wet");
			
			foreach($keyword_array as $val){
				$key['Keyword']['user_id'] = $last_insert_user_id;
				$key['Keyword']['name'] = $val;
				$this->Keyword->create();
				$this->Keyword->save($key);
			}
			
			
			$msg	=	'sucess_'.$last_insert_user_id;
			$responseData = array('message'=>$msg);
			
		}else{
			$responseData = array('message'=>'user already exist'); 
		}
		
		$data = array('response'=>$responseData);
			
		return json_encode($data);	
	}
	
	function devicesignup(){
		$this->loadModel('Device');
		
		//$data	=	'{"devicesignup":[{"user_id":"1","imei_number":"user420058052248","device_name":"my baby moniter device","modal_name":"GT-I9300","device_type":"monitor"}]}';
		
		
		$data = file_get_contents("php://input");
		$decoded 			= 	json_decode($data,true); 
		$user_id			=	$decoded['devicesignup'][0]['user_id'];
		$device_name		=	$decoded['devicesignup'][0]['device_name'];
		$imei_number		=	$decoded['devicesignup'][0]['imei_number'];
		$modal_name			=	$decoded['devicesignup'][0]['modal_name'];
		$device_type		=	$decoded['devicesignup'][0]['device_type'];
		
	
		$fonData	=	$this->Device->find('first',array(
					'conditions'=>array(
						'Device.user_id'=>$user_id,
						'Device.imei_number'=>$imei_number
					)
				)); 
		if(!empty($fonData)){
			$msg	=	'sucess_'.$user_id.'_'.$fonData['Device']['id'];
		}else{
		
			$da['Device']['user_id'] 		= $user_id;
			$da['Device']['imei_number'] 	= $imei_number;
			$da['Device']['modal_name'] 	= $modal_name;
			$da['Device']['device_name'] 	= $device_name;
			
			$this->Device->save($da);
			$id = $this->Device->id;
			$msg	=	'sucess_'.$user_id.'_'.$id;
		}
		$responseData = array('message'=>$msg);
			
		
		
		$data = array('response'=>$responseData);
			
		return json_encode($data);	
	}
	
	function keyword(){
		$this->loadModel('Keyword');
		$data	=	'{"keyword":{"type":"add","name":"cricket","user_id":"1"}}';  
		$data	=	'{"keyword":{"type":"list","user_id":"1"}}'; 
		$data	=	'{"keyword":{"type":"delete","name":"cricket","user_id":"1"}}'; 
		$data = file_get_contents("php://input");
		$decoded 	= 	json_decode($data,true); 
		$type 	= 	$decoded['keyword']['type'];
		$user_id 	= 	$decoded['keyword']['user_id'];
		if($type == 'add'){
			$name 	= 	$decoded['keyword']['name'];
			$da['Keyword']['user_id'] 	= $user_id;
			$da['Keyword']['name'] 	= $name;
			$this->Keyword->create();
			$this->Keyword->save($da);
			echo '{response:"success"}';
			
		}elseif($type == 'list'){
			$data	=	$this->Keyword->find('all',array(
				'conditions'=>array(
					'Keyword.user_id'=>$user_id
				)
			));
			$keyword = array();
			foreach($data as $value){
				$keyword[]['value']	=  $value['Keyword']['name'];	
			}
			$responseData = array('keyword'=>$keyword);
			return json_encode($responseData);	
			
		}elseif($type == 'delete'){
			$name 	= 	$decoded['keyword']['name'];
			$this->Keyword->deleteAll(array('Keyword.name'=>$name,'Keyword.user_id'=>$user_id));
			echo '{response:"success"}';
			
		}
		
	}
	
	
	
	function insert_data_file(){
		$this->autoRender = false;
		
		
		$user_id	=	$_REQUEST['user_id'];
		$device_id	=	$_REQUEST['device_id'];
		
		$user_dir	=	USER_DIR.DS."user_".$user_id;
		if (!file_exists($user_dir) && !is_dir($user_dir)) {
			mkdir($user_dir);         
		} 
		
		$device_dir	=	USER_DIR.DS."user_".$user_id.DS."device_".$device_id;
		if (!file_exists($device_dir) && !is_dir($device_dir)) {
			mkdir($device_dir);         
		}	
		
		if (file_exists($device_dir .DS. $_FILES["file"]["name"])){
			echo $_FILES["file"]["name"] . " already exists. ";
		}else{
			move_uploaded_file($_FILES["file"]["tmp_name"],$device_dir .DS. $_FILES["file"]["name"]);
		}
		
		$responseData = array('message'=>'success'); 
		$data = array('response'=>$responseData);
		return json_encode($data);
    }
	
	function parse_data_file(){
		$user_id = 0;
		$device_id = 0;
		$offset = 0;
		if(isset($this->request->params['named']['user_id'])){
			$user_id	=	$this->request->params['named']['user_id'];
		}
		if(isset($this->request->params['named']['device_id'])){
			$device_id	=	$this->request->params['named']['device_id'];
		}
		
		$user_dir	=	USER_DIR.DS."user_".$user_id;
		$device_dir	=	USER_DIR.DS."user_".$user_id.DS."device_".$device_id;
		if(is_dir($device_dir)){
		$files = array();
		$files = $this->listFolderFiles($device_dir);
		$this->rrmdir($device_dir);
		}
	}
	
	function listFolderFiles($dir){
		$ffs = scandir($dir);
		$i = 0;
		$list = array();
		foreach ( $ffs as $ff ){
			if ( $ff != '.' && $ff != '..' ){
				if ( strlen($ff)>=5 ) {
					if ( substr($ff, -4) == '.txt' ) {
						$list[] = $ff;
						//echo dirname($ff) . $ff . "<br/>";
						$dir.'/'.$ff.'<br/>';
						$this->readFile($dir.'/'.$ff);
					}    
				}       
				if( is_dir($dir.'/'.$ff) ) 
						$this->listFolderFiles($dir.'/'.$ff);
			}
		}
		return $list;
	}

	function readFile($file){
		$myfile = fopen($file, "r") or die("Unable to open file!");
		$data	=	 fread($myfile,filesize($file));
		
		$this->insert_data($data);
		fclose($myfile);
		
	}
	
	function removeAllFiles($dir){
		$files = glob($dir.DS.'*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
			unlink($file); // delete file
		}
	}
	
	function rrmdir($dir) {
	   if (is_dir($dir)) {
		 $objects = scandir($dir);
		 foreach ($objects as $object) {
		   if ($object != "." && $object != "..") {
			 if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
		   }
		 }
		 reset($objects);
		 rmdir($dir);
	   }
	 }
	 
	 
	 function insert_data($data){
		$this->autoRender = false;
		$this->loadModel('Log');
		
		
		
		$decoded 	= 	json_decode($data,true); 
		
		$user_id 	= 	$decoded['LOGS']['Userdata']['user_id'];
		
		$device_id 	= 	$decoded['LOGS']['Userdata']['device_id']; 
		
		
		if(!empty($decoded['LOGS'])){
			foreach($decoded['LOGS']['LOGS'] as $sms){
				$da['Log']['user_id'] 	= $user_id;
				$da['Log']['device_id'] = $device_id;
				$da['Log']['DATETIME'] 	= $sms['DATETIME'];
				$da['Log']['Content'] 	= $sms['Content'];
				$da['Log']['AppName'] 	= $sms['AppName'];
				$da['Log']['Keyword'] 	= $sms['Keyword'];
				$da['Log']['devicename'] 	= $sms['devicename'];
				
				$this->Log->create();
				$this->Log->save($da);
				
			}
		}
		
		
		
		
		$responseData = array('message'=>'success'); 
		$data = array('response'=>$responseData);
		return json_encode($data);
		
	}
	
	function get_data($user_id = null,$device_id = 0,$offset = 0){
		$user_id = 0;
		$device_id = 0;
		$offset = 0;
		if(isset($this->request->params['named']['user_id'])){
			$user_id	=	$this->request->params['named']['user_id'];
		}
		if(isset($this->request->params['named']['device_id'])){
			$device_id	=	$this->request->params['named']['device_id'];
		}
		if(isset($this->request->params['named']['offset'])){
			$offset	=	$this->request->params['named']['offset'];
		}
		$filter	=	array();
		$filter[]	=	array('Log.user_id'=>$user_id);
		if($device_id != 0){
			$filter[]	=	array('Log.device_id'=>$device_id);
		}
		$this->loadModel('Log');
		$data	=	$this->Log->find('all',array(
			'conditions'=>$filter,
			'limit'=>50,
			'offset'=>$offset,
			'order'=>'Log.DATETIME desc'
		));
		$r	=	array();
		$cnt = 0;
		foreach($data as $value){
			$r[$cnt]['DATETIME']			=	$value['Log']['DATETIME'];
			$r[$cnt]['AppName'] 			=	$value['Log']['AppName'];
			$r[$cnt]['Keyword'] 			=	$value['Log']['Keyword'];
			$r[$cnt]['Content'] 			=	$value['Log']['Content'];
			$r[$cnt]['id'] 					=	$value['Log']['id'];
			$r[$cnt]['devicename'] 			=	$value['Log']['devicename'];
			$cnt ++;
		}
		
		$data = array('Logs'=>$r);
		echo json_encode($data);
		
	}
	
	function device_list($user_id = null){
		$user_id = 0;
		$device_id = 0;
		$offset = 0;
		if(isset($this->request->params['named']['user_id'])){
			$user_id	=	$this->request->params['named']['user_id'];
		}
		$filter[]	=	array('Device.user_id'=>$user_id);
		$this->loadModel('Device');
		$data	=	$this->Device->find('all',array(
			'conditions'=>$filter,
		));
		$r	=	array();
		$cnt = 0;
		
		foreach($data as $value){
			$r[$cnt]['id']				=	$value['Device']['id'];
			$r[$cnt]['device_name'] 	=	$value['Device']['device_name'];
			$cnt ++;
		}
		
		$data = array('Device'=>$r);
		echo json_encode($data);
		
	}
	
	
	function delete_log($id = null){
		$this->loadModel('Log');
		$this->Log->delete(array('Log.id'=>$id));
		$responseData = array('message'=>'success'); 
		$data = array('response'=>$responseData);
		return json_encode($data);
	}
	
	function update_gcm_regid() {
		$this->loadModel('User');
		//$data	=	'{"data":[{"user_id":"1","gcm_regid":"123456"}]}';
		$data 			= file_get_contents("php://input");
		$decoded 		= 	json_decode($data,true); 
		$user_id		=	$decoded['data'][0]['user_id'];
		$gcm_regid		=	$decoded['data'][0]['gcm_regid'];
		$d['User']['id']		=	$user_id;
		$d['User']['gcm_regid']	=	$gcm_regid;
		$this->User->save($d);
		$msg	=	'sucess';
		$responseData = array('message'=>$msg);
		$data = array('response'=>$responseData);
		return json_encode($data);	
	}
	
	function send_push_notification_start($device_id, $message) {
		$this->loadModel('Device');
		$this->loadModel('User');
		$data1	=	$this->Device->find('first',array(
			'conditions'=>array(
				'Device.id'=>$device_id
			),
		));
		$data2	=	$this->User->find('first',array(
			'conditions'=>array(
				'User.id'=>$data1['Device']['user_id']
			),
		));
		$gcm_regid	=	$data2['User']['gcm_regid'];
		
		$message = array("Message" =>$message);
		$this->send_push_notification($gcm_regid, $message);
	}
	
	
	function send_push_notification($gcm_regid, $message) {
        $registatoin_ids = array($gcm_regid);
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

        $headers = array(
            'Authorization: key=AIzaSyB3XrlQOR3mg_9D07OqYTItrR3aDszpBk4',
            'Content-Type: application/json'
        );
		//print_r($headers);
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        echo $result;
    }
}
?>