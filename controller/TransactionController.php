<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php';
class TransactionController{
    public function __construct(){

    }
    public function Run(){
        //Add new transaction
        if (isset($_POST['NewTransaction'])){
            $userName=$_SESSION['User'];
            $bookID=$_GET['id'];
            $shippingAddress=$_POST['ShippingAddress'];
            $date = date('m/d/Y', time());
            $phoneNumber=$_POST['PhoneNumber'];
            $transaction=new Transaction($userName,$bookID,1,$date,$shippingAddress,$phoneNumber);
            $result=$transaction->AddNewTransaction();
            if ($result)
            {
                echo 'add transaction success';
            }
            else
            {
                echo 'add transaction fail';
            }
        }
    }
}
?>
