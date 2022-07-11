<?php


class assignmodulesctrl
{
	
	static public function assignmodulesctrladd($uri)
	{
			if (isset($_POST["teacherid"])) {


				if ($uri == '/ditworkload/partimetichers') {
					$status = 'partime';
				} else {
					$status = 'fulltime';
				}
				
				// Academic year settings
				 $item = null;
                 $value = null;
                 $settings = acyearctrl::acyearctrlshow($item,$value); 
                 
                 	
                 	$settingsk = $settings["dataentryaccess"];
                 	$acyear = $settings["year"];
                 	$sems = $settings["smster"];
                 	$semyear = $settings["uniquee"];
                 	

          
                 
             
                 $classid = $_POST["classidi"];
                   
                 // check if ur allowed to do any data entry
                 if ($settingsk == "Allow") {
                $item = "moduleid";
                $value = $_POST["moduleid"];
                $classes = assignmodulesctrl::assignmodulesctrlshow($item,$value); 
                
                if ($_POST["teacherid"] == $classes["teacherid"] && $_POST["moduleid"] == $classes["moduleid"]) {
                if ($classid == $classes["classid"] && $_POST["moduleid"] == $classes["moduleid"]) {
                	echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "error",
							title: "The select teacher  has been assigned this modules to the selected class",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
                	}else{
                		$item = $classid;
                		$value = $_POST["moduleid"];
                		$classes = assignmodulesctrl::assigntwoctrlshow($item,$value); 

                		$tem = "id";
                        $alue = $_POST["moduleid"];
                        $modules = managedepartsctrl::allmoduleslistctrlshow($tem,$alue); 
                      
                		if ($classes == false) {

                		$table = "assignmodules";
						$data = array('departid' =>$_SESSION["departid"],
								'classid' =>$classid,
								'moduleid' =>$_POST["moduleid"],
								'hrstght' => $modules["hrs"],
								'min' => $modules["min"],
								 'sems' =>$sems,
								 'idunique'=> $semyear,
								 'acyear' =>$acyear,
							  	'teacherid' =>$_POST["teacherid"]);
						$answer = assignmodulesmodal::assignmodulesmodaladd($table,$data);

						$xtem = "teacherid";
                		$xalue = $_POST["teacherid"];
 						$modulehrs = assignmodulesctrl::hrsmodulesctrlshow($xtem,$xalue); 
					if ($modulehrs == false) {
						$table = "extrahours";
						$data = array('departid' =>$_SESSION["departid"],
								  	  'hrstght' =>$modules["hrs"],
								  	  'min' => $modules["min"],
								  	  'sems' =>$sems,
								  	  'idunique'=> $semyear,
								  	  'status' =>$status,
								  	  'acyear' =>$acyear,
							  	 	'teacherid' =>$_POST["teacherid"]);
						$answer = assignmodulesmodal::moduleshrsmodaladd($table,$data);
						}else{
						$xtem = "teacherid";
                		$xalue = $_POST["teacherid"];
 						$modulehrs = assignmodulesctrl::hrsmodulesctrlshow($xtem,$xalue); 
 						$updatehrs = $modules["hrs"] + $modulehrs["hrstght"];
 						$updatemin = $modules["min"] + $modulehrs["min"];

						$table = "extrahours";
						$item1 = "hrstght";
						$value1 = $updatehrs;
						$item2 = "id";
						$value2 = $modulehrs["id"];
						$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

						$table = "extrahours";
						$item1 = "min";
						$value1 = $updatemin;
						$item2 = "id";
						$value2 = $modulehrs["id"];
						$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
						 }
						
						if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "The select Module has been assigned succesfully",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
               			}	


                		}else{
                		echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "error",
							title: "The select Module has been assigned to this class already",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
                		}
               		}
                }else{
                	$item = $classid;
                	$value = $_POST["moduleid"];
                	$trials = assignmodulesctrl::assigntwoctrlshow($item,$value); 
                	
                	$tem = "id";
                    $alue = $_POST["moduleid"];
                    $modules = managedepartsctrl::allmoduleslistctrlshow($tem,$alue); 


                	if ($trials == false) {
                	$table = "assignmodules";
					$data = array('departid' =>$_SESSION["departid"],
								'classid' =>$classid,
								'moduleid' =>$_POST["moduleid"],
								'hrstght' => $modules["hrs"],
								 'min' => $modules["min"],
								'sems' =>$sems,
								'idunique'=> $semyear,
								'acyear' =>$acyear,
							  'teacherid' =>$_POST["teacherid"]);
				$answer = assignmodulesmodal::assignmodulesmodaladd($table,$data);

				$xtem = "teacherid";
                $xalue = $_POST["teacherid"];
 				$modulehrs = assignmodulesctrl::hrsmodulesctrlshow($xtem,$xalue); 
 				$updatehrs = $modules["hrs"] + $modulehrs["hrstght"];

				if ($modulehrs == false) {

					$table = "extrahours";
					$data = array('departid' =>$_SESSION["departid"],
								  'hrstght' =>$modules["hrs"],
								   'min' => $modules["min"],
								   'sems' =>$sems,
								   'idunique'=> $semyear,
								    'status' =>$status,
								   'acyear' =>$acyear,
							  	 'teacherid' =>$_POST["teacherid"]);
					$answer = assignmodulesmodal::moduleshrsmodaladd($table,$data);

					  
					}else{
						$xtem = "teacherid";
                		$xalue = $_POST["teacherid"];
 						$modulehrs = assignmodulesctrl::hrsmodulesctrlshow($xtem,$xalue); 
 						$updatehrs = $modules["hrs"] + $modulehrs["hrstght"];
 						$updatemin = $modules["min"] + $modulehrs["min"];
						
						$table = "extrahours";
						$item1 = "hrstght";
						$value1 = $updatehrs;
						$item2 = "id";
						$value2 = $modulehrs["id"];
						$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

						$table = "extrahours";
						$item1 = "min";
						$value1 = $updatemin;
						$item2 = "id";
						$value2 = $modulehrs["id"];
						$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
					}

					if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "The select Module has been assigned succesfully",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
               			}	
                	} else{
                		echo '<script>
                			Swal.fire({
							position: "top-end",
							icon: "error",
							title: "The select Module has been assigned this class already",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
                	}

                }
                 }else{
                 	echo '<script>
                			Swal.fire({
							position: "top-end",
							icon: "error",
							title: "Module Assigning can not be done as ur not authorised anymore",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "'.$uri.'";
							}
						});
						</script>';
                 }
	

            }

		}

		
		
	static public function assignmodulesctrlshow($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::modulesmodalshow($table, $item, $value);
		return $answer;
	}
	static public function dprtassignmodulesctrlshow($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::advmodulesmodalshow($table, $item, $value);
		return $answer;
	}

	static public function CheckDepartmentpartimeCtrl($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::CheckDepartmentpartimeMdl($table, $item, $value);
		return $answer;
	}

	static public function ModuleAssignedToTichaCtrl($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::ModuleAssignedToTichaMdl($table, $item, $value);
		return $answer;
	}

	static public function DepartModuleAssignedToTichaCtrl($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::DepartModuleAssignedToTichaMdl($table, $item, $value);
		return $answer;
	}
	static public function hrsmodulesctrlshow($item, $value){
		$table = "extrahours";
		$answer = Modulesmodal::Modulesmodalshow($table, $item, $value);
		return $answer;
	}
	static public function dprthrsmodulesctrlshow($item, $value){
		$table = "extrahours";
		$answer = Modulesmodal::CheckDepartmentpartimeMdl($table, $item, $value);
		return $answer;
	}
	static public function viewassignmodulesctrlshow($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::Viewmodulesmodalshow($table, $item, $value);
		return $answer;
	}

	static public function assigntwoctrlshow($item, $value){
		$table = "assignmodules";
		$answer = Modulesmodal::Mdlsmodalshow($table, $item, $value);
		return $answer;
	}

	static public function assignmodulesctrldel(){
		if(isset($_GET["tchid"])){
			$idlink = base64_decode(urldecode($_GET["tchid"]));                               
            $idlink =  ($idlink*956783/5678)/2234567879;
            $idlink = round($idlink);
            var_dump($idlink);
			$item = "id";
            $value = $idlink;
            $Moduleassgned = assignmodulesctrl::assignmodulesctrlshow($item,$value); 

			$xtem = "teacherid";
            $xalue = $Moduleassgned["teacherid"];
 			$modulehrs = assignmodulesctrl::hrsmodulesctrlshow($xtem,$xalue); 
 			$updatehrs = $modulehrs["hrstght"] - $Moduleassgned["hrstght"];
 			$updatemin = $modulehrs["min"] - $Moduleassgned["min"];

			$table = "extrahours";
			$item1 = "hrstght";
			$value1 = $updatehrs;
			$item2 = "id";
			$value2 = $modulehrs["id"];
			$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

			$table = "extrahours";
			$item1 = "min";
			$value1 = $updatemin;
			$item2 = "id";
			$value2 = $modulehrs["id"];
			$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);


			$table = "assignmodules";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);

			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "The Assigned  Module has been deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "viewassigned";
							}
						});
						</script>';
			}
		
		}
	}
}


?>