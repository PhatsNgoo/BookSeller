<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/GiftCodeController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
$gcController=new GiftCodeController();
$gcController->Run();
if (isset($_POST['SubmitNewCode'])) {
    if ($gcController->result) {
        echo '<p style="width: 600px;margin: 0 auto;"><text style="margin-left: 36%">Add code sucessful</text></p>';
    } else {
        echo '<p style="width: 600px;margin: 0 auto;"><text style="margin-left: 33%">Failed to add new code</text></p>';
    }
}
?>
    <body>
        <!--New Gift code Form-->
        <FORM method="post" style="margin: auto; width: 700px;">
            <p class="center"><label>New Code: </label>
            <input class="right" type="textbox" name="NewGiftCode" placeholder="New Code">
            <br>
            </p>
            <p class="center"><label>Value: </label>
            <input class="right" type="number" step="0.01" name="GiftCodeValue" placeholder="Value">
            <br>
            </p>
            <input class="submitcenter" type="submit" name="SubmitNewCode" value="Submit">
        </FORM>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>