<?php 
if(isset($_POST['submit'])){
include("../Function/function.php");
include("../DataBase/database.php");
$validate_data = validate($_POST);
if($validate_data===true){
				$mach = mach_pass($_POST);
				if($mach===true){
							$data = data_filter($_POST);
							if(is_array($data)){
								// database part
									$emailst = Email_status($data);
										if($emailst === true){
														$status = 	DataBsae($data);
														if($status){
														header('location:sinup.php?E= Succes');
														}else{
														header('location:sinup.php?E='.$status);
														}
													}
													else{
													header('location:sinup.php?E='.$emailst);
													}
													
										}
									else{
										header('location:sinup.php?E= '.$data);
										}
									
							}
							else{
							header('location:sinup.php?E= '.$mach);
							}
			}
			else{
			//$EE = Dislpay_Error($validate_data);
			header('location:sinup.php?E= '.$validate_data);
			
			}
	
	//header("location:sinup.php?E=".Dislpay_Error($validate_data)."");
	}
else{
header("location:sinup.php");
}



?>