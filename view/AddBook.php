<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');

$dataMng=new DataManager();
//Add book function
if (isset($_POST['NewBook'])) {
    $bookName=$_POST['BookName'];
    $category=$_POST['BookCategory'];
    $bookDescription=$_POST['BookDescription'];
    $price=$_POST['BookPrice'];
    echo $price;
    $author=$_POST['Author'];
    $bookID=$dataMng->GenerateBookID();
    $book=new Book($bookName,$price,$author,$bookDescription,$category,$bookID);
    $result=$book->AddNewBook();
    if ($result==true){
        $targetDir=$_SERVER["DOCUMENT_ROOT"].'Assets/BooksImage/';
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
?>

<!--Add book form-->
<FORM method="post" enctype="multipart/form-data">
    <input type="file" name="BookImage" value="BookImage">
    <br>
    <input type="textbox" name="BookName" placeholder="Book Name">
    <br>
    <input type="textbox" name="BookCategory" placeholder="Category">
    <br>
    <input type="textbox" name="BookDescription" placeholder="Book Description">
    <br>
    <input type="number" step="0.01" name="BookPrice" placeholder="Price">
    <br>
    <input type="textbox" name="Author" placeholder="Author">
    <br>
    <input type="submit" name="NewBook" value="NewBook">
</FORM>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>
