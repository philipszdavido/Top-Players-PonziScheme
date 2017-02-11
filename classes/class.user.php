<?php
//require_once('includes/config.php');
include('class.password.php');

class User extends Password{

    private $db=0;
	
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

	private function get_user_hash($username){	

		try {
		//$dbd = mysql_connect('localhost','root','');
        //mysql_select_db('top players',$dbd);
        $r = mysql_query("SELECT password,username,role FROM user WHERE username='".$username."' LIMIT 1",$db);
			return $r;//$row['password'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	
	public function login($username,$password){
		$q=mysql_query("SELECT * FROM user WHERE username='".$username."' AND password='".md5($password)."'",$this->_db);
		$num=mysql_num_rows($q);
		if($num>0){
		$row = mysql_fetch_array($q,MYSQL_ASSOC);
		if($row['role']=="admin"){
		$_SESSION['role']="admin";
		$_SESSION['username']=$row['username'];
		$_SESSION['bank_account_number']=$row['bank_account_number'];
		$_SESSION['phone_number']=$row['phone_number'];
		$_SESSION['loggedin']=true;
		}else
		{
		$_SESSION['role']='non-admin';
		$_SESSION['username']=$row['username'];
		$_SESSION['bank_account_number']=$row['bank_account_number'];
		$_SESSION['phone_number']=$row['phone_number'];
		$_SESSION['loggedin']=true;
		}
		return true;
		}
		else{
		return false;
		}
		}
	
		
	public function logout(){
		session_destroy();
	}
	
}


?>