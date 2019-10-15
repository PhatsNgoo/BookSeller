<?php
require_once('Config.php');
require_once('controller/DataManager.php');
require_once('controller/Controller.php');
require_once('StringUtils.php');
require_once('Layout/User_Layout_Header.php');

$controller=new Controller();
$controller->run();

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
<FORM method="post" action="index.php">
    <input type="submit" name="GetAllBook" value="Get all book">
</FORM>
<FORM method="post">
    <input type="textbox" name="NewGiftCode" placeholder="New Gift Code">
    <br>
    <input type="number" step="0.01" name="GiftCodeValue" placeholder="Value">
    <br>
    <input type="submit" name="SubmitNewCode" value="Submit">
</FORM>
<FORM method="post">
    <input type="textbox" name="GiftCode" placeholder="Enter Code Here">
    <br>
    <input type="submit" name="SubmitCode" value="Submit">
</FORM>
<?php
require('Layout/User_Layout_Footer.php');
?>
