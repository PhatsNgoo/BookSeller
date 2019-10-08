<?php
require_once 'controller/DataManager.php';
class User{
	public $userName;
	public $userID;
	public $password;
	public $email;
	public $balance;
    private $dataMng;
	public function __construct()
    {
    }
    public function LogIn(string $userName,string $password){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->Login($userName,$password);
        if ($result)
        {
            echo 'Login success';
        }
        else
        {
            echo 'Login false';
        }
    }
    public function SignIn(){
        $user=new User();
        $this->dataMng=new DataManager();
        $this->dataMng->NewUser($user);
    }
}
?>