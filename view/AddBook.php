<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/controller/DataManager.php');
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Header.php');
?>

<!--Add book form-->
<FORM action="../index.php" method="post" enctype="multipart/form-data">
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
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Footer.php');
?>
