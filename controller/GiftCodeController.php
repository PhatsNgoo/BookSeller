<?php
require_once $_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php';
require_once $_SERVER["DOCUMENT_ROOT"].'model/GiftCode.php';
class GiftCodeController{
    public function __construct(){

    }
    public function Run(){
        //Add new gift code function
        if (isset($_POST['SubmitNewCode'])){
            $code=$_POST['NewGiftCode'];
            $value=$_POST['GiftCodeValue'];
            $giftCode=new GiftCode($code,$value);
            $giftCode->AddNewCode();
        }
        //Verify gift code function
        if (isset($_POST['SubmitCode'])){
            $dataMng=new DataManager();
            $code=$_POST['GiftCode'];
            $giftCode=new GiftCode(0,0);
            $giftCode->VerifyCode($code,$dataMng->GetUserInfo($_SESSION['User'])['UserID']);
        }
    }
}
?>
