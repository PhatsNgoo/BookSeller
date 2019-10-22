<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/BookController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/Book.php');
$bookController=new BookController();
$bookController->Run();
?>
<body>
    <?php

        echo 'Book name :'.$bookController->book['Title'].'-Author : '.$bookController->book['Author'].'-Price : '.$bookController->book['Price'].'-Category : '.$bookController->book['Category'].'<br>';
        echo '<a> <img onc width="45px" height="45px" src="http://www.bookseller.com/Assets/BooksImage/'.$bookController->book['BookID'].'.jpg"><a> <br>';
    ?>
    <button>Order Book</button>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>
