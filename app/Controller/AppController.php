<?php
/**
 * Application controller
 *
 * This file is the base controller of all other controllers
 *
 * PHP version 5
 *
 * @category Controllers
 * @version  1.0 
 */
 Configure::load('config');
class AppController extends Controller {
	
	var $components = array(    
		'RequestHandler',       
		'Session',
		'Auth',
		'Security',	
		'Paginator',
		'Email', 
    );
	
	 var $helpers = array(
		'Html',
		'General',
		'Form',
		//'Ajax',
		'Text',
		//'Javascript',
		//'ExPaginator',
		//'Admin',
		'Layout',
		'Session',
			
    );
	
	 public function beforeFilter() {
		
		$this->Security->blackHoleCallback = '__securityError'; 	
		$this->disableCache();
		if(isset($this->request->params['admin'])) {
		
			$this->layout = 'admin';             	     
			$this->Auth->userModel 		=	'User';
			$this->Auth->authenticate = array(
							'Form' => array(
							'scope' => array('User.status' => 1)
							)
						);
			$this->Auth->loginError 	=	__("login failed invalid username or password");
			$this->Auth->loginAction 	=   array('admin' => true, 'controller' => 'users', 'action' => 'login');	
			$this->Auth->loginRedirect 	=	 array('admin' => true, 'controller' => 'users', 'action' => 'dashboard');
			$this->Auth->authError 		= 	__('Please login');
			$this->Auth->autoRedirect 	= 	true;
			$this->Auth->allow('admin_login'); 
			
        } 
		else{	
			
			$this->Auth->userModel 		=	'User';
			$this->Auth->authenticate = array(
							'Form' => array(
							'scope' => array('User.status' => 1)
							)
						);
			$this->Auth->loginError 	=	__("login failed invalid username or password");
			$this->Auth->loginAction 	=   array('controller' => 'users', 'action' => 'login');
			$this->Auth->fields			=  array('username' => 'email', 'password' => 'password');		
			$this->Auth->loginRedirect 	=	 array('controller' => 'users','action' => 'dashboard');
			$this->Auth->logoutRedirect	= 	array('controller' => 'users', 'action' => 'login');
			$this->Auth->authError 		= 	__('Please login');
			$this->Auth->autoRedirect 	= 	true;
			$this->Auth->allow('login'); 
				
		}       
		
		$this->Auth->authorize = array('Controller');
 
		if($this->RequestHandler->isAjax()){
			$this->layout	=	'ajax';
			$this->autoRender	= false;
			$this->Security->validatePost = false;
			Configure::write('debug', 2);
		}		
    }  
	
	
	 function isAuthorized() { 		
       
		if(isset($this->request->params['admin'])) {
        if($this->Auth->user()){     
			if($this->Auth->user('role_id') != 1){
		       $this->cakeError('accessDenied');			   
		   }else{
				return true;
		   }
         }		  
	   }else{
		  return true;
	   }
    }
	
	
	function cakeError(){
		echo '<h1>Access Denied</h1>';
		exit;
	}
	
	public function get_file_directory($path = Null)
	{ 
		$dir = opendir($path);
		while ($file = readdir($dir)) 
			{ 
				if($file !=	'.' && $file !='..')
				{
					$file_array[]  = $file;
 				}
			}
		return $file_array;	
	}
	
	 public function __sendMail($To, $Subject, $message, $From,$template = null, $smtp="0")
	{
         
		$this->Email->to      = $To;
		$this->Email->from    = $From;
		$this->Email->subject = $Subject;           
		$this->Email->sendAs = 'html';			
		$this->Email->template = $template;
		$this->Email->layout = 'default';			
		
		if($smtp == 1)
		{
			
		}   
		unset($this->helpers['ExPaginator']);
		if($this->Email->send($message))
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
}
?>