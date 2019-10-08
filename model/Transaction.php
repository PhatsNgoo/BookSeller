<?php
require_once('controller/DataManager.php.php');
class Transaction{
	public $state;
	public $bookID;
	public $userID;
    public $dateTime;
    public $shippingAddress;
	private $dataMng;
	public function __construct()
    {
    }
    public function AddNewTransaction(){
	    $transaction=new Transaction();
        $this->dataMng=new DataManager();
        $this->dataMng->NewTransaction($transaction);
    }
}
?>