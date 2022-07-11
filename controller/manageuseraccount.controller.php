<?php



class manageuseraccountsctrl
{
	
	static public function userverifyctrl()
	{
	if (isset($_POST["signuptoken"])) {
				
				var_dump($_POST["signuptoken"]);
				$itm = "signuptoken";
				$value = $_POST["signuptoken"];
				$depart = manageuseraccountsctrl::finduserverifyctrl($itm,$value);
			
				if ($depart != null) {
				if ($depart["acccountstatus"] == 1) {
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "Token Entered is expired already!! Hence Its used ",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
				} else{
					$datu = ($depart["id"]*123456789*5678)/956783;
                	$info = urlencode(base64_encode($datu));
					echo '<script>
						Swal.fire({
							icon: "success",
							title: "Token entered Is Correct Click Proceed to Sign Up",
							showConfirmButton: true,
							confirmButtonText: "Proceed"
						}).then(function(result){
							if(result.value){
						 window.location = "index.php?route=signupacademic&userid='.$info.'";
							}
						});
						</script>';
					}
				
				} else{
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "Token Entered is Incorrect",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
				}
				

		}
	}

	static public function finduserverifyctrl($item, $value){
		$table = "teacherlist";
		$answer = manageuseraccountsmdl::finduserverifymdl($table, $item, $value);
		return $answer;
	}	






static public function UpdatePasswordCtrl()
	{
	if (isset($_POST["confirmnewpass"])) {

				 $encryptpass = crypt($_POST["oldpassword"], '$2a$07$asxx54ahjppf45sd87a5aytds4dDDGsystemdev$ouy');

				$item = "username";
				$value =  $_SESSION["username"];
				$request = manageuseraccountsctrl::showuseraccountctrl($item,$value);
				// var_dump($request);
				if ($request["password"] == $encryptpass) {
				if ($_POST["confirmnewpass"] == $_POST["newpassword"]) {
				    	
				$encryptpass = crypt($_POST["confirmnewpass"], '$2a$07$asxx54ahjppf45sd87a5aytds4dDDGsystemdev$ouy');
				   
				$table = "useracounts";
				$item1 = "password";
				$value1 = $encryptpass;
				$item2 = "id";
				$value2 = $_SESSION["id"];
				$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
				if ($lastLogin == 'ok') {
					echo '<script>
						Swal.fire({
							icon: "success",
							title: "Password is Successfully Changed",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "passwordsettings";
							}
						});
						</script>';
				}
				    } else{
				    	echo '<script>
						Swal.fire({
							icon: "error",
							title: "password Mismatch Please",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "passwordsettings";
							}
						});
						</script>';
				    }
				} else{
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "Wrong password!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "passwordsettings";
							}
						});
						</script>';
				}

		}
	}
	

static public function addnewuseraccountctrl()
	{
	if (isset($_POST["username"])) {
				
			if ($_POST["initialPassword"] == $_POST["finalPassword"]) {

					$phot = "";
					if (isset($_FILES["phototwo"]["tmp_name"])) {
					list($width, $height) = getimagesize($_FILES["phototwo"]["tmp_name"]);
					$newWidth = 500;
					$newHeight = 500;
					$folder = "views/assets/images/avatar/".$_POST["username"];
					mkdir($folder, 0755);
					if($_FILES["phototwo"]["type"] == "image/jpeg"){
						$randomNumber = mt_rand(100,999);
					$phot = "views/assets/images/avatar/".$_POST["username"]."/".$randomNumber.".jpg";
						$srcImage = imagecreatefromjpeg($_FILES["phototwo"]["tmp_name"]);
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, 
							$height);
						imagejpeg($destination, $phot);
					}
					if ($_FILES["phototwo"]["type"] == "image/png") {
					$randomNumber = mt_rand(100,999);
					$phot = "views/assets/images/avatar/".$_POST["username"]."/".$randomNumber.".png";
					$srcImage = imagecreatefrompng($_FILES["phototwo"]["tmp_name"]);
					$destination = imagecreatetruecolor($newWidth, $newHeight);
					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
					imagepng($destination, $phot);
						}
					}
				$idlink = base64_decode(urldecode($_POST["userid"]));
				$idlink =  ($idlink*956783/5678)/123456789;
				$idlink = round($idlink);

				$item = "id";
				$value = $idlink;
				$departmenlist = managedepartsctrl::allteacherslistctrlshow($item,$value);

				$encryptpass = crypt($_POST["initialPassword"], '$2a$07$asxx54ahjppf45sd87a5aytds4dDDGsystemdev$ouy');
				$table = "useracounts";
				$data = array('username' =>$_POST["username"],
							'emailaddress' =>$_POST["emailaddress"],
							'password' =>$encryptpass,
							'photo' =>$phot,
							'role' =>$departmenlist["role"],
							'departid' =>$departmenlist["departid"],
							'teacherid' =>$departmenlist["id"],
							'status' =>$departmenlist["status"]);
			 $answer = manageuseraccountsmdl::addnewuseraccountmdl($table,$data);
			 if ($answer == 'ok') {
			 	$item = "id";
				$value = $idlink;
				$departmenlist = managedepartsctrl::allteacherslistctrlshow($item,$value);

			 	$table = "teacherlist";
				$item1 = "acccountstatus";
				$value1 = 1;
				$item2 = "id";
				$value2 = $departmenlist["id"];
				$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

				echo '<script>
						Swal.fire({
							icon: "success",
							title: "User Accounts is Successfully Created",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
			 	}
			

			} else{
				echo '<script>
						Swal.fire({
							icon: "error",
							title: "password Mismatch Please",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
			}
			
		}
	}

	static public function userloginaccountctrl(){
		if (isset($_POST["username"])) {
			if (preg_match('/^[a-zA-Z0-9 ]+$/',  $_POST["username"]) &&
				preg_match('/^[a-zA-Z0-9 ]+$/',  $_POST["password"])) {
			 $encryptpass = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5aytds4dDDGsystemdev$ouy');
		
				$item = "username";
				$value = $_POST["username"];
				$request = manageuseraccountsctrl::showuseraccountctrl($item,$value);
			if ($request["username"] == $_POST["username"] && $request["password"] == $encryptpass) {	
					
					if($request["status"] == 1){
					 $_SESSION["loggedIn"] = "ok";
					 $_SESSION["id"] = $request["id"];
					 $_SESSION["idi"] = $request["teacherid"];
					 $_SESSION["username"] = $request["username"];
					 $_SESSION["role"] = $request["role"];
					 $_SESSION["departid"] = $request["departid"];
					 $_SESSION["status"] = $request["status"];
					 $_SESSION["photo"] = $request["photo"];
					 $_SESSION["teacherid"] = $request["teacherid"];

					 $itemx = "id";
                     $valuex = $request["id"];
                     $ticha = managedepartsctrl::allteacherslistctrlshow($itemx,$valuex);
					
					date_default_timezone_set("Africa/Dar_es_Salaam");
						$table = "useracounts";
						$date = date('Y-m-d');
						$hour = date('H:i:s');
						$actualDate = $date.' '.$hour;
						$item1 = "lastLogin";
						$value1 = $actualDate;
						$item2 = "id";
						$value2 = $request["id"];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
						if ($lastLogin == 'ok') {
							echo'<script>
					 	window.location = "home";
							</script>';	
						}
					}else{
						echo '<script>
						Swal.fire({
							icon: "warning",
							title: "Account is deactivated please contact Administrator",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
					}

				} else{
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "Wrong password or username!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "login";
							}
						});
						</script>';
				}

			}
		}

	}

	static public function showuseraccountctrl($item, $value){
		$table = "useracounts";
		$answer = manageuseraccountsmdl::showuseraccountmdl($table, $item, $value);
		return $answer;
	}
	
		static public function filtershowuseraccountctrl($item, $value){
		$table = "useracounts";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}
	
	static public function pendingteacherslistctrlshow($item, $value){
		$table = "teacherlist";
		$answer = manageuseraccountsmdl::showuseraccountmdl($table, $item, $value);
		return $answer;
	}	

}


?>


