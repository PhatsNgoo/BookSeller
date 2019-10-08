<?php
require('controller/DataManager.php');
require('model/Order.php');
require('model/Transaction.php');
require('model/User.php');
require('model/Book.php');
require('model/GiftCode.php');
class Controller{
    public $dataMng;
    public static $instance;
    public function __construct()
    {
        static::$instance=$this;
        $this->dataMng=new DataManager();
    }

    public function run(){
        $this->dataMng->ConnectDb();
        $this->dataMng->GetAllBooks();
    }
}
?>