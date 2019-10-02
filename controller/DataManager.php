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
        echo ("Create table");
    }
    public function CreateTable(){
        echo ("Running1");
        $CreateBookTable='create table Book(
                            BookID varchar(13) not null ,
                            Title varchar(50) not null,
                            Price float not null,
                            Description varchar(1000) not null,
                            Author varchar(60) not null,
                            CONSTRAINT BOOK_PK PRIMARY KEY (BookID)
                        )';
        mysqli_query($this->conn,$CreateBookTable);
        echo ("Running2");
        $CreateGCTable='create table GiftCode(
                            Code varchar(15) not null,
                            Value float not null,
                            CONSTRAINT  GC_PK PRIMARY KEY (Code)
                        )';
        mysqli_query($this->conn,$CreateGCTable);
        echo ("Running3");
        $CreateTransactionTable='create table Transaction(
                                    TransactionID varchar(20) not null,
                                    State int not null,
                                    BookID varchar(13) not null,
                                    UserID varchar(15) not null,
                                    Time datetime not null ,
                                    CONSTRAINT TRANSACTION_PK PRIMARY KEY (TransactionID)
                        )';
        mysqli_query($this->conn,$CreateTransactionTable);
        echo ("Running4");
        $CreateUserTable='create table User(
                                UserName varchar(15) not null,
                                UserID varchar (15) not null,
                                Password varchar (15) not null,
                                Email varchar(25) not null,
                                Balance float not null ,
                                CONSTRAINT USER_PK PRIMARY KEY (UserID)
                        )';
        mysqli_query($this->conn,$CreateUserTable);
        echo ("Running5");
    }
    public function Login(string $userName,string $password){

    }
    public  function NewUser(string $userName,string $password,string $email,float $balance){

    }
}
?>