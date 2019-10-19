<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/model/User.php');
//Sign in function
if (isset($_POST['SignIn'])){
    $userName=$_POST['UserNameSignIn'];
    $password=$_POST['NewPassword'];
    $email=$_POST['Email'];
    $user=new User($userName,$password,$email);
    $user->SignIn();
}
?>
    <body>
    <!--Sign in form-->
        <FORM method="post">
            <input type="textbox" name="UserNameSignIn" placeholder="UserName"><br>
            <input type="textbox" name="NewPassword" placeholder="Password"><br>
            <input type="textbox" name="Email" placeholder="Email"><br>
            <input type="submit" name="SignIn" value="SignIn">

        </FORM>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Footer.php');
?>