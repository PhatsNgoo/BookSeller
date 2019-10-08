<?php
require_once('controller/DataManager.php');
class Book{
	public $bookID;
	public $title;
	public $price;
	public $description;
	public $author;
	public $category;
    private $dataMng;

	public function __construct($title,$price,$author,$description,$bookID){
		$this->title=$title;
		$this->price=$price;
		$this->description=$description;
		$this->author=$author;
		$this->bookID=$bookID;
	}
	public function AddNewBook(){
        $book=new Book();
        $this->dataMng=new DataManager();
        $this->dataMng->NewBooks($book);
    }
}
?>