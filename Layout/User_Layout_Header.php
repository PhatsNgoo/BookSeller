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
<header>
    <link rel="stylesheet" href="http://www.bookseller.com/Assets/css/style.css">
    <title>BookSeller</title>
    <button onclick="window.location.href='http://www.bookseller.com/index.php'">Home</button>
    <?php
    if (isset($_SESSION['User'])!='')
    {
        if ($dataMng->GetUserInfo($_SESSION['User'])['UserRole']=='Admin') {
            echo '<button onclick="window.location.href=\'http://www.bookseller.com/view/AddBook.php\'">Add book</button>';
            echo '<button onclick="window.location.href=\'http://www.bookseller.com/view/SubmitNewCode.php\'">New Gift Code</button>';
        }
        else{
            echo '<button onclick="window.location.href=\'http://www.bookseller.com/view/SubmitGift.php\'">Submit Gift</button>';
        }
        echo '<FORM action="http://www.bookseller.com/index.php" method="post" id="form-login">
            <input type="submit" name="LogOut" value="LogOut">
        </FORM>';
        echo '<a href="http://www.bookseller.com/view/UserInfo.php/?userid='.$_SESSION['User'].'">'.$_SESSION['User'].'</a>';
    }
    else
    {
        echo '
        <FORM method="post" id="form-login">
            <input type="textbox" name="UserName" placeholder="UserName">
            <input type="textbox" name="Password" placeholder="Password">
            <input type="submit" name="LogIn" value="Login">
        </FORM>';
        echo '<button onclick="window.location.href=\'http://www.bookseller.com/view/SignIn.php\'">Sign in</button>';
    }
    ?>
</header>
</html>
