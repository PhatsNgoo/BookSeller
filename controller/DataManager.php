<?php
require_once ('Config.php');
class DataManager{
    public $conn;

    public function ConnectDb(){
        $this->conn=new mysqli(servername,username,password,db);
        if (!$this->conn){
            echo ("Connection failed".mysqli_connect_error());
        }
        else
        {
            echo $this->InitDatabase();
            echo ("Init database");
        }
    }

    public function InitDatabase(){
        echo $this->CreateTable();
    }
    public function CreateTable(){
        $CreateBookTable='create table if not exists Book(
                            BookID varchar(13) not null ,
                            Title varchar(50) not null,
                            Price float not null,
                            Description varchar(1000) not null,
                            Author varchar(60) not null,
                            CONSTRAINT BOOK_PK PRIMARY KEY (BookID)
                        )';
        mysqli_query($this->conn,$CreateBookTable);
        $CreateGCTable='create table if not exists GiftCode(
                            Code varchar(15) not null,
                            Value float not null,
                            CONSTRAINT  GC_PK PRIMARY KEY (Code)
                        )';
        mysqli_query($this->conn,$CreateGCTable);
        $CreateTransactionTable='create table if not exists Transaction(
                                    TransactionID varchar(20) not null,
                                    State int not null,
                                    BookID varchar(13) not null,
                                    UserID varchar(15) not null,
                                    Time datetime not null ,
                                    CONSTRAINT TRANSACTION_PK PRIMARY KEY (TransactionID)
                        )';
        mysqli_query($this->conn,$CreateTransactionTable);
        $CreateUserTable='create table if not exists User(
                                UserName varchar(15) not null,
                                UserID varchar (15) not null,
                                Password varchar (15) not null,
                                Email varchar(25) not null,
                                Balance float not null ,
                                CONSTRAINT USER_PK PRIMARY KEY (UserName)
                        )';
        mysqli_query($this->conn,$CreateUserTable);
    }
    public function Login(string $userName,string $password){
        $Query='select Password from user where (UserName="'.$userName.'")';
        $result=mysqli_query($this->conn,$Query);
        $rowRes=mysqli_fetch_row($result);
        if($password==$rowRes[0])
        {
            echo "login successful";
        }
        else
        {
            echo "Login fail";
        }
    }
    public function NewUser(string $userName,string $password,string $email,float $balance){
        $GenerateUID='select count(*) from user';
        $result=mysqli_query($this->conn,$GenerateUID);
        $rowRes=mysqli_fetch_row($result);
        $userID=$rowRes[0]+1;
        echo $rowRes[0];
        echo $userID;
        $Query='INSERT INTO user VALUES(
	                    "'.$userName.'","'.$userID.'","'.$password.'","'.$email.'",'.$balance.'
                    )';
        mysqli_query($this->conn,$Query);
    }
    public function NewBooks(string $bookID,string $title,float $price,string $description,string $author){
        if ($bookID!==null && $bookID!='') {
            $Query = 'insert into book values("' . $bookID . '","' . $title . '",'. $price .',"' . $description . '","' . $author . '")';
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
}
?>