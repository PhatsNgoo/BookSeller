<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'controller/DataManager.php');

$dataMng=new DataManager();
//Login function
if (isset($_POST['LogIn'])){
    $userName=$_POST['UserName'];
    $password=$_POST['Password'];
    $dataMng->Login($userName,$password);
}
//LogOut
if (isset($_POST['LogOut'])){
    $dataMng->LogOut();
}
?>
<html>
<header>
    <link rel="stylesheet" href="http://localhost/BookSeller/Assets/css/style.css">
    <title>BookSeller</title>
    <button onclick="window.location.href='http://localhost/BookSeller/index.php'">Home</button>
    <button>Books</button>
    <button onclick="window.location.href='http://localhost/BookSeller/view/AddBook.php'">Add book</button>
    <?php
    if (isset($_SESSION['User'])!='')
    {
        echo '<FORM action="http://localhost/BookSeller/index.php" method="post" id="form-login">
            <input type="submit" name="LogOut" value="LogOut">
        </FORM>';
        echo '<a href="http://localhost/BookSeller/view/UserInfo.php/?userid='.$_SESSION['User'].'" id="userName">'.$_SESSION['User'].'</a>';
    }
    else
    {
        echo '
        <FORM method="post" id="form-login">
            <input type="textbox" name="UserName" placeholder="UserName">
            <input type="textbox" name="Password" placeholder="Password">
            <input type="submit" name="LogIn" value="Login">
        </FORM>';
    }
    ?>
</header>
</html>
