<?php
require_once($_SERVER["DOCUMENT_ROOT"].'Config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'controller/Controller.php');
require_once($_SERVER["DOCUMENT_ROOT"].'StringUtils.php');

$controller=new Controller();
$controller->run();

?>
<!--Add book form-->
<!--<FORM method="post" enctype="multipart/form-data">-->
<!--    <input type="file" name="BookImage" value="BookImage">-->
<!--    <br>-->
<!--    <input type="textbox" name="BookName" placeholder="Book Name">-->
<!--    <br>-->
<!--    <input type="textbox" name="BookCategory" placeholder="Category">-->
<!--    <br>-->
<!--    <input type="textbox" name="BookDescription" placeholder="Book Description">-->
<!--    <br>-->
<!--    <input type="number" step="0.01" name="BookPrice" placeholder="Price">-->
<!--    <br>-->
<!--    <input type="textbox" name="Author" placeholder="Author">-->
<!--    <br>-->
<!---->
<!--    <input type="submit" name="NewBook" value="NewBook">-->
<!--</FORM>-->
<!--Order book form-->
<!--<FORM method="post">-->
<!--    <input type="textbox" name="UserName_Order" placeholder="Customer ID">-->
<!--    <br>-->
<!--    <input type="textbox" name="BookID" placeholder="Book ID">-->
<!--    <br>-->
<!--    <input type="textbox" name="ShippingAddress" placeholder="Shipping to...">-->
<!--    <br>-->
<!---->
<!--    <input type="submit" name="NewTransaction" value="Order book">-->
<!--</FORM>-->
<?php
require($_SERVER["DOCUMENT_ROOT"].'Layout/User_Layout_Footer.php');
?>
