<?php
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
        echo '<FORM method="post" id="form-login">
            <input  type="submit" name="LogOut" value="LogOut">
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
        echo 'no user logged in';
    }
    ?>
</header>
</html>
