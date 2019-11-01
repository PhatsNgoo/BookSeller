<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php';
class TransactionController{
    public $result;
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
            $this->result=$transaction->AddNewTransaction();
        }
        if (isset($_POST['SubmitUpdate'])){
            Transaction::UpdateTransaction($_POST['ID'],$_POST['UpdateTransaction']);
        }
    }
    public function ShowOrders(){
        $dataMng=new DataManager();
        if (isset($_SESSION['User'])!='') {
            if ($dataMng->GetUserInfo($_SESSION['User'])['UserRole']=='Admin') {
                $this->ShowAllOrders();
            }
            else{
                $this->ShowUserOrders();
            }
        }
    }
    public function ShowUserOrders(){
        $dataMng=new DataManager();
        $orderTable=$dataMng->GetUserOrders($_SESSION['User']);
        echo '<div>';
        echo '<table width="700" border="1" height="" cellspacing="2" cellspacing="2" class="tableCenter" >';
        echo '<tr>';
        echo '<th scope="col">Order ID</th>';
        echo '<th scope="col">State</th>';
        echo '<th scope="col">Book Name</th>';
        echo '<th scope="col">User Name</th>';
        echo '<th scope="col">Shipping to</th>';
        echo '<th scope="col">Order Date</th>';
        echo '<th scope="col">Phone</th>';
        echo '</tr>';
        while($row = mysqli_fetch_assoc($orderTable)) {
            echo '<tr>';
            echo '<th scope="col">'.$row['TransactionID'].'</th>';
            echo '<th scope="col">'.$row['State'].'</th>';
            echo '<th scope="col">'.$dataMng->GetBookName($row['BookID'])[0].'</th>';
            echo '<th scope="col">'.$row['UserName'].'</th>';
            echo '<th scope="col">'.$row['ShippingAddress'].'</th>';
            echo '<th scope="col">'.$row['DateTime'].'</th>';
            echo '<th scope="col">'.$row['Phone'].'</th>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }
    public function ShowAllOrders(){
        $dataMng=new DataManager();
        $orderTable=$dataMng->GetAllOrders();
        echo '<div>';
        echo '<table width="700" border="1" height="" cellspacing="2" cellspacing="2" class="tableCenter" >';
        echo '<tr>';
        echo '<th scope="col">Order ID</th>';
        echo '<th scope="col">State</th>';
        echo '<th scope="col">Book Name</th>';
        echo '<th scope="col">User Name</th>';
        echo '<th scope="col">Shipping to</th>';
        echo '<th scope="col">Order Date</th>';
        echo '<th scope="col">Phone</th>';
        echo '<th scope="col">Update</th>';
        echo '</tr>';
        while($row = mysqli_fetch_assoc($orderTable)) {
            echo '<tr>';
            echo '<th scope="col">'.$row['TransactionID'].'</th>';
            switch ($row['State']){
                case 1:
                    echo '<th scope="col" style="width: 100px">On Queue</th>';
                    break;
                case 2:
                    echo '<th scope="col" style="width: 100px">Shipping</th>';
                    break;
                case 3:
                    echo '<th scope="col" style="width: 100px">Done</th>';
                    break;
                case 4:
                    echo '<th scope="col" style="width: 100px">Fail</th>';
                    break;
            }
            echo '<th scope="col">'.$dataMng->GetBookName($row['BookID'])[0].'</th>';
            echo '<th scope="col">'.$row['UserName'].'</th>';
            echo '<th scope="col">'.$row['ShippingAddress'].'</th>';
            echo '<th scope="col">'.$row['DateTime'].'</th>';
            echo '<th scope="col">'.$row['Phone'].'</th>';
            echo '<th scope="col"><form method="post"><input type="textbox" name="UpdateTransaction" placeholder="Status"><input type="hidden" name="ID" value="'.$row['TransactionID'].'"><input type="submit" name="SubmitUpdate" value="Submit"></form></th>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }
}
?>
