<?php
require_once ($_SERVER["DOCUMENT_ROOT"].'Config.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'model/Order.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'model/Transaction.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'model/User.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'model/Book.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php');
session_start();
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
        }
    }

    public function Login(string $userName,string $password){
        $Query='select Password from user where (UserName="'.$userName.'")';
        $result=mysqli_query($this->conn,$Query);
        $rowRes=mysqli_fetch_row($result);
        if($password==$rowRes[0] && $userName!='')
        {
            $_SESSION['User']=$userName;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function LogOut(){
        session_unset();
    }
    public function NewUser(User $newUser){
        $GenerateUID='select count(*) from user';
        $result=mysqli_query($this->conn,$GenerateUID);
        $rowRes=mysqli_fetch_row($result);
        $userID=$rowRes[0]+1;
        $Query='INSERT INTO user VALUES(
	                    "'.$newUser->userName.'","'.$userID.'","'.$newUser->password.'","'.$newUser->email.'",'.$newUser->balance.',"'.$newUser->userRole.'"
                    )';
        $result=mysqli_query($this->conn,$Query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function GetUserInfo($userName){
        $Query='select * from user where UserName="'.$userName.'"';
        $result=mysqli_fetch_assoc(mysqli_query($this->conn,$Query));
        return $result;
    }
    public function NewBooks(Book $newBook){
        $GenerateBID='select count(*) from book';
        $result=mysqli_query($this->conn,$GenerateBID);
        $rowRes=mysqli_fetch_row($result);
        $bookID=$rowRes[0]+1;
        $Query = 'insert into book values(' . $bookID . ',"' . $newBook->title . '",'. $newBook->price .',"' . $newBook->description . '","' . $newBook->author . '","'.$newBook->category.'")';
        $result=mysqli_query($this->conn, $Query);
        return $result;
    }
    public function GetBookName($bookID){
        $Query='select Title from book where BookID="'.$bookID.'"';
        $result=mysqli_query($this->conn,$Query);
        return mysqli_fetch_row($result);
    }
    public function GetAllBooks(){
        $Query='select * from book';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function FilterBooksByCategory($category){
        $Query='select * from book where Category="'.$category.'"';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function FilterBooksByAuthor($author){
        $Query='select * from book where Author="'.$author.'"';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function NewGiftCode(GiftCode $code){
        $Query='insert into giftcode values ("'.$code->code.'",'.$code->value.',true)';
        $result=mysqli_query($this->conn,$Query);
        if ($result){
            return true;
        }
        else
        {
            return false;
        }
    }
    public function VerifyGift(string $code){
        $Query='select * from giftcode where Code="'.$code.'"';
        $result=mysqli_query($this->conn,$Query);
        $row=mysqli_fetch_assoc($result);
        if ($row['Useable']==true || $row['Useable']=='true'|| $row['Useable']=='1'|| $row['Useable']==1)
        {
            $Query='update giftcode set Useable="0" where Code="'.$code.'"';
            mysqli_query($this->conn,$Query);
            return $row['Value'];
        }
        else
        {
            return 0;
        }
    }
    public function AddGift($value,$userID){
        $Query='select Balance from user where UserID="'.$userID.'"';
        $result=mysqli_query($this->conn,$Query);
        $row=mysqli_fetch_assoc($result);
        $newBalance=$row['Balance']+$value;
        $Query='update user set Balance='.$newBalance.' where UserID="'.$userID.'"';
        mysqli_query($this->conn,$Query);
    }
    public function NewOrder(Order $order)
    {
        $GenerateID='select count(*) from orderbook';
        $result=mysqli_query($this->conn,$GenerateID);
        $rowRes=mysqli_fetch_row($result);
        $orderID=$rowRes[0]+1;
        $Query='insert into OrderBook values ("'.$orderID.'",'.$order->state.',"'.$order->bookID.'","'.$order->userName.'","'.$order->dateTime.'","'.$order->shippingAddress.'")';
        mysqli_query($this->conn,$Query);
    }
    public function GenerateBookID(){
        $GenerateBID='select count(*) from book';
        $result=mysqli_query($this->conn,$GenerateBID);
        $rowRes=mysqli_fetch_row($result);
        $bookID=$rowRes[0]+1;
        return $bookID;
    }
    public function SelectBook($bookID){
        $Query='select * from book where BookID="'.$bookID.'"';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function NewTransaction(Transaction $trans){
        $GenerateID='select count(*) from transaction';
        $result=mysqli_query($this->conn,$GenerateID);
        $rowRes=mysqli_fetch_row($result);
        $transactionID=$rowRes[0]+1;
        $Query='insert into transaction values ("'.$transactionID.'",'.$trans->state.',"'.$trans->bookID.'","'.$trans->userName.'","'.$trans->shippingAddress.'","'.$trans->dateTime.'","'.$trans->phone.'")';
        $result=mysqli_query($this->conn,$Query);
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function UpdateTransaction($transactionID,$value){
        $Query='Update transaction set State="'.$value.'" where TransactionID="'.$transactionID.'"';
        $result=mysqli_query($this->conn,$Query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function GetAllOrders(){
        $Query='select * from transaction';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
    public function GetUserOrders($userID){
        $Query='select * from transaction where UserName="'.$userID.'"';
        $result=mysqli_query($this->conn,$Query);
        return $result;
    }
}
?>