<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/TransactionController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/BookController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/Book.php');
$bookController=new BookController();
$bookController->Run();
if (isset($_POST['NewTransaction'])){
    $transactionController = new TransactionController();
    $transactionController->Run();
}
?>
<body>
    <?php
        echo '<a> <img class="bookavatar" width="128px" height="128px" src="http://www.bookseller.com/Assets/BooksImage/'.$bookController->book['BookID'].'.jpg"><a>';
        echo '<div class="bookinfo"><label>Book name :</label>'.$bookController->book['Title'].'<br>
              <label>Author :</label>'.$bookController->book['Author'].'<br>
              <label>Description :</label>'.$bookController->book['Description'].'<br>
              <label>Price :</label>'.$bookController->book['Price'].'$<br>
              <label>Category :</label>'.$bookController->book['Category'].'<br></div>';
        ?>

    <?php
        if (isset($_SESSION['User'])!=''){

            if (isset($_POST['NewTransaction'])) {
                if ($transactionController->result) {
                    echo '<p class="center"><label style="margin-left: 30%">Order successful</label>';
                } else {
                    echo '<p class="center"><label style="margin-left: 35%">Order fail</label>';
                }
            }
            echo '
                <!--Order book form-->
                <FORM method="post" style="width: 700px">
                    <p class="orderformcenter"><label>Phone number: </label>
                    <input class="right" type="textbox" name="PhoneNumber" placeholder="Phone number">
                    <br>
                    </p>
                    <p class="orderformcenter"><label>Shipping Address: </label>
                    <input class="right" type="textbox" name="ShippingAddress" placeholder="Shipping to...">
                    <br>
                    </p>
            
                    <input class="submitcenter" type="submit" name="NewTransaction" value="Order book">
                </FORM>';
        }
    ?>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>
