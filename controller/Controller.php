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

        require_once($_SERVER["DOCUMENT_ROOT"].'Layout/User_Layout_Header.php');

        if(isset($_GET['category'])) {
            $this->ShowBooksByCategory($_GET['category']);
        }
        elseif (isset($_GET['author'])){
            $this->ShowBooksByAuthor($_GET['author']);
        }
        else {
            $this->ShowAllBooks();
        }
    }
    public function ShowAllBooks(){
        //Get all books function
        $bookList=$this->dataMng->GetAllBooks();
        $this->ShowBooks($bookList);
    }
    public function ShowBooksByCategory($category){
        //Get all books function
        $bookList=$this->dataMng->FilterBooksByCategory($category);
        $this->ShowBooks($bookList);
    }
    public function ShowBooksByAuthor($author){
        //Get all books function
        $bookList=$this->dataMng->FilterBooksByAuthor($author);
        $this->ShowBooks($bookList);
    }
    function ShowBooks($bookList){
        echo '<div class="booktable">';
        echo '<table width="700" border="1" height="" cellspacing="2" cellspacing="2" class="tableCenter" >';
        echo '<tr>';
        echo '<th scope="col">Book name</th>';
        echo '<th scope="col">Author</th>';
        echo '<th scope="col">Category</th>';
        echo '<th scope="col">Price</th>';
        echo '<th scope="col">Image</th>';
        echo '</tr>';
        while($row = mysqli_fetch_assoc($bookList)) {
            echo '<tr>';
            echo '<th scope="col">'.$row['Title'].'</th>';
            echo '<th scope="col"><a href="http://www.bookseller.com/?author='.$row['Author'].'">'.$row['Author'].'</a></th>';
            echo '<th scope="col"><a href="http://www.bookseller.com/?category='.$row['Category'].'">'.$row['Category'].'</a></th>';
            echo '<th scope="col">'.$row['Price'].'$</th>';
            echo '<th ><a href="http://www.bookseller.com/view/ViewBook.php/?f=View&id='.$row['BookID'].'"> <img onc width="90px" height="90px" src="http://www.bookseller.com/Assets/BooksImage/'.$row['BookID'].'.jpg"><a></th>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }
}
?>