<?php
require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');
class Book{
	public $bookID;
	public $title;
	public $price;
	public $description;
	public $author;
	public $category;
    private $dataMng;

	public function __construct($title,$price,$author,$description,$category,$bookID){
		$this->title=$title;
		$this->price=$price;
		$this->description=$description;
		$this->author=$author;
		$this->bookID=$bookID;
		$this->category=$category;
	}
	public function AddNewBook(){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->NewBooks($this);
        if ($result==true){
            return true;
        }
        else{
            return false;
        }
    }

}
?>