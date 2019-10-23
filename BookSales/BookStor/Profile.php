
<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Home</title>
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

<?php include('menu.php');  ?>

<br>

<div> <h2 class="bg-dark text-white text-center text-uppercase">Welcome To A to Z Programming Book Shop  </h2></div>

<br>
<div> 
<h4 align="right"> Seller  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h4>
</div>
<br>
<div class="card">
		<div class="card-header"></div>
		<div class="card-body">
		<br>
		<p class="">Abstract-Today it is becoming very difficult to maintain records manually. Software system easily does the job of maintaining
daily records as well as the transaction according to the user requirements. Only basic knowledge of computers is required for
operations. The software system consists of all information of books and sold to the customer. The proposed system provides lots
of facility to the user to store information of the books and it provide information in quick time in a systematic manner. The
processing time on the data is very fast. It provides required data quickly to the user and also in specified manner to the user.
There is lot of duplicate woks, and chance of mistake when the records are changed they need to update each and every excel
file. There is no option to find and print previous saved records there is no security, anybody can access any report and sensitive
data. This bookshop management system is used to overcome entire problem which they are facing currently, and making
complete atomization of manual system to computerised system.</p>
		</div>
		<div class="card-footer"></div>
</div>
</body>
</html>
