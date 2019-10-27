<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/GiftCodeController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
$gcController=new GiftCodeController();
$gcController->Run();

if (isset($_POST['SubmitCode'])) {
    if ($gcController->result) {
        echo '<p class="centergc"><text style="margin-left: 35%;">Submit gift successful</text></p>';
    } else {
        echo '<p class="centergc"><text style="margin: 13%;">Giftcode is not valid or wrong pls use another code</text></p>';
    }
}
?>
    <body>


        <!--Submit gift code form-->
        <FORM method="post" style="margin: auto; width: 700px;">
            <p class="center"><label>Code: </label>
            <input class="right" type="textbox" name="GiftCode" placeholder="Enter Code Here">
            <br>
            </p>
            <input class="submitcenter" type="submit" name="SubmitCode" value="Submit">
        </FORM>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>