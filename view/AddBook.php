<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/BookController.php');
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');

$bookController=new BookController();
$bookController->Run();
?>

<!--Add book form-->
<FORM method="post" style="margin: auto; width: 900px;" enctype="multipart/form-data">
    <p class="centeraddbook"><label>Book Image: </label>
    <input class="right" type="file" name="BookImage" value="BookImage">
    <br>
    </p>
    <p class="centeraddbook"><label>Book Name: </label>
    <input class="right" type="textbox" name="BookName" placeholder="Book Name">
    <br>
    </p>
    <p class="centeraddbook"><label>Category: </label>
    <input class="right" type="textbox" name="BookCategory" placeholder="Category">
    <br>
    </p>
    <p class="centeraddbook"><label>Description: </label>
    <input class="right" type="textbox" name="BookDescription" placeholder="Book Description">
    <br>
    </p>
    <p class="centeraddbook"><label>Price: </label>
    <input class="right" type="number" step="0.01" name="BookPrice" placeholder="Price">
    <br>
    </p>
    <p class="centeraddbook"><label>Author: </label>
    <input class="right" type="textbox" name="Author" placeholder="Author">
    <br>
    </p>
    <input class="submitcenter" type="submit" name="NewBook" value="NewBook">
</FORM>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>
