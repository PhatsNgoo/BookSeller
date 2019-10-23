<?php 
function validate($arg){
foreach( $arg as  $input ){
	if ($input=="" && $input==null){
		
		return "missing_input";
		}
		if($_POST['gender']==""){
		return "Select Gender";
		}
		
}
return true;

}

function Dislpay_Error($index_name){
 $Error =  array(
"missing_input"  		=> "Enter All Fileds",
"Enter_password"		=>	"Enter Your PAssword",
"Enter_Email"			=>	"Enter Your Email",
"InCorrect_Email"		=>	"Enter Correct Email Address",
"Incorect_pass"			=>	"Wrogn Email Or Password",

///change pass 
"blank_oll_pass"		=>	"Enter Old PAssword",
"blank_new_pass"		=>	"Enter New Passorw",
"blank_confirm_pass"	=>	"Confirm Password ",
"Not_Mach"				=>	"Not Mach Your New Password And Confirm Passwod ",
"Incorect_Password"		=>	"Incorect Old Password Please Enter Correct Password",
"Not_Chnge"				=>	"password not change Try Again" ,
);
 echo "<div class='error'> ". $Error[$index_name] ." </div> ";
}

function Dislpay_Succes($index_name){
 $Succes =  array(
 "Password_Change" => "Password Change Succes"
 );
 echo "<div class='Succes'> ". $Succes[$index_name] ." </div> ";
 }
///Filter data ///

function data_filter($arg){

$name = filter_var($arg['name'],FILTER_SANITIZE_STRING);
$gender = filter_var($arg['gender'],FILTER_SANITIZE_STRING);
$password = password_hash($arg['txtPassword'],PASSWORD_DEFAULT);
$email = filter_var($arg['txtemail'],FILTER_VALIDATE_EMAIL);
	if(!$email){
		return "Enter Correct Email";
		}
		$len = strlen($name);
		if($len > 30){
		return "Enter Name Lessthen 30";
		}
		if(strlen($email) > 30){
		return " Enter Email Lessthen 30 ";
		}
return array( "name"=>$name, "email"=>$email, "gender"=>$gender, "password"=>$password);
}


///password maich funtion
function mach_pass($arg){
$password = $arg['txtPassword'];
$con_password= $arg['txtConfirmPassword'];
if ( $password != $con_password){
return "Not_mach_password";
	}
	return true;
}

/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

function login($arg){
			if (empty($arg['email'])){
			return "Enter_Email";
			}
			if (empty($arg['password'])){
			return "Enter_password";
			}
			return true;
}


function validate_data($arg){
$email = filter_var($arg['email'],FILTER_SANITIZE_EMAIL);
$email = filter_var($arg['email'],FILTER_VALIDATE_EMAIL);
$pas = $arg['password'];
	if (!$email){
		return "InCorrect_Email";
	}


return array("Email"=>$email,"Password"=>$pas);
}


function check_filde($arg){

		if (empty($arg['ol_pass'])){
		return "blank_oll_pass";
		}
		elseif (empty($arg['new_pass'])){
		return "blank_new_pass";
		}
		elseif (empty($arg['confirm_pass'])){
		return "blank_confirm_pass";
		}
		elseif ( $arg['new_pass'] != $arg['confirm_pass']){
		return "Not_Mach";
		}

return array("old_pass"=>$arg['ol_pass'],"new_pass"=>$arg['new_pass']);

}


//parches new book input check

function testInput($args){
	if(empty($args['shop_name'])){
	return "Enter Shop Name";
	}
	else{
	$shopName = $args['shop_name'];
	}
	
	if(empty($args['parson_name'])){
	return "Enter Parson Name";
	}
	else{
	$parson_name = $args['parson_name'];
	}
	
	if(empty($args['parson_mobile'])){
	return "Enter parson Mobile";
	}
	else{
	$parson_mobile = $args['parson_mobile'];
	}
	
	if(empty($args['book_name'])){
	return "Enter Book Name";
	}
	else{
	$book_name = $args['book_name'];
	}
	
	if(empty($args['pies_book'])){
	return "Enter Pies Book";
	}
	else{
	$pies_book = $args['pies_book'];
	}
	
	if(empty($args['price_book'])){
	return "Enter Book Price";
	}
	else{
	$price_book = $args['price_book'];
	}

	$shopping_date = $args['shopping_date'];
	
	return array("shop_name"=>"$shopName","parson_name"=>"$parson_name","parson_mobile"=>"$parson_mobile","book_name"=>"$book_name",
	"pies_book"=>"$pies_book","price_book"=>"$price_book","shopping_date"=>"$shopping_date");

}




////Array ( [shop_name] => computer [buying_parson] => semnt [parson_mobile] => 8546985478 [seller_name] => sen 
//[book_name] => Java [pies_book] => 1 [price_book] => 100 [price_All_book] => 100 [shopping_date] => 03-12-2018 [submit] => Submit )
//sell book input test
function testInputSell($args){
	if(empty($args['shop_name']))
		return "Enter Shop Name";	
		
	else
	$ShopName= $args['shop_name'];	
	
	if(empty($args['buying_parson']))
			return "Enter Buying Parson Name";
	else
	$BuyingParson = $args['buying_parson'];

	if(empty($args['parson_mobile']))
			return "Enter Parson Mobile";	
	else
	$BuyingMobile = $args['parson_mobile'];	
	
	if(empty($args['seller_name']))
		return "Enter Seller Name";	
	else
	$SellerName = $args['seller_name'];	
	
	if(empty($args['book_name']))
	return "Enter Book Name";	
	else
		$BookName = $args['book_name'];
	
	if(empty($args['pies_book']))
	return "Enter pies ";	
	else
		$PiesBook = $args['pies_book'];
			
	if(empty($args['price_book']))
	return "Enter book Price ";	
	else
	$PriceBook = $args['price_book'];	
	
	if(empty($args['price_All_book']))
	return "Enter all book  ";	
	else
		$AllPriceBook = $args['price_All_book'];	
	
	if(empty($args['shopping_date']))
	return "Enter shopping date ";	
	else
$ShoppingDate = $args['shopping_date'];	

	return array("ShopName"=>"$ShopName","BuyingParson"=>"$BuyingParson","BuyingMobile"=>"$BuyingMobile","SellerName"=>"$SellerName",
	"BookName"=>"$BookName","PiesBook"=>"$PiesBook","PriceBook"=>"$PriceBook","AllPriceBook"=>"$AllPriceBook","ShoppingDate"=>"$ShoppingDate");

}



// ( [shopName] => [Admin] => [Mobile] => [Email] => [ShopAdd] => [submit] => Submit )
// Shopo Info Input test
function testShopInfo($args){
	if(empty($args['shopName']))
		return "Enter Shop Name";
	else
		$ShopName = $args['shopName'];
		
		if(empty($args['Admin']))
		return "Enter Admin Name";
	else
		$ShopAdmin = $args['Admin'];
		
		if(empty($args['Mobile']))
		return "Enter Mobile";
	else
		$Mobile = $args['Mobile'];
		
		if(empty($args['Email']))
		return "Enter Email";
	else
		$Email = $args['Email'];
		
		if(empty($args['ShopAdd']))
		return "Enter Shop Address";
	else
		$ShopAdd = $args['ShopAdd'];

return array("ShopName"=>"$ShopName","ShopAdmin"=>"$ShopAdmin","Mobile"=>"$Mobile","Email"=>"$Email","ShopAdd"=>"$ShopAdd");

}




?>