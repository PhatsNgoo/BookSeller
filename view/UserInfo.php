<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/controller/DataManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Header.php');
require_once ($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/model/User.php');
class UserInfo{
    public $user;
    public $dataMng;
    public function __construct()
    {
    }
    public function GetUserInfo($userName){
        $this->dataMng=new DataManager();
        $this->user=$this->dataMng->GetUserInfo($userName);
    }
}
$userInfo=new UserInfo();
if (isset($_GET['userid'])){
    $userInfo->GetUserInfo($_GET['userid']);
}
?>
<body>

<?php
    echo '
        <a>'.$userInfo->user['UserName'].'</a><br>
        <a>'.$userInfo->user['Email'].'</a><br>
        <a>'.$userInfo->user['Balance'].'</a><br>';
?>
</body>
<?php
require($_SERVER["DOCUMENT_ROOT"].'/BookSeller/'.'/Layout/User_Layout_Footer.php');
?>