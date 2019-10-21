<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/GiftCodeController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
$gcController=new GiftCodeController();
$gcController->Run();
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