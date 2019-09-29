<?php
class Book{
	public $bookID;
	public $title;
	public $price;
	public $description;
	public $author;

	public function __construct($title,$price,$author,$description,$bookID){
		$this->title=$title;
		$this->price=$price;
		$this->description=$description;
		$this->author=$author;
		$this->bookID=$bookID;
	}
}
?>