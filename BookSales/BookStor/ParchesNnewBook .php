<?php 
session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}

if(isset($_POST['submit'])){
	include('../Function/function.php');
	$input = testInput($_POST);
		if(is_array($input))
		{
				//// date inserting
				include('../DataBase/database.php');
							$stats = insertdata($input);
								if($stats)
								{
								$s =  "Data Save Sucess";
								}
								else
								{
									$Error =  $stats;
								}
			
		}
		else
		{
			$Error = $input;
		}


}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Parches new book </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">
<div><?php include('menu.php');  ?></div><br>
<h2 class="bg-dark text-white text-center text-uppercase">Purchasing books</h2>
<br>
<br>
<p  class="text-success text-center"><?php if(isset($s)){echo "<b>".$s."</b>";} ?></p>
<p class="text-danger text-center"><?php if(isset($Error)){echo "<b>".$Error."</b>";} ?></p>
<div>
<script src="../Js/script.js"></script>
<form method="post" onSubmit="return NewPusrches();">
<table width="320" height="290" border="0" align="center">
  <tr>
    <td width="142"><label>Shop Name</label> </td>
    <td width="237"><input type="text" name="shop_name" id="shop" class="form-control" placeholder="Shop Name">
	<samp id="errorshop_name" style="color:#FF0000; "></samp>
	</td>
  </tr>
  <tr>
    <td><label>Parson Name</label></td>
    <td><input type="text" name="parson_name" id="parsonName" class="form-control" placeholder="Parson Name">
	<samp id="errorparson_name"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Parson Mobile</label> </td>
    <td><input type="text" name="parson_mobile" id="parson_mobile" class="form-control" placeholder="Parson Mobile">
	<samp id="errorparson_mobile"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Book Name </label></td>
    <td><input type="text" name="book_name" id="book_name" class="form-control" placeholder="Book Name">
	<samp id="errorbook_name"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Quantity </label> </td>
    <td><input type="number" name="pies_book" id="pies_book" class="form-control" placeholder="Quantity ">
	<samp id="errorpies_book" style="color:#FF0000; "></samp>
	</td>
  </tr>
  <tr>
    <td><label>Price Of One Book</label> </td>
    <td><input type="text" name="price_book" id="price_book" class="form-control" placeholder="Book price">
	<samp id="errorprice_book"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Shopping Date</label> </td>
    <td><input type="text" readonly="true" name="shopping_date" id="shopping_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
	<samp id="errorshopping_date"></samp>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><br>
        <input type="submit" name="submit" onClick="return NewPusrches()" value="Submit" class="btn-success btn btn-md"> 
        <input type="reset" value="Reset" class="btn-danger btn btn-md">
    </div></td>
  </tr>
</table>
</form>


</div>
<script>

function NewPusrches(){
	
	if(document.getElementById("shop").value== ""){
	document.getElementById("errorshop_name").innerHTML="Enter Shop Name";
	document.getElementById("shop").style.borderColor="red";
	return false;
	}else {
		document.getElementById("errorshop_name").innerHTML="";
		document.getElementById("shop").style.borderColor="";
		 return true;
		}
		
	if(document.getElementById("parsonName").value == ""){
	document.getElementById("errorparson_name").innerHTML="Enter Shop Name";
	document.getElementById("parsonName").style.borderColor="red";
	return false;
	}else {
		document.getElementById("errorshop_name").innerHTML="";
		document.getElementById("parsonName").style.borderColor="";
		 return true;
		}
	
	
	
	
	
	
	
	}
</script>
<script src="../Js/script.js"></script>
</body>
</html>
