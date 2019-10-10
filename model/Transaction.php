<?php
require_once('controller/DataManager.php');
class Transaction{
    public $transactionID;
	public $state;
	public $bookID;
	public $userID;
    public $dateTime;
    public $shippingAddress;
	private $dataMng;
    public function __construct($userID,$bookID,$state,$dateTime,$shippingAddress)
    {
        $this->userID=$userID;
        $this->bookID=$bookID;
        $this->state=$state;
        $this->dateTime=$dateTime;
        $this->shippingAddress=$shippingAddress;
    }
    public function AddNewTransaction(){
	    $transaction=new Transaction();
        $this->dataMng=new DataManager();
        $this->dataMng->NewTransaction($transaction);
    }
}
?>