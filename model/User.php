<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'controller/DataManager.php';
class User{
	public $userName;
	public $userID;
	public $password;
	public $email;
	public $balance;
    private $dataMng;
	public function __construct($userName,$password,$email)
    {
        $this->userName=$userName;
        $this->password=$password;
        $this->email=$email;
        $this->balance=0.0;
    }
    public function SignIn(){
        $this->dataMng=new DataManager();
        $this->dataMng->NewUser($this);
    }
}
?>