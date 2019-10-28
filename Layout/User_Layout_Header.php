<?php

require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');

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
<link rel="stylesheet" href="http://www.bookseller.com/Assets/css/style.css" type="text/css" media="screen">
<header>
    <div style="margin:auto; padding:3px; width:1200px; display:block; background-color:#FF0000;  ">
    <title>BookSeller</title>
    <button class="menu" onclick="window.location.href='http://www.bookseller.com/index.php'">Home</button>
    <?php
    if (isset($_SESSION['User'])!='')
    {
        if ($dataMng->GetUserInfo($_SESSION['User'])['UserRole']=='Admin') {
            echo '<button class="menu" onclick="window.location.href=\'http://www.bookseller.com/view/AddBook.php\'">Add book</button>';
            echo '<button class="menu" onclick="window.location.href=\'http://www.bookseller.com/view/SubmitNewCode.php\'">New Gift Code</button>';
        }
        else{
            echo '<button class="menu" onclick="window.location.href=\'http://www.bookseller.com/view/SubmitGift.php\'">Submit Gift</button>';
        }
        echo '<FORM class="header" action="http://www.bookseller.com/index.php" method="post" id="form-login">
            <input class="menu" type="submit" name="LogOut" value="LogOut">
        </FORM>';
        echo '<a class="menu" href="http://www.bookseller.com/view/UserInfo.php/?userid='.$_SESSION['User'].'">'.$_SESSION['User'].'</a>';
    }
    else
    {
        echo '
        <FORM class="header" method="post" id="form-login" action="http://www.bookseller.com/index.php">
            <input class="menu" type="textbox" name="UserName" placeholder="UserName">
            <input class="menu" type="textbox" name="Password" placeholder="Password">
            <input class="menu" type="submit" name="LogIn" value="Login">
        </FORM>';
        echo '<button class="menu" onclick="window.location.href=\'http://www.bookseller.com/view/SignIn.php\'">Sign in</button>';
    }
    ?>
    </div>
</header>
</html>
