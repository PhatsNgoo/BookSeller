<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Display Selling Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">
<?php include('menu.php') ;?>
<div>
<br>
<h2 class="bg-dark text-white text-center text-uppercase">Display Selling Records</h2>
<br>
</div>
<?php 
function ShowSellRecord(){
include('../DataBase/database.php');
$conn = DB();
$sql = "SELECT * FROM `sellbook` ";
$query = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_result($query,$id,$ShopName,$BuyingParson,$BuyingParsonMobile,$SellParson,$BookName,$PiesOfBook,$PriceOfOneBook,$PriceOfAlaBook,$SellingDate);
mysqli_stmt_execute($query);
 
$html = "";

	 $html .=   '<table width="700" border="1" height="" cellspacing="2" cellspacing="2" class="text-center table" >';
	 $html .=   '<tr>';
 	 $html .=   '<th scope="col">id</th>';
 	 $html .=   '<th scope="col">Shop Name</th>';
 	 $html .=   '<th scope="col">BuyingParson</th>';
  	 $html .=   '<th scope="col">BuyingParsonMobile</th>';
 	 $html .=   '<th scope="col">SellParson</th>';
 	 $html .=   '<th scope="col">BookName</th>';
 	 $html .=   '<th scope="col">Quantity </th>';
  	 $html .=   '<th scope="col">PriceOfOneBook</th>';
	  $html .=   '<th scope="col">PriceOfAllBook</th>';
	 $html .=   '<th scope="col">SellingDate</th>';
 	 $html .=   '</tr>';
  while(mysqli_stmt_fetch($query)){
 	$html .=   " <tr>";
    $html .=   "<td>$id</td>";
    $html .=   "<td>$ShopName</td>";
  	$html .=   "<td>$BuyingParson</td>";
 	$html .=   "<td>$BuyingParsonMobile</td>";
 	$html .=   "<td>$SellParson</td>";
 	$html .=   "<td>$BookName</td>";
 	$html .=   "<td>$PiesOfBook</td>";
 	$html .=   "<td>$PriceOfOneBook</td>";
	$html .=   "<td>$PriceOfAlaBook</td>";
	$html .=   "<td>$SellingDate</th>";
 	$html .=   " </tr>";



					
								}
								 $html .=   "</table>";
								 return  $html;
}

echo ShowSellRecord();


				
				
				
?>


</body>
</html>
