<?php 
if(isset($_POST['submit'])){
include('../function/function.php');
$input = 	testShopInfo($_POST);
		if(is_array($input)){
		// DateBase 
			include('../Database/Database.php');
				$status = insertShopInfo($input);
						if($status===true){
						$sucess = "SuccesFull";
						}
						else {
						$error =  $status;
						}
		}
		else{
		$error = $input;
		}

}


?>
<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ShopInfo</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style>
.b{
border:none;
 text-decoration:none;
 width:40px;
 font-weight:700;
 height:22px;
 font-size:12px;

}
.b:hover{
text-decoration:none;}


</style>
</head>

<body>
<div class="container">
<div><?php include('menu.php');  ?></div>
<br>
<h2 class="bg-dark text-white text-center text-uppercase">My Shop</h2>
<br>
<h4 align="right"> Seller  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h4>
<div class="row m-auto">

<div class="col-4 ">
<samp style="color:#006699; "><?php if(isset($_GET['s'])){echo $_GET['s'];} ?></samp>
<form method="post">
<p class="text-danger text-center"><?php if(isset($error)){echo "<b>".$error."</b>";} ?></p>
<p class="text-success text-center"><?php if(isset($sucess)){echo "<b>".$sucess."</b>";} ?></p>
<label>Shop Name</label>
    <input type="text" name="shopName" id="ShopName" class="form-control" placeholder="Enter Shop Name">
  <label>Admin</label>
    <input type="text" name="Admin" id="Admin" class="form-control"placeholder="Admin Name">
  <label>Mobile</label>
    <input type="text" name="Mobile" id="Mobile" class="form-control"placeholder="Enter Admin Mobile">
  <label>Email</label>
    <input type="text" name="Email" id="Email" class="form-control"placeholder="Enter Admin Email">
<label>Shop Address</label>
    <textarea class="form-control" name="ShopAdd" cols="3" rows="3" placeholder="Enter Shop Address"></textarea>
	<input type="submit" class="btn-success btn btn-md mt-3" name="submit" value="Submit"> <input type="reset" class=" mt-3 btn-danger btn btn-md"  value="Reset">
</form>

</div>
	<div class="col-6 mt-5"> 
	
<?php include('../Database/Database.php');

 echo  ShowShopInfo(); ?>

	</div>


</div>
</div>
</body>
</html>
