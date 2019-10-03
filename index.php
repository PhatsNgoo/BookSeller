<?php
require('Config.php');
require('controller/DataManager.php');
require('StringUtils.php');

$dataMng=new DataManager();
$dataMng->ConnectDb();
$action=isset($_POST['action'])?$_POST['action']:'';
$signin=isset($_POST['SignIn'])?$_POST['SignIn']:'';
if ($signin){
    $userName=$_POST['UserNameSignIn'];
    $password=$_POST['NewPassword'];
    $email=$_POST['Email'];
    $dataMng->NewUser($userName,$password,$email,0.0);
}
?>
<FORM method="post">
    <input type="textbox" name="UserName" placeholder="UserName">
    <input type="textbox" name="Password" placeholder="Password">

    <input type="submit" name="action" value="Login">
</FORM>
<br>
<FORM method="post">
    <input type="textbox" name="UserNameSignIn" placeholder="UserName">
    <input type="textbox" name="NewPassword" placeholder="Password">
    <input type="textbox" name="Email" placeholder="Email">

    <input type="submit" name="SignIn" value="SignIn">

</FORM>
