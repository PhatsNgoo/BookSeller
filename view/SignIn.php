<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/UserController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/User.php');
$user=new UserController();
$user->Run();
?>
    <style>
        input{
            margin-right: 0;
            height: 30px;
            width: 150px;
        }
        p{
            margin: auto;
            margin-top: 10px;
            width: 500px;
        }
        form{
            background: #1c7430;
        }
    </style>
    <body>
    <!--Sign in form-->
        <form method="post" style="margin: auto; width: 600px;">
            <p><label>User Name: </label><input style="align-content: center" type="textbox" name="UserNameSignIn" placeholder="UserName"><br></p>
            <p><label>Password: </label><input type="textbox" name="NewPassword" placeholder="Password"><br></p>
            <p><label>Email: </label><input type="textbox" name="Email" placeholder="Email"><br></p>
            <p><input type="submit" name="SignIn" value="SignIn"></p>
        </form>
    </body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>