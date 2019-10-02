<?php
require('Config.php');
require('controller/DataManager.php');

$dataMng=new DataManager();
$dataMng->ConnectDb();
?>
<FORM method="post">
    <input type="textbox" name="UserName" placeholder="UserName">
    <input type="textbox" name="Password" placeholder="Password">

    <input type="submit" name="action" value="Login">
</FORM>
