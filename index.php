<?php
require('Config.php');
require('controller/DataManager.php');
require('StringUtils.php');
require('Layout/User_Layout_Header.php');

$dataMng=new DataManager();
$dataMng->ConnectDb();
$login=isset($_POST['LogIn'])?$_POST['LogIn']:'';
$signin=isset($_POST['SignIn'])?$_POST['SignIn']:'';
$submitBook=isset($_POST['NewBook'])?$_POST['NewBook']:'';
//Sign in function
if (isset($_POST['SignIn'])){
    $userName=$_POST['UserNameSignIn'];
    $password=$_POST['NewPassword'];
    $email=$_POST['Email'];
    $dataMng->NewUser($userName,$password,$email,0.0);
}
//Login function
if (isset($_POST['LogIn'])){
    $userName=$_POST['UserName'];
    $password=$_POST['Password'];
    $dataMng->Login($userName,$password);
}
//Add book function
if (isset($_POST['NewBook'])) {
    $bookID=$_POST['BookID'];
    $bookName=$_POST['BookName'];
    $category=$_POST['BookCategory'];
    $bookDescription=$_POST['BookDescription'];
    $price=$_POST['BookPrice'];
    echo $price;
    $author=$_POST['Author'];
    $result=$dataMng->NewBooks($bookID,$bookName,$price,$bookDescription,$author,$category);
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
<FORM method="post">
    <input type="textbox" name="UserName" placeholder="UserName">
    <input type="textbox" name="Password" placeholder="Password">

    <input type="submit" name="LogIn" value="Login">
</FORM>
<br>
<FORM method="post" action="index.php">
    <input type="textbox" name="UserNameSignIn" placeholder="UserName">
    <input type="textbox" name="NewPassword" placeholder="Password">
    <input type="textbox" name="Email" placeholder="Email">

    <input type="submit" name="SignIn" value="SignIn">

</FORM>
<FORM method="post" enctype="multipart/form-data">
    <input type="file" name="BookImage" value="BookImage">
    <br>
    <input type="textbox" name="BookName" placeholder="Book Name">
    <br>
    <input type="textbox" name="BookID" placeholder="Book ID">
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
require('Layout/User_Layout_Footer.php');
?>
