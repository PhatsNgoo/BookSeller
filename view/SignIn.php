<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/UserController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/User.php');
$user=new UserController();
$user->Run();

if (isset($_POST['SignIn'])) {
    if ($user->result) {
        header('Location: http://www.bookseller.com/index.php');
    } else {
        echo '<p style="width: 600px;margin: 0 auto;"><text style="margin-left: 25%">Information is not valid please re-submit form</text></p>';
    }
}
?>
    <style>
        p{
            background: blue;
            margin-top: 10px;
        }
    </style>
    <body>
    <!--Sign in form-->
        <form method="post" style="margin: auto; width: 800px;">
            <p class="center"><label>User Name: </label>
            <input class="right" type="textbox" name="UserNameSignIn" placeholder="UserName"><br></p>
            <p class="center"><label>Password: </label>
            <input class="right" type="textbox" name="NewPassword" placeholder="Password"><br></p>
            <p class="center"><label>Email: </label>
            <input class="right" type="textbox" name="Email" placeholder="Email"><br></p>
            <input class="submitcenter" type="submit" name="SignIn" value="SignIn">
        </form>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>