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
            $user=new User($userName,$password,$email);
            $user->SignIn();
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
            $bookID=$this->dataMng->GenerateBookID();
            $book=new Book($bookName,$price,$author,$bookDescription,$category,$bookID);
            $result=$book->AddNewBook();
            if ($result==true){
                $targetDir='Assets/BooksImage/';
                $imageFileType = strtolower(pathinfo(basename($_FILES['BookImage']['name']),PATHINFO_EXTENSION));
                $targetFile = $targetDir .$bookID.'.'.$imageFileType;
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
                $targetFile = $targetDir .$bookID.'.jpg';
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
        //Get all books function
        if (isset($_POST['GetAllBook'])){
            $bookList=$this->dataMng->GetAllBooks();
            while($row = mysqli_fetch_assoc($bookList)) {
                echo 'Book name :'.$row['Title'].'-Author : '.$row['Author'].'-Price : '.$row['Price'].'-Category : '.$row['Category'].'<br>';
                echo '<img width="45px" height="45px" src="http://localhost/BookSeller/Assets/BooksImage/'.$row['BookID'].'.jpg"> <br>';
            }
        }
        //Add new gift code function
        if (isset($_POST['SubmitNewCode'])){
            $code=$_POST['NewGiftCode'];
            $value=$_POST['GiftCodeValue'];
            $giftCode=new GiftCode($code,$value);
            $giftCode->AddNewCode();
        }
        //Verify gift code function
        if (isset($_POST['SubmitCode'])){
            $code=$_POST['GiftCode'];
            $giftCode=new GiftCode(0,0);
            $giftCode->VerifyCode($code,1);
        }
        //Add new transaction
        if (true){
//            $transaction=new Transaction();
//            $transaction->AddNewTransaction();
        }
    }
}
?>