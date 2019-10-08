<?php
require_once('controller/DataManager.php');
require_once('model/Order.php');
require_once('model/Transaction.php');
require_once('model/User.php');
require_once('model/Book.php');
require_once('model/GiftCode.php');
class Controller{
    public $dataMng;
    public function __construct()
    {
        $this->dataMng=new DataManager();
    }

    public function run(){
//        $this->dataMng->GetAllBooks();
//        $login=isset($_POST['LogIn'])?$_POST['LogIn']:'';
//        $signin=isset($_POST['SignIn'])?$_POST['SignIn']:'';
//        $submitBook=isset($_POST['NewBook'])?$_POST['NewBook']:'';
//Sign in function
        if (isset($_POST['SignIn'])){
            $userName=$_POST['UserNameSignIn'];
            $password=$_POST['NewPassword'];
            $email=$_POST['Email'];
            $this->dataMng->NewUser($userName,$password,$email,0.0);
        }
//Login function
        if (isset($_POST['LogIn'])){
            $userName=$_POST['UserName'];
            $password=$_POST['Password'];
            $this->dataMng->Login($userName,$password);
        }
//Add book function
        if (isset($_POST['NewBook'])) {
            $bookName=$_POST['BookName'];
            $category=$_POST['BookCategory'];
            $bookDescription=$_POST['BookDescription'];
            $price=$_POST['BookPrice'];
            echo $price;
            $author=$_POST['Author'];
            $result=$this->dataMng->NewBooks($bookName,$price,$bookDescription,$author,$category);
            if ($result==true){
                $targetDir='Assets/BooksImage/';
                $imageFileType = strtolower(pathinfo(basename($_FILES['BookImage']['name']),PATHINFO_EXTENSION));
                $targetFile = $targetDir .$bookName.'.'.$imageFileType;
                echo $targetFile;
                $uploadState=1;
                $check=getimagesize($_FILES['BookImage']['tmp_name']);
                if ($check!==false)
                {
                    $uploadState=1;
                }
                else
                {
                    $uploadState=0;
                }
                //Check if file is exist
                if (file_exists($targetFile)){
                    $uploadState=0;
                }
                //Check file extension
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadState = 0;
                }
                if ($uploadState!==0)
                {
                    move_uploaded_file($_FILES['BookImage']['tmp_name'],$targetFile);
                }
            }
            else
            {
                echo 'Failed to submit new book';
            }
        }
    }
}
?>