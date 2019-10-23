<?php 
function DB(){
$conn = mysqli_connect('localhost','root','','booksales');
return $conn;
}

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			sinup function start
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function Email_status($data){
$conn = DB();
$email = $data['email'];
$sql = "SELECT * FROM `user` WHERE email = '$email'  ";
$n = mysqli_query($conn,$sql);
$num = mysqli_num_rows($n);
	if($num == 0){
	return true;
	}
	return "Email Exists Enter Other Email";
}

function DataBsae($arg){
$conn = DB();
$sql = "INSERT INTO `user`(`name`, `email`, `gender`, `password`) VALUES (?,?,?,?)";
$query = mysqli_prepare($conn,$sql);
	if($query){
			mysqli_stmt_bind_param($query,'ssss',$arg["name"],$arg["email"],$arg["gender"],$arg["password"]);
			$status = mysqli_stmt_execute($query);
			if($status){
				mysqli_stmt_close($query);
				mysqli_close($conn);
				return true;
				}
				mysqli_stmt_close($query);
				mysqli_close($conn);
				return "Email Exit ";
		}

}
/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			sinup function end
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			login function start
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function database($arg){
$conn = DB();
$email = $arg["Email"];
$pass =  $arg["Password"];
$sql = " SELECT * FROM `user` WHERE email = ? ";
$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'s',$email);
				mysqli_stmt_bind_result($query,$id,$name,$email,$gender,$password); 
				mysqli_stmt_execute($query);
				mysqli_stmt_fetch($query);
						if(!empty($name)){
									if(password_verify($pass,$password)){
									return array("id"=>$id,"name"=>$name,"email"=>$email,"gender"=>$gender);
									}
									else{
									return "Incorect_pass";
									}
						}
				}
return "Incorect_pass";

}


//// change password function
function pass_mach($arg){
$conn = DB();
$old_pass = $arg['old_pass'];
$new_pass = $arg['new_pass'];
$id = $_SESSION['user']['id'];
$e = $_SESSION['user']['email'];
$sql = "SELECT  `password` FROM `user` WHERE id = ? AND email = ?";
$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'is',$id,$e);
				mysqli_stmt_bind_result($query,$DB_password); 
				mysqli_stmt_execute($query);
				mysqli_stmt_fetch($query);
							if(!empty($DB_password)){
											if(password_verify($old_pass,$DB_password))	{
											return array("email"=>$e,"id"=>$id,"newpass"=>$new_pass);
												}
												else{
												mysqli_stmt_close($query);
												mysqli_close($conn);
												return "Incorect_Password";
												}	
								
								}
								mysqli_stmt_close($query);
								mysqli_close($conn);
								return "Incorect_Olld_Password";
								
								
						
				}


}


////////////////////change passssssssssss
function pass_chang($arg){
$conn = DB();
$email = $arg['email'];
$pass = password_hash($arg['newpass'],PASSWORD_DEFAULT);

$sql = " UPDATE `user` SET password=? WHERE email = ? ";
		$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'ss',$pass,$email);
				$st = mysqli_stmt_execute($query);
						if($st){
						return true;
						}else{
						return "Not_Chnge";
						}

					}
					
}





/// parches book date insert
function insertdata($args){
$conn = DB();
$sql = "INSERT INTO `addbook`(`ShopName`, `ParsonName`, `ParsonMobile`, `BookName`, `PiesOfBook`, `PriceOfOneBook`, `ShoppingDate`)VALUES (?,?,?,?,?,?,?) ";
$q = mysqli_prepare($conn,$sql);
	if($q){
				mysqli_stmt_bind_param($q,'ssssids',$args['shop_name'],$args['parson_name'],$args['parson_mobile'],$args['book_name'],
				$args['pies_book'],$args['price_book'],$args['shopping_date']);
						$st = mysqli_stmt_execute($q);
								if($st)
								{
								mysqli_stmt_close($q);
								mysqli_close($conn);
								$args['shop_name']="";
								$args['parson_name']="";
								$args['parson_mobile']="";
								$args['book_name']="";
								$args['pies_book']="";
								$args['price_book']="";
								$args['shopping_date']="";
								return "Sucess";
								
								}else {
								mysqli_stmt_close($q);
								mysqli_close($conn);
								return "Insert Fald";
								}
								
			}
		else{
			//mysqli_stmt_close($q);
			mysqli_close($conn);
			return "Insert_Error";
		
			}
				
				
}

////// seller detals insert
function insertSell($data)
{
	$conn = DB();
	$sql = "INSERT INTO `sellbook`(`ShopName`, `BuyingParson`, `BuyingParsonMobile`, `SellParson`, `BookName`, `PiesOfBook`, `PriceOfOneBook`, `PriceOfAlaBook`, `SellingDate`) VALUES (?,?,?,?,?,?,?,?,?)";
	$query = mysqli_prepare($conn,$sql);
		if($query){
//array("ShopName"=>"$ShopName","BuyingParson"=>"$BuyingParson","BuyingMobile"=>"$BuyingMobile","SellerName"=>"$SellerName",
//	"BookName"=>"$BookName","PiesBook"=>"$PiesBook","PriceBook"=>"$PriceBook","AllPriceBook"=>"$AllPriceBook","ShoppingDate"=>"$ShoppingDate");
				mysqli_stmt_bind_param($query,'sssssiiis',$data['ShopName'],$data['BuyingParson'],$data['BuyingMobile'],$data['SellerName'],
				$data['BookName'],$data['PiesBook'],$data['PriceBook'],$data['AllPriceBook'],$data['ShoppingDate']);
				$q = mysqli_stmt_execute($query);
					if($q){
					mysqli_stmt_close($query);
					mysqli_close($conn);
					return true;
					}else {
					mysqli_stmt_close($query);
					mysqli_close($conn);
					return "fald";
					}
				mysqli_stmt_close($query);
				mysqli_close($conn);
				return "Insert Error";
			}

}

// shop Infoinsert data 

function insertShopInfo($args){
$conn = DB();
$shopn = $args['ShopName'];
$ShopAdmin = $args['ShopAdmin'];
$Mobile = $args['Mobile'];
$Email = $args['Email'];
$ShopAdd = $args['ShopAdd'];
$sql = "INSERT INTO `shopinfo`(`ShopName`, `Admin`, `Mobile`, `Email`, `ShopAddress`) VALUES ('$shopn','$ShopAdmin','$Mobile','$Email','$ShopAdd')"; 
$q  = mysqli_query($conn,$sql);
	if($q){
	return true;
	}
	else {
	return "Fald";
	}

}


/// Show ShopInfo

function ShowShopInfo(){
$conn = DB();
$sql = " SELECT * FROM `shopinfo`  ";
$q = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_result($q,$ShopName,$Admin,$Mobile,$Email,$ShopAddress,$id);
mysqli_stmt_execute($q);
	$html ="";
	 while(mysqli_stmt_fetch($q)){
	 	$html .= "<a href="."'UpdateShopInfo.php?n=$id'"."class='btn-link b'>Update</a>";
		$html.='<table width="200" border="1" class="table psh-right">';
  $html .="<tr>";
    $html .="<td>id</td>";
    $html .="<td>$id</td>";
  $html .="</tr>";
 
  $html .="<tr>";
    $html .="<td>Shop Name</td>";
    $html .="<td>$ShopName</td>";
  $html .="</tr>";
 $html .=" <tr>";
   $html .=" <td>Admin</td>";
   $html .=" <td>$Admin</td>";
  $html .="</tr>";
  $html .="<tr>";
  $html .="  <td>Mobile</td>";
   $html .=" <td>$Mobile</td>";
  $html .="</tr>";
  $html .="<tr>";
   $html .=" <td>Email</td>";
   $html .=" <td>$Email</td>";
  $html .="</tr>";
  $html .="<tr>";
    $html .="<td>Shop Address</td>";
    $html .="<td>$ShopAddress</td>";
  $html .="</tr>";
$html .="</table>";
}
		
	

return $html;
}






function UpdateShop($args,$id){
 $conn =  DB();
//return array("ShopName"=>"$ShopName","ShopAdmin"=>"$ShopAdmin","Mobile"=>"$Mobile","Email"=>"$Email","ShopAdd"=>"$ShopAdd");
$ShopName = $args['ShopName'];
$ShopAdmin = $args['ShopAdmin'];
$Mobile = $args['Mobile'];
$Email = $args['Email'];
$ShopAdd = $args['ShopAdd'];
$id = $id;
$sql = " UPDATE `shopinfo` SET `ShopName`='$ShopName',`Admin`='$ShopAdmin',`Mobile`='$Mobile',`Email`='$Email',`ShopAddress`='$ShopAdd' WHERE `id`=$id ";
$q = mysqli_query($conn,$sql);
		if($q){
		return true;
		}else{
		return "Faild";
		}
}


///////////////////////////////////////////////////////
//SHoow Some Filed
////////////////////////////////////////////


function ShowSomeFilds($table="addbook",$fild="BookName"){
 $conn =  DB();
 
 $q = " SELECT $fild FROM $table ";
 $query = mysqli_prepare($conn,$q);
 	if($query)
 	{
		mysqli_stmt_bind_result($query,$book);  
		mysqli_stmt_execute($query);
		$shohtml = '';
		while(mysqli_stmt_fetch($query))
			{
			$shohtml .='<option value='."'$book'".'> '."$book".'</option>';
			}
			$shohtml .='';
			return $shohtml;
 	}

}



?>