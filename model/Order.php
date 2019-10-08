<?php
require_once('controller/DataManager.php');
class Order{
    public $orderID;
    public $userID;
    public $bookID;
    public $state;
    public $dateTime;
    public $shippingAddress;
    private $dataMng;
    public function __construct()
    {
    }
    public function AddNewOrder(){
        $order=new Order();
        $this->dataMng=new DataManager();
        $this->dataMng->NewOrder($order);
    }

}
?>
