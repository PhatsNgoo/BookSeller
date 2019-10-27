<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
class User{
	public $userName;
	public $userID;
	public $password;
	public $email;
	public $balance;
	public $userRole;
    private $dataMng;
	public function __construct($userName,$password,$email)
    {
        $this->userName=$userName;
        $this->password=$password;
        $this->email=$email;
        $this->balance=0.0;
        $this->userRole='User';
    }
    public function SignIn(){
        $this->dataMng=new DataManager();
        return $this->dataMng->NewUser($this);
    }
}
?>