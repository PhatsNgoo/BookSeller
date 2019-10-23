/// LogIn Validate  function 

function log_validate(){
	if(Email_validate()== true && pass_validate()== true )
			return true;
return false;
}
function Email_validate(){
	if (document.getElementById("email").value=="" ){
		document.getElementById("Error_email").innerHTML="Enter Email " ;
		document.getElementById("Error_email").style.color="red";
		document.getElementById("email").style.borderColor="red";
		//document.getElementById("email").focus();	
		return false;
		}
		else {
			document.getElementById("Error_email").innerHTML="" ;
			document.getElementById("email").style.borderColor="";
			return true;
		}
}
function pass_validate(){
	if (document.getElementById("password").value== "" ){
		document.getElementById("Error_password").innerHTML="Enter password " ;
		document.getElementById("Error_password").style.color="red";
		document.getElementById("password").style.borderColor="red";
		//document.getElementById("password").focus();	
		return false;
		}
		else {
			document.getElementById("Error_password").innerHTML="" ;
			document.getElementById("password").style.borderColor="";
		}
	return true;
	}
	//End Validate Login
	
	
	/// SinUp Validate
function sin_validate(){
	if(FName()== true && Email() == true && Password()== true && CPassword() == true && machtpwd()==true )
			return true;
return false;
}




	function FName(){
		if(document.getElementById("name").value==""){
		document.getElementById("txtname").innerHTML="Enter Name " ;
		document.getElementById("txtname").style.color="red";
		document.getElementById("name").style.borderColor="red";
			return false;
			}else{
				document.getElementById("txtname").innerHTML="" ;
				document.getElementById("name").style.borderColor="";
				return true;
				}
		}
		
		
	function Email(){
		if(document.getElementById("email").value==""){
		document.getElementById("txtemail").innerHTML="Enter Email " ;
		document.getElementById("txtemail").style.color="red";
		document.getElementById("email").style.borderColor="red";
			return false;
			}else{
				document.getElementById("txtemail").innerHTML="" ;
				document.getElementById("email").style.borderColor="";
				return true;
				}
		}
	function Geder(){
		var g = document.Sinup.gender ;
		
		
		
		}
	
	function Password(){
		if(document.getElementById("password").value==""){
		document.getElementById("txtpassword").innerHTML="Enter password " ;
		document.getElementById("txtpassword").style.color="red";
		document.getElementById("password").style.borderColor="red";
			return false;
			}else{
				document.getElementById("txtpassword").innerHTML="" ;
				document.getElementById("password").style.borderColor="";
				return true;
				}
		}
	function CPassword(){
		if(document.getElementById("ConfirmPassword").value==""){
		document.getElementById("TxtConfirmPassword").innerHTML="Confirm Password " ;
		document.getElementById("TxtConfirmPassword").style.color="red";
		document.getElementById("ConfirmPassword").style.borderColor="red";
			return false;
			}else{
				document.getElementById("TxtConfirmPassword").innerHTML="" ;
				document.getElementById("ConfirmPassword").style.borderColor="";
				return true;
				}
		}	
		
	function machtpwd(){
		if (document.getElementById("ConfirmPassword").value != "" &&  document.getElementById("password").value!=""){
				if (document.getElementById("ConfirmPassword").value != document.getElementById("password").value){
					document.getElementById("TxtConfirmPassword").innerHTML="Not Mach PAssword" ;
					document.getElementById("TxtConfirmPassword").style.color="red";
					return false;
					}
					else{
						document.getElementById("TxtConfirmPassword").innerHTML="" ;
						return true;
						}
		
		
		}
		
	}
	
	function pwdShow(){
		var pwd1 = document.getElementById("password").getAttribute("type");
					if(pwd1=="password"){
					document.getElementById("password").setAttribute("type","text");
					document.getElementById("ConfirmPassword").setAttribute("type","text");
					document.getElementById("s").setAttribute("value","Hide");
					}else{
						document.getElementById("password").setAttribute("type","password");
					document.getElementById("ConfirmPassword").setAttribute("type","password");
					document.getElementById("s").setAttribute("value","Show");
						}
				
	}


// new purcchesh validate




