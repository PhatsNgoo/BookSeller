<?php
require_once ('Config.php');
require_once ('model/Order.php');
require_once ('model/Transaction.php');
require_once ('model/User.php');
require_once ('model/Book.php');
require_once ('model/GiftCode.php');
class DataManager{
    public $conn;
    public function __construct()
    {
        $this->ConnectDb();
    }

    public function ConnectDb(){
        $this->conn=new mysqli(servername,username,password,db);
        if (!$this->conn){
            echo ("Connection failed <br>".mysqli_connect_error());
        }
        else
        {
            echo ("Connect successfuly <br>");
        }
    }

    public function Login(string $userName,string $password){
        $Query='select Password from user where (UserName="'.$userName.'")';
        $result=mysqli_query($this->conn,$Query);
        $rowRes=mysqli_fetch_row($result);
        if($password==$rowRes[0])
        {
            echo 'login successful';
            return true;
        }
        else
        {
            echo 'login fail';
            return false;
        }
    }
    public function NewUser(User $newUser){
        $GenerateUID='select count(*) from user';
        $result=mysqli_query($this->conn,$GenerateUID);
        $rowRes=mysqli_fetch_row($result);
        $userID=$rowRes[0]+1;
        echo $rowRes[0];
        echo $userID;
        $Query='INSERT INTO user VALUES(
	                    "'.$newUser->userName.'","'.$userID.'","'.$newUser->password.'","'.$newUser->email.'",'.$newUser->balance.'
                    )';
        mysqli_query($this->conn,$Query);
    }
    public function NewBooks(Book $newBook){
        $GenerateBID='select count(*) from book';
        $result=mysqli_query($this->conn,$GenerateBID);
        $rowRes=mysqli_fetch_row($result);
        $bookID=$rowRes[0]+1;
        if ($bookID!==null && $bookID!='') {
            $Query = 'insert into book values("' . $bookID . '","' . $newBook->title . '",'. $newBook->price .',"' . $newBook->description . '","' . $newBook->author . '","'.$newBook->category.'")';
            echo $Query;
            mysqli_query($this->conn, $Query);
            return true;
        }
        else
        {
            echo 'Book ID cannot be null or empty';
            return false;
        }
    }
    public function GetAllBooks(){
        $Query='select * from book';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function NewOrder(Order $order)
    {
        $GenerateID='select count(*) from orderbook';
        $result=mysqli_query($this->conn,$GenerateID);
        $rowRes=mysqli_fetch_row($result);
        $orderID=$rowRes[0]+1;
        $Query='insert into OrderBook values ("'.$orderID.'",'.$order->state.',"'.$order->bookID.'","'.$order->userID.'","'.$order->dateTime.'","'.$order->shippingAddress.'")';
        mysqli_query($this->conn,$Query);
    }
    public function GenerateBookID(){
        $GenerateBID='select count(*) from book';
        $result=mysqli_query($this->conn,$GenerateBID);
        $rowRes=mysqli_fetch_row($result);
        $bookID=$rowRes[0]+1;
        return $bookID;
    }
    public function NewTransaction(Transaction $trans){
        $GenerateID='select count(*) from transaction';
        $result=mysqli_query($this->conn,$GenerateID);
        $rowRes=mysqli_fetch_row($result);
        $transactionID=$rowRes[0]+1;
        $Query='insert into OrderBook values ("'.$transactionID.'",'.$trans->state.',"'.$trans->bookID.'","'.$trans->userID.'","'.$trans->dateTime.'","'.$trans->shippingAddress.'")';
        mysqli_query($this->conn,$Query);
    }
}
?>