<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'controller/DataManager.php');
class Order{
    public $orderID;
    public $userName;
    public $bookID;
    public $state;
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
    public function AddNewOrder(){
        $this->dataMng=new DataManager();
        $this->dataMng->NewOrder($this);
    }

}
?>
