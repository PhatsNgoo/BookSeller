<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Book Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container">
<?php  include('menu.php') ;?>
<br>
<div>
<h3 class="bg-dark text-white text-center text-uppercase">Display All Book</h3>


</div>
<?php 
// Display book record  function 

function ShowBookRecord(){
include('../DataBase/database.php');
$conn = DB();
$sql = " SELECT * FROM `addbook` ";
$query = mysqli_prepare($conn,$sql);
//mysqli_stmt_bind_param($query);
mysqli_stmt_bind_result($query,$id,$ShopName,$ParsonName,$ParsonMobile,$BookName,$PiesOfBook,$PriceOfOneBook,$ShoppingDate);
mysqli_stmt_execute($query); 
echo "<br>";
$html = "";

	 $html .=   '<table width="700" border="1" height="" cellspacing="2" cellspacing="2" class="text-center table" >';
	 $html .=   '<tr>';
 	 $html .=   '<th scope="col">id</th>';
 	 $html .=   '<th scope="col">Shop Name</th>';
 	 $html .=   '<th scope="col">Parson Name</th>';
  	 $html .=   '<th scope="col">Parson Mobile</th>';
 	 $html .=   '<th scope="col">book Name</th>';
 	 $html .=   '<th scope="col">Quantity </th>';
 	 $html .=   '<th scope="col">Price Of One Book</th>';
  	 $html .=   '<th scope="col">Shoping Date</th>';
 	 $html .=   '</tr>';
  while(mysqli_stmt_fetch($query)){
 	$html .=   " <tr>";
    $html .=   "<td>$id</td>";
    $html .=   "<td>$ShopName</td>";
  	$html .=   "<td>$ParsonName</td>";
 	$html .=   "<td>$ParsonMobile</td>";
 	$html .=   "<td>$BookName</td>";
 	$html .=   "<td>$PiesOfBook</td>";
 	$html .=   "<td>$PriceOfOneBook</td>";
 	$html .=   "<td>$ShoppingDate</td>";
 	$html .=   " </tr>";



					
								}
								 $html .=   "</table>";
								 return  $html;
}

echo ShowBookRecord();


				
				
				
?>



</body>
</html>
