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
        echo '<a> <img class="bookavatar" width="128px" height="128px" src="http://www.bookseller.com/Assets/BooksImage/'.$bookController->book['BookID'].'.jpg"><a>';
        echo '<div class="bookinfo"><label>Book name :</label>'.$bookController->book['Title'].'<br>
              <label>Author :</label>'.$bookController->book['Author'].'<br>
              <label>Description :</label>'.$bookController->book['Description'].'<br>
              <label>Price :</label>'.$bookController->book['Price'].'<br>
              <label>Category :</label>'.$bookController->book['Category'].'<br></div>';
        ?>
    
    <?php
        if (isset($_SESSION['User'])!=''){
            echo '<button class="submitcenter">Order Book</button>';
        }
    ?>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>
