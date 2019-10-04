<?php
require('Config.php');
require('controller/DataManager.php');
require('StringUtils.php');

$dataMng=new DataManager();
$dataMng->ConnectDb();
$login=isset($_POST['LogIn'])?$_POST['LogIn']:'';
$signin=isset($_POST['SignIn'])?$_POST['SignIn']:'';
if (isset($_POST['SignIn'])){
    $userName=$_POST['UserNameSignIn'];
    $password=$_POST['NewPassword'];
    $email=$_POST['Email'];
    $dataMng->NewUser($userName,$password,$email,0.0);
}
if (isset($_POST['LogIn'])){
    $userName=$_POST['UserName'];
    $password=$_POST['Password'];
    $dataMng->Login($userName,$password);
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
