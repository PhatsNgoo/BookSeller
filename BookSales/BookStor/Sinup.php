<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SinUp</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">
<div style="color:#FF0000; text-align:center; "><?php 
include("../function/function.php");

	if(isset($_GET['E'])){
	echo $_GET['E'];
	}
	?></div>
	<br>
	<div><?php include('WithOutLoging.php'); ?></div>
<br>
<br>

<div >
<form name="Sinup" onSubmit="return sin_validate()" method="post" action="submit.php">
<table width="661" height="144" border="0" align="center">
  <tr>
    <td width="193"><strong>Name</strong></td>
    <td width="227"><input type="text" onBlur="FName()" class="form-control" name="name" id="name" maxlength="30" placeholder=" Name">
	<samp id="txtname">  </samp>
	</td>
    <td width="227">	
	</td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><input type="text" name="txtemail" id="email" class="form-control" onBlur="Email()" maxlength="30" placeholder=" Email">
	<samp id="txtemail">  </samp>
	</td>
    <td>	
	</td>
  </tr>
  <tr>
    <td><strong>Select Gender </strong></td>
    <td><label><input type="radio" name="gender" value="MALE">MALE</label>
	<label><input type="radio" name="gender" value="FEMALE">FEMALE</label><samp id="txtgender">  </samp></td>
    <td>

	
	</td>
  </tr>
  <tr>
    <td><strong>Password</strong></td>
    <td><input type="password" name="txtPassword" class="form-control" onBlur="Password(),machtpwd()" id="password" maxlength="30" placeholder="Create New Password">
	<samp id="txtpassword">  </samp>
	</td>
    <td>      
      
        <input type="button" style="border:none; text-decoration:none; width:40px; font-weight:700; height:22px; font-size:12px;" class="btn-link" value="Show" id="s" onClick="pwdShow()">
          
	  </td>
  </tr>
  <tr>
    <td><strong>Confirm Password</strong></td>
    <td><input type="password" name="txtConfirmPassword" class="form-control" id="ConfirmPassword" onBlur="CPassword(),machtpwd()" maxlength="30" placeholder="Confirm Password">
		<samp id="TxtConfirmPassword">  </samp><br>
	</td>
    <td>

	</td>
  </tr>
  <tr>
    <td></td>
    <td><div align="center">
      <input type="submit" class="btn-sm btn-primary btn" name="submit" value="Submit"> 
            <input type="reset" name="reset" class="btn-danger btn-sm btn" value="Reset">
            
        </div></td>
    <td></td>
  </tr>
</table>

</form>
</div>
<script src="../Js/script.js"></script>
</body>
</html>
