<?php 
 session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
if(isset($_POST['submit'])){
		include('../function/function.php');
$input = testInputSell($_POST);
			if(is_array($input)){
			// date basse
			include('../DataBase/Database.php');
				$stats = insertSell($input);
					if($stats){
						$s =  "Sussecfull";
						$page = $_SERVER['PHP_SELF'];
						$sec = "2";
						header("Refresh: $sec; url=$page");
						$s =  "Sussecfull";
					}else {
					$Error = $stats;
					}
			}
			else{ 
			$Error = $input;
			}


}



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sell Book</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style>
div a{
text-decoration:none;
color:#0099FF;
border-bottom-color:#666666;
border-bottom-style:hidden;
}
div a:hover{
border-bottom-style:dotted;
}

</style>
</head>

<body class="container">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>

<?php include('menu.php') ?>
<br>
<h2 class="bg-dark text-white text-center text-uppercase" id="o">Selling Books</h2>
<div>

<div>

</div></div>
<div>
<p class="text-danger text-center"><?php  if(isset($Error)){echo "<b>".$Error."</b>" ;} ?></p>
<p class="text-danger text-center"><?php  if(isset($s)){echo "<b>".$s."</b>" ;} ?></p>
<form method="post">
<table width="320" height="370" border="0" align="center">
  <tr>
    <td><label>Shop Name </label></td>
    <td><input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="Shop Name">
	<samp id="errorshop_name"></samp>
	</td>
  </tr>
  <tr>
    <td width="142"><label>Buying Parson </label> </td>
    <td width="237"><input type="text" name="buying_parson" id="buying_parson" class="form-control" placeholder="Buying Parson">
	<samp id="errorbuying_parson"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Buying Parson Mobile </label></td>
    <td><input type="text" name="parson_mobile" id="parson_mobile" class="form-control" placeholder="Buying Parson Mobile">
	<samp id="errorparson_mobile"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Seller</label> </td>
    <td><input type="text" name="seller_name" id="seller_name" readonly="true" value="<?php if(isset($_SESSION['user']['name'])){echo $_SESSION['user']['name'];} ?>" class="form-control" placeholder="Seller">
	<samp id="errorseller_name"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Book Name </label></td>
    <td>
	<select name="book_name" id="book_name" class="dropdown-item" onChange="myfun(this.value)">
	<option value="">--Select Book--</option>
	<?php include_once('../Database/database.php'); echo ShowSomeFilds(); ?>
	</select>
	<samp id="errorbook_name"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Quantity </label> </td>
    <td><input type="number" name="pies_book" id="pies_book" onBlur="allprice()" class="form-control" placeholder="Quantity ">
	<samp id="errorpies_book"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Price Of One Book</label> </td>
    <td id="price_boo">

	<samp id="errorprice_book"></samp>
	</td>
  </tr>
  <tr>
    <td><label>Price Of All Book</label></td>
    <td><input type="text" name="price_All_book" id="price_All_book" class="form-control" placeholder="Price all bok"></td>
  </tr>
  <tr>
    <td><label>Selling  Date</label> </td>
    <td><input type="text" name="shopping_date" readonly="true" id="shopping_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
	<samp id="errorshopping_date"></samp>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><br>
        <input type="submit" name="submit" value="Submit" class="btn-success btn btn-md"> 
        <input type="reset" value="Reset" class="btn-danger btn btn-md">
    </div></td>
  </tr>
</table>
</form>


</div>

<script>function myfun(datav){
$.ajax({
url:'ajax.php',
type:'post',
data: { datapost:datav },
success: function(result){
$('#price_boo').html(result);
}
});
}

function allprice(){
 var pis = parseInt(document.getElementById("pies_book").value);
 var price = parseInt(document.getElementById("price_book").value);
 document.getElementById("price_All_book").value = pis*price;
 
} 

</script>
</body>
</html>
