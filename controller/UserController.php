<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/User.php';
class UserController{
    public $userInfo;
    public $dataMng;
    public $result;
    public function __construct(){

    }
    public function Run(){
        if (isset($_GET['userid'])){
            $this->dataMng=new DataManager();
            $this->userInfo=$this->dataMng->GetUserInfo($_GET['userid']);
        }
        //Sign in function
        if (isset($_POST['SignIn'])){
            $userName=$_POST['UserNameSignIn'];
            $password=$_POST['NewPassword'];
            $email=$_POST['Email'];
            $user=new User($userName,$password,$email);
            $this->result=$user->SignIn();
        }
    }
}
?>
