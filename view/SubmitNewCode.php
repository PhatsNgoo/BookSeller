<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/model/GiftCode.php');
//Add new gift code function
if (isset($_POST['SubmitNewCode'])){
    $code=$_POST['NewGiftCode'];
    $value=$_POST['GiftCodeValue'];
    $giftCode=new GiftCode($code,$value);
    $giftCode->AddNewCode();
}
?>
    <body>

        <!--New Gift code Form-->
        <FORM method="post">
            <input type="textbox" name="NewGiftCode" placeholder="New Gift Code">
            <br>
            <input type="number" step="0.01" name="GiftCodeValue" placeholder="Value">
            <br>
            <input type="submit" name="SubmitNewCode" value="Submit">
        </FORM>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Footer.php');
?>