<?php
require_once($_SERVER["DOCUMENT_ROOT"].'controller/DataManager.php');
class GiftCode{
	public $code;
	public $value;
    private $dataMng;
    public  function __construct($code, $value)
    {
        $this->code=$code;
        $this->value=$value;
    }

    public function VerifyCode($code,$userID){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->VerifyGift($code);
        if ($result!=0)
        {
            $this->dataMng->AddGift($result,$userID);
            return true;
        }
        else
        {
            return false;
        }
    }
    public function AddNewCode(){
        $this->dataMng=new DataManager();
        $result=$this->dataMng->NewGiftCode($this);
        if ($result==true){
            return true;
        }
        else{
            return false;
        }
    }
}
?>