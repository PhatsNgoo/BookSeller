<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php';
class GiftCodeController{
    public $result;
    public function __construct(){

    }
    public function Run(){
        //Add new gift code function
        if (isset($_POST['SubmitNewCode'])){
            $code=$_POST['NewGiftCode'];
            $value=$_POST['GiftCodeValue'];
            $giftCode=new GiftCode($code,$value);
            $this->result=$giftCode->AddNewCode();
        }
        //Verify gift code function
        if (isset($_POST['SubmitCode'])){
            $dataMng=new DataManager();
            $code=$_POST['GiftCode'];
            $giftCode=new GiftCode(0,0);
            $this->result=$giftCode->VerifyCode($code,$dataMng->GetUserInfo($_SESSION['User'])['UserID']);
        }
    }
}
?>
