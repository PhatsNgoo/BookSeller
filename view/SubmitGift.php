<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/GiftCode.php');
$dataMng=new DataManager();
//Verify gift code function
if (isset($_POST['SubmitCode'])){
    $code=$_POST['GiftCode'];
    $giftCode=new GiftCode(0,0);
    $giftCode->VerifyCode($code,$dataMng->GetUserInfo($_SESSION['User'])['UserID']);
}
?>
    <body>


        <!--Submit gift code form-->
        <FORM method="post">
            <input type="textbox" name="GiftCode" placeholder="Enter Code Here">
            <br>
            <input type="submit" name="SubmitCode" value="Submit">
        </FORM>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>