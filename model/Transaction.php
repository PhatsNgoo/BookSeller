<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'controller/DataManager.php');
class Transaction{
    public $transactionID;
	public $state;
	public $bookID;
	public $userName;
    public $dateTime;
    public $shippingAddress;
	private $dataMng;
    public function __construct($userName,$bookID,$state,$dateTime,$shippingAddress)
    {
        $this->userName=$userName;
        $this->bookID=$bookID;
        $this->state=$state;
        $this->dateTime=$dateTime;
        $this->shippingAddress=$shippingAddress;
    }
    public function AddNewTransaction(){
        $this->dataMng=new DataManager();
        $this->dataMng->NewTransaction($this);
    }
}
?>