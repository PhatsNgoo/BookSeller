<?php
?>
<html>
<header>
    <link rel="stylesheet" href="http://localhost/BookSeller/Assets/css/style.css">
    <title>BookSeller</title>
    <button onclick="window.location.href='http://localhost/BookSeller/index.php'">Home</button>
    <button>Books</button>
    <button onclick="window.location.href='http://localhost/BookSeller/view/AddBook.php'">Add book</button>
    <button>Category</button>
    <button>Cart</button>
    <button>UserInfo</button>
    <FORM method="post" id="form-login">
        <input type="textbox" name="UserName" placeholder="UserName">
        <input type="textbox" name="Password" placeholder="Password">
        <input type="submit" name="LogIn" value="Login">
    </FORM>
</header>
</html>
