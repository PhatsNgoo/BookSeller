<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/UserController.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/model/User.php');
$user=new UserController();
$user->Run();
?>
<body>

<?php
    echo '
        <div class="userinforbg">
        <p class="userinforcenter"><label>User Name: </label> <a class="right">'.$user->userInfo['UserName'].'</a></p><br>
        <p class="userinforcenter"><label>Email: </label> <a class="right">'.$user->userInfo['Email'].'</a></p><br>
        <p class="userinforcenter"><label>Balance: </label> <a class="right">'.$user->userInfo['Balance'].'$</a></p><br>
        <p class="userinforcenter"><label>User Role: </label> <a class="right">'.$user->userInfo['UserRole'].'</a></p><br></div>';
?>

</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>