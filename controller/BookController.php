<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/Book.php';
class BookController{
    public $book;
    public function __construct(){
    }
    public function Run(){
        if(isset($_GET['f']))
        {
            if ($_GET['f']=='View')
            {
                $this->View($_GET['id']);
            }
        }
        //Add book function
        if (isset($_POST['NewBook'])) {
            $dataMng=new DataManager();
            $bookName=$_POST['BookName'];
            $category=$_POST['BookCategory'];
            $bookDescription=$_POST['BookDescription'];
            $price=$_POST['BookPrice'];
            $author=$_POST['Author'];
            $bookID=$dataMng->GenerateBookID();
            $book=new Book($bookName,$price,$author,$bookDescription,$category,$bookID);

            $check=file_exists($_FILES['BookImage']['tmp_name']);
            if ($check!==false) {
                $result = $book->AddNewBook();
            }
            else{
                $result=false;
            }
            if ($result==true){
                $targetDir=$_SERVER["DOCUMENT_ROOT"].'Assets/BooksImage/';
                $imageFileType = strtolower(pathinfo(basename($_FILES['BookImage']['name']),PATHINFO_EXTENSION));
                $targetFile = $targetDir .$bookID.'.'.$imageFileType;
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
                    echo '<p style="width: 600px;margin: 0 auto;"><text style="margin-left: 36%">Add book sucessful</text></p>';
                }
            }
            else
            {
                echo '<p style="width: 600px;margin: 0 auto;"><text style="margin-left: 33%">Failed to submit new book</text></p>';
            }
        }
    }

    public function View($bookID){
        $dataMng=new DataManager();
        $result=$dataMng->SelectBook($bookID);
        $this->book=mysqli_fetch_assoc($result);
    }

}
?>
