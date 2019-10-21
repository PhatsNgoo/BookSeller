<?php
require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'model/Order.php');
require_once($_SERVER["DOCUMENT_ROOT"].'model/Transaction.php');
require_once($_SERVER["DOCUMENT_ROOT"].'model/User.php');
require_once($_SERVER["DOCUMENT_ROOT"].'model/Book.php');
require_once($_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php');
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
        //Add new transaction
        if (isset($_POST['NewTransaction'])){
            $userName=$_POST['UserName_Order'];
            $bookID=2;
            $shippingAddress=$_POST['ShippingAddress'];
            $date = date('m/d/Y', time());
            echo $date;
            $transaction=new Transaction($userName,$bookID,1,$date,$shippingAddress);
            $transaction->AddNewTransaction();
        }

        require_once($_SERVER["DOCUMENT_ROOT"].'Layout/User_Layout_Header.php');
        //Get all books function
        $bookList=$this->dataMng->GetAllBooks();
        while($row = mysqli_fetch_assoc($bookList)) {
            echo 'Book name :'.$row['Title'].'-Author : '.$row['Author'].'-Price : '.$row['Price'].'-Category : '.$row['Category'].'<br>';
            echo '<a href="http://www.bookseller.com/view/ViewBook.php/?f=View&id='.$row['BookID'].'"> <img onc width="45px" height="45px" src="http://www.bookseller.com/Assets/BooksImage/'.$row['BookID'].'.jpg"><a> <br>';
        }
    }
}
?>