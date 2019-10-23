<?php 
include('../DataBase/Database.php');
$conn = DB();
$data = $_POST['datapost'];
$sql = "SELECT `PriceOfOneBook` FROM `addbook` WHERE `BookName`= '$data'";
$r = mysqli_query($conn,$sql);
	while($d= mysqli_fetch_array($r)){
	?>
	<input type="text" name="price_book" value="<?php echo $d['PriceOfOneBook'];?>" id="price_book" class="form-control">
	
	
	
	<?php 
	}
	?>