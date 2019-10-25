<?php
require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');
class Transaction{
    public $transactionID;
	public $state;
	public $bookID;
	public $userName;
    public $dateTime;
    public $shippingAddress;
    public $phone;
	private $dataMng;
    public function __construct($userName,$bookID,$state,$dateTime,$shippingAddress,$phone)
    {
        $this->userName=$userName;
        $this->bookID=$bookID;
        $this->state=$state;
        $this->dateTime=$dateTime;
        $this->shippingAddress=$shippingAddress;
        $this->phone=$phone;
    }
    public function AddNewTransaction(){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->NewTransaction($this);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>