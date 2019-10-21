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
        <a>'.$user->userInfo['UserName'].'</a><br>
        <a>'.$user->userInfo['Email'].'</a><br>
        <a>'.$user->userInfo['Balance'].'</a><br>
        <a>'.$user->userInfo['UserRole'].'</a><br>';
?>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/Layout/User_Layout_Footer.php');
?>