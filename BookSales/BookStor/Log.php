<?php 
session_start(); 
if(isset($_POST['submit'])){
include('../function/function.php');
$vaildat_login = login($_POST);
if ($vaildat_login===true){
		$validate = validate_data($_POST);
			if (is_array($validate)){
			////////////////// dtabase
			include('../DataBase/database.php');
					$data = database($validate);
						if(is_array($data)){
						$_SESSION['user'] = $data ;
						header('location:profile.php');
						}else{
						Dislpay_Error($data);
						}
				
			}
			else{
			Dislpay_Error($validate);
			}
	
	
	}else{
	Dislpay_Error($vaildat_login);
	}


}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>LogIn</title>
<style>
.Error{
color:#FF0000;
text-align:center;
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">
<br>
<div><?php include('WithOutLoging.php'); ?></div>
<br>
<br>
<div class="row">
	  <div class="col-md-8 m-auto">
<form method="post" onSubmit=" return log_validate() " name="login" action="">
  <table width="400" height="79" border="0" align="center">
    <tr>
      <td width="148">Email</td>
      <td width="242"><input type="text"  onBlur="Email_validate()" class="form-control mb-1" name="email" id="email" maxlength="30" placeholder="Enter Your Email">
	  <samp id="Error_email"> </samp>
	  </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" onBlur="pass_validate()" class="form-control mb-1" name="password" id="password" maxlength="30" placeholder="Enter Your Password">
        <samp id="Error_password"> </samp>
	  </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
          <input type="submit" name="submit" class="btn-outline-success btn btn-sm" value="LogIn"><br>
		 
      </div></td>
    </tr>
  </table>
  </form>
  </div>	
	</div>
   <script src="script.js"></script>
</body>
</html>
