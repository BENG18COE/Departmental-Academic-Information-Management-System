<?php

class managedepartsctrl
{
	

	static public function updateclassvisibltyctrl()
	{
	if (isset($_POST["slctdepartid"])) {
				
				$item = $_POST["slctdepartid"];
				$value = $_POST["slctclassid"];
				$answer = managedepartsctrl::filtershowclassvisibltyctrl($item,$value);
				if ($answer == false) {
				$table = "classvisibilty";
				$data = array('foreigndepartid' =>$_POST["slctdepartid"],
								'classid' =>$_POST["slctclassid"],
								'departid' =>$_SESSION["departid"],
								'userid' =>$_SESSION["id"]);
				$answer = managedepartmdl::updateclassvisibltymdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "New Class Visibility is added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "classvisibilty";
							}
						});
						</script>';
					}
				} else{
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "The selected Class is Already Visible to the selected Department!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "classvisibilty";
							}
						});
						</script>';
				}
			

		}
	}

	static public function filtershowclassvisibltyctrl($item, $value){
		$table = "classvisibilty";
		$answer = managedepartmdl::filterclassvisbilitymdl($table, $item, $value);
		return $answer;
	}	

	static public function filtertwoshowclassvisibltyctrl($item, $value){
		$table = "classvisibilty";
		$answer = managedepartmdl::filterteacherlistmdlshowtwo($table, $item, $value);
		return $answer;
	}

	static public function adddepartmentctrl()
	{
	if (isset($_POST["departname"])) {
				
				
				$table = "departments";
				$data = array('name' =>$_POST["departname"],
								'initial' =>$_POST["departinitial"],
								'hod' =>$_POST["hod"]);
				$answer = managedepartmdl::adddepartmentmdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "New Department is added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "departments";
							}
						});
						</script>';
				}

		}
	}

	static public function departmentctrlshow($item, $value){
		$table = "departments";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}	

	


static public function editdepartmentctrl()
	{
	if (isset($_POST["editdepartname"])) {
				
				$table = "departments";
				$data = array('name' =>$_POST["editdepartname"],
								'initial' =>$_POST["editdepartinitial"],
								'id' =>$_POST["eidiii"],
								'hod' =>$_POST["edithod"]);
				$answer = managedepartmdl::editdepartmentmdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: " Department is edited succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "departments";
							}
						});
						</script>';
				}

		}
	}

	static public function departmentctrldel(){
		if(isset($_GET["brid"])){
			$table = "departments";
			$data = $_GET["brid"];
			$answer = managedepartmdl::departmentmodaldel($table, $data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Department has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "departments";
							}
						});
						</script>';
			}
		
		}
	}


    static public function addacademicuserctrl()
	{
	if (isset($_POST["entrytype"])) {
				
		if ($_POST["entrytype"] == "Upload CSV") {
			if (isset($_FILES["csvfile"]["tmp_name"])) {
				if ($_FILES["csvfile"]["error"] > 0) {
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "There is no CSV file selected",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "newuser";
							}
						});
						</script>';
				} else{
					$file = $_FILES["csvfile"]["tmp_name"];
					$file = fopen($file, "r");
					$column = fgetcsv($file, 10000, ",");
					$item = null;
					$value = $_SESSION["departid"];
					$answer = managedepartsctrl::filterteacherslistctrlshow($item,$value); 

					
						while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
						$itm = "id";
				        $valu =  $_SESSION["departid"];
				        $depart = managedepartsctrl::departmentctrlshow($itm,$valu);
						$randomno = mt_rand(1000,9999);	
            			$date = new DateTime();
            			$date = $date->getTimestamp();
            			$date = substr($date, 6);
            			$randomn1 = mt_rand(1000,9999);	
            			$signuptoken =  $depart["initial"].'-'.$randomn1.''.$randomno;
						$table = "teacherlist";
						$data = array('first' =>$column[1],
							 'secon' =>$column[2], 
							 'third' =>$column[3],
							 'title' =>$column[4],
							 'departid' => $_SESSION["departid"],
							 'signuptoken' =>$signuptoken,
							 'role' =>$column[5],
							 'status' =>$column[6],
							 'userid' =>1);
				$answer = managedepartmdl::addmutlpleteachermdl($table,$data);

				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "newuser";
									}
								});
								</script>';
							}
						}

				}
			}
			
		} elseif ($_POST["entrytype"] == "Enter Single Info") {
			$itm = "id";
            $valu =  $_SESSION["departid"];
            $depart = managedepartsctrl::departmentctrlshow($itm,$valu);
            $randomno = mt_rand(1000,9999);	
            $date = new DateTime();
            $date = $date->getTimestamp();
            $date = substr($date, 6);
            $randomn1 = mt_rand(1000,9999);	
            $signuptoken =  $depart["initial"].'-'.$randomn1.''.$randomno;
            
			$table = "teacherlist";
			$data = array('first' =>$_POST["firstname"],
						 'secon' =>$_POST["secondname"], 
						 'third' =>$_POST["thirdname"],
						 'title' =>$_POST["position"],
						 'departid' => $_SESSION["departid"],
						 'signuptoken' =>$signuptoken,
						 'role' =>$_POST["userrole"],
						 'status' =>$_POST["jobtype"],
						 'userid' =>1);
			$answer = managedepartmdl::addmutlpleteachermdl($table,$data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Multple records have been succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "newuser";
							}
						});
						</script>';
				}
			}


	}

	
}
		static public function filterteacherslistctrlshow($item, $value){
		$table = "teacherlist";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}

	static public function departfilterteacherslistctrlshow($item, $value){
		$table = "teacherlist";
		$answer = managedepartmdl::departfilterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}	

	static public function filterteacherspartimelistctrlshow($item, $value){
		$table = "teacherlist";
		$answer = managedepartmdl::filterteacherpartimelistmdlshow($table, $item, $value);
		return $answer;
	}	

	static public function filterteacherulltimestctrlshow($item, $value){
		$table = "teacherlist";
		$answer = managedepartmdl::filterteacherfulltimelistmdlshow($table, $item, $value);
		return $answer;
	}	

	static public function allteacherslistctrlshow($item, $value){
		$table = "teacherlist";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}







 






static public function editacademicuserctrl()
	{
	if (isset($_POST["editfirstname"])) {
				
			$table = "teacherlist";
			$data = array('first' =>$_POST["editfirstname"],
						 'secon' =>$_POST["editsecond"], 
						 'third' =>$_POST["editthird"],
						 'title' =>$_POST["editposition"],
						 'departid' =>$_POST["editdepartid"],
						 'role' =>$_POST["edituserrole"],
						 'status' =>$_POST["editjobtype"],
						 'id' =>$_POST["recordid"],
						 'userid' =>$_SESSION["id"]);
				$answer = managedepartmdl::editmutlpleteachermdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "The selected  is edited succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "teacherlist";
							}
						});
						</script>';
				}

		}
	}


	
// 
// 
// 
// 
// modulescsv




static public function addmoudelsctrl()
	{
	if (isset($_POST["entrytypetwo"])) {
				
				
		if ($_POST["entrytypetwo"] == "Upload CSV") {

			if (isset($_FILES["csvfiletwo"]["tmp_name"])) {
				
				$file = $_FILES["csvfiletwo"]["tmp_name"];
				$file = fopen($file, "r");
				$column = fgetcsv($file, 10000, ",");
				if ($_FILES["csvfiletwo"]["error"] > 0) {
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "There is no CSV file selected",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "modules";
							}
						});
						</script>';
					} else{
					while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
						$table = "modules";
						$data = array('code' =>$column[1],
							 'name' =>$column[2], 
							 'hrs' =>$column[3],
							 'min' =>$column[4],
							 'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::addmodulesmdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "modules";
									}
								});
								</script>';
							}
						}
					}
				}
			} else{
				$table = "modules";
						$data = array('code' =>$_POST["modulecode"],
							 'name' =>$_POST["modulename"], 
							 'hrs' =>$_POST["hrs"],
							 'min' =>$_POST["min"],
							 'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::addmodulesmdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "modules";
									}
								});
								</script>';
							}
				}


		}
	}

	static public function filtermoduleslistctrlshow($item, $value){
		$table = "modules";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}

	static public function allmoduleslistctrlshow($item, $value){
		$table = "modules";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}	

	static public function modulesctrldel(){
		if(isset($_GET["mdlid"])){
			$table = "modules";
			$data = $_GET["mdlid"];
			$answer = managedepartmdl::departmentmodaldel($table, $data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Module has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "modules";
							}
						});
						</script>';
			}
		
		}
	}
	
static public function editmodulesctrl()
	{
	if (isset($_POST["editcode"])) {
				
			$table = "modules";
			$data = array('code' =>$_POST["editcode"],
				 'name' =>$_POST["editname"], 
				 'id' =>$_POST["moduleid"],
				 'hrs' =>$_POST["edithrs"],
				 'min' =>$_POST["editmin"]);
				$answer = managedepartmdl::editmodulesmdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "modules";
									}
								});
								</script>';
							}	
				

		}
	}

	



static public function addcoarsectrl()
	{
	if (isset($_POST["coarseinitial"])) {
				
			$table = "coarse";
			$data = array('intial' =>$_POST["coarseinitial"],
				 		  'name' =>$_POST["cname"], 
				 		  'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::addcoarsemdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "New Coarse is added succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "courses";
									}
								});
								</script>';
							}	

		}
	}

	static public function filtercoarseslistctrlshow($item, $value){
		$table = "coarse";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}

	static public function allcoarseslistctrlshow($item, $value){
		$table = "coarse";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}	

	

	static public function coarsectrldel(){
		if(isset($_GET["crsid"])){
			$idlink = base64_decode(urldecode($_GET["crsid"]));
			$idtodb = ($_GET["crsid"]);
			$idlink =  ($idlink*956783/5678)/2234567879;
			$idlink = round($idlink);
			$table = "coarse";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Module has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "coarses";
							}
						});
						</script>';
			}
		
		}
	}

	



static public function editcoarsectrl()
	{
	if (isset($_POST["editcoarseinitial"])) {
				
			$table = "coarse";
			$data = array('intial' =>$_POST["editcoarseinitial"],
						  'id' =>$_POST["coarseid"],
				 		  'name' =>$_POST["editcorsename"], 
				 		  'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::editcoarsemdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "New Coarse is edited succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "courses";
									}
								});
								</script>';
							}	

		}
	}

	static public function addclasctrladd()
	{
	if (isset($_POST["yearof"])) {
		
				$firstCharacter = substr($_POST["yearof"], 2);
				// $nameclas = $_POST["classtype"].''.$firstCharacter.'-'.$_POST["coarse"];
				$table = "classlist";
				$data = array('classtype' =>$_POST["classtype"],
								'totalsdnts' =>$_POST["totalsdnts"],
								'yearof' =>$firstCharacter,
								'coarse' =>$_POST["coarse"],
								'departid' =>$_SESSION["departid"],
								'stream' =>$_POST["stream"]);
				$answer = managedepartmdl::clasesmodaladd($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "New class is  succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "classes";
									}
								});
								</script>';
							}	
				

		}
	}

	static public function filterclasslistctrlshow($item, $value){
		$table = "classlist";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}

	static public function allclasslistctrlshow($item, $value){
		$table = "classlist";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}


	static public function classlistctrldel(){
		if(isset($_GET["crsid"])){
			$idlink = base64_decode(urldecode($_GET["crsid"]));
			$idtodb = ($_GET["crsid"]);
			$idlink =  ($idlink*956783/5678)/2234567879;
			$idlink = round($idlink);
			$table = "classlist";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "class has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "classes";
							}
						});
						</script>';
			}
		
		}
	}

	




	static public function updateclasctrladd()
	{
	if (isset($_POST["editotalsdnts"])) {
		

		$table = "classlist";
		$item1 = "totalsdnts";
		$value1 = $_POST["editotalsdnts"];
		$item2 = "id";
		$value2 = $_POST["idi"];
		$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

		if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "class has been edited succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "classes";
							}
						});
						</script>';
			}
			

		}
	}

	

	static public function addstudentstoclassesctrl()
	{
	if (isset($_POST["entrytype3"])) {
				
		if ($_POST["entrytype3"] == "Upload CSV") {

				if (isset($_FILES["csvfilethree"]["tmp_name"])) {
					var_dump($_POST["entrytype3"]);
				$file = $_FILES["csvfilethree"]["tmp_name"];
				$file = fopen($file, "r");
				$column = fgetcsv($file, 10000, ",");
				if ($_FILES["csvfilethree"]["error"] > 0) {
					echo '<script>
						Swal.fire({
							icon: "error",
							title: "There is no CSV file selected",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "students";
							}
						});
						</script>';
					} else{
					while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
					$table = "studentslists";
					$data = array('classid' =>$_POST["classid"],
							 'fullname' =>$column[1], 
							 'phone' =>$column[2],
							 'regno' =>$column[3],
							 'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::addstudentsmdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "students";
									}
								});
								</script>';
							}
						}
					}
				}
			} else{
				$table = "studentslists";
				$data = array('classid' =>$_POST["classid"],
							 'fullname' =>$_POST["fullname"], 
							 'phone' =>$_POST["phone"],
							 'regno' =>$_POST["regno"],
							 'departid' =>$_SESSION["departid"]);
				$answer = managedepartmdl::addstudentsmdl($table,$data);
				if ($answer == "ok") {
						echo '<script>
								Swal.fire({
									icon: "success",
									title: "Multple records have been succesfully!",
									showConfirmButton: true,
									confirmButtonText: "Close"
								}).then(function(result){
									if(result.value){
										window.location = "students";
									}
								});
								</script>';
							}
				}


		}
	}

 static public function filterstudentsctrlshow($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::filterteacherlistmdlshow($table, $item, $value);
		return $answer;
	}

	 static public function AllstudentsctrlshowCtrl($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}

	 static public function studentsctrlinclassshow($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::studentsctrlinclassmdl($table, $item, $value);
		return $answer;
	}

	 static public function studentsctrlinclass1show($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::studentsctrlinclass1mdl($table, $item, $value);
		return $answer;
	}

	 static public function studentsctrlinclass2show($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::studentsctrlinclass2mdl($table, $item, $value);
		return $answer;
	}


	static public function allstudentsctrlshow($item, $value){
		$table = "studentslists";
		$answer = managedepartmdl::departmentmdlshow($table, $item, $value);
		return $answer;
	}


	


	static public function studentctrldel(){
		if(isset($_GET["stdid"])){
			$idlink = base64_decode(urldecode($_GET["stdid"]));
			$idtodb = ($_GET["stdid"]);
			$idlink =  ($idlink*956783/567888)/22345678709;
			$idlink = round($idlink);
			$table = "studentslists";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);
			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "A selected Student has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "students";
							}
						});
						</script>';
			}
		
		}
	}






static public function updatestudentdetailsctrl(){
		if (isset($_POST["editflnstudent"])) {
			$table = "studentslists";
			$data = array( 
						 'fullname' =>$_POST["editflnstudent"], 
						 'id' =>$_POST["eidiii"], 
						 'phone' =>$_POST["editphone"],
						 'regno' =>$_POST["editregnostdnt"]);
			$answer = managedepartmdl::editstudentsmdl($table,$data);
			if ($answer == "ok") {
					echo '<script>
							Swal.fire({
								icon: "success",
								title: "Multple records have been succesfully!",
								showConfirmButton: true,
								confirmButtonText: "Close"
							}).then(function(result){
								if(result.value){
									window.location = "students";
								}
							});
							</script>';
					}
		}
			

		
	}

	

static public function addadminstrationuserctrl()
	{
	if (isset($_POST["useremail"])) {
				
				
		            $phot = "";
					if (isset($_FILES["photothree"]["tmp_name"])) {

					list($width, $height) = getimagesize($_FILES["photothree"]["tmp_name"]);
					$newWidth = 500;
					$newHeight = 500;
					$folder = "views/assets/images/avatar/".$_POST["username"];
					mkdir($folder, 0755);
					if($_FILES["photothree"]["type"] == "image/jpeg"){
						$randomNumber = mt_rand(100,999);
					$phot = "views/assets/images/avatar/".$_POST["username"]."/".$randomNumber.".jpg";
						$srcImage = imagecreatefromjpeg($_FILES["photothree"]["tmp_name"]);
						$destination = imagecreatetruecolor($newWidth, $newHeight);
						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, 
							$height);
						imagejpeg($destination, $phot);
					}
					if ($_FILES["photothree"]["type"] == "image/png") {
					$randomNumber = mt_rand(100,999);
					$phot = "views/assets/images/avatar/".$_POST["username"]."/".$randomNumber.".png";
					$srcImage = imagecreatefrompng($_FILES["photothree"]["tmp_name"]);
					$destination = imagecreatetruecolor($newWidth, $newHeight);
					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
					imagepng($destination, $phot);
						}
					}
				
				$encryptpass = crypt($_POST["username"], '$2a$07$asxx54ahjppf45sd87a5aytds4dDDGsystemdev$ouy');
				$table = "useracounts"; 
				$data = array('username' =>$_POST["username"],
							 'fullname' =>$_POST["fullnameadmin"],
							'emailaddress' =>$_POST["useremail"],
							'password' =>$encryptpass,
							'photo' =>$phot,
							'departid' =>0,
							'role' =>$_POST["userole"]);
				 $answer = manageuseraccountsmdl::addnewuseraccountwomdl($table,$data);
				 if ($answer == 'ok') {
					echo '<script>
							Swal.fire({
								icon: "success",
								title: "User Account is Successfully Created",
								showConfirmButton: true,
								confirmButtonText: "Close"
							}).then(function(result){
								if(result.value){
									window.location = "viewuseraccounts";
								}
							});
							</script>';
				 	}
			


		}
	}

}


?>