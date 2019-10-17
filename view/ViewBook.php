<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Header.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/controller/DataManager.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/model/Book.php');
class ViewBook{
    public $book;
    public $dataMng;
    public function __construct()
    {
    }

    public function View($bookID){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->SelectBook($bookID);
        $this->book=mysqli_fetch_assoc($result);
    }
}
$viewBook=new ViewBook();
if(isset($_GET['f']))
{
    if ($_GET['f']=='View')
    {
        $viewBook->View($_GET['id']);
    }
}
?>
<body>
    <?php

        echo 'Book name :'.$viewBook->book['Title'].'-Author : '.$viewBook->book['Author'].'-Price : '.$viewBook->book['Price'].'-Category : '.$viewBook->book['Category'].'<br>';
        echo '<a> <img onc width="45px" height="45px" src="http://localhost/BookSeller/Assets/BooksImage/'.$viewBook->book['BookID'].'.jpg"><a> <br>';
    ?>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Footer.php');
?>
