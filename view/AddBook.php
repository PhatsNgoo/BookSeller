<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/BookController.php');
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');

$bookController=new BookController();
$bookController->Run();
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
