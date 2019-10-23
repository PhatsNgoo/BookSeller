<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
include('../function/function.php');

if(isset($_POST['submit'])){
	$data = check_filde($_POST);
		if (is_array($data)){
		//database part
		include('../DataBase/database.php');
			$datas = pass_mach($data);
					if(is_array($datas)){
					$pass_ch = pass_chang($datas);
								if($pass_ch===true){
								Dislpay_Succes("Password_Change");
								}else{
								Dislpay_Error($pass_ch);
								}
					}else{
					Dislpay_Error($datas);
					}
				
		}else{
		Dislpay_Error($data);
		//echo $data;
		}

}







?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Change Password</title>
<style>
.Error{
color:#FF0000;
text-align:center;
}

.Succes{
color:#0066FF;
text-align:center;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">

<?php include('menu.php'); ?>
<br>
<h3 class="bg-dark text-white text-center text-uppercase">Change User Password</h3>
<h4 align="right"> Seller  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h4>

	<div class="row">
	  <div class="col-md-8 m-auto"><form method="post" action="">
	  <table width="527" height="138" align="center">
  <tr>
    <td width="519"><input name="ol_pass"  class="form-control mb-1"type="password" id="ol_pass" maxlength="30" placeholder="Enter Old Password"></td>
  </tr>
  <tr>
    <td><input name="new_pass" class="form-control mb-1" type="password" id="new_pass" maxlength="30" placeholder="Create New Password"></td>
  </tr>
  <tr>
    <td><input name="confirm_pass" class="form-control mb-3" type="password" id="confirm_pass" value="" placeholder="Confirm Password"></td>
  </tr>
  <tr>
    <td>
      <div align="center">
          <input type="submit" name="submit" class="btn-outline-success btn btn-sm" value="Change"> 
          <input type="reset" class="mr-2 btn-outline-danger btn btn-sm" value="Reset">
      </div></td>
  </tr>
</table>
</form>
		</div>	
	</div>
</body>
</html>
