<?php



class acyearctrl
{
	
	static public function acyearctrladd()
	{
	if (isset($_POST["yearof"])) {
				
				
				 
				$acyear = $_POST["yearof"] -1;
				$acyear = $acyear.'/'.$_POST["yearof"];
				if ($_POST["smster"] == "Semester 1") {
					$uniqueid = 1;
				}else{
					$uniqueid = 2;
				}
				$vl = substr($_POST["yearof"], 2);
				$final  = $vl.''.$uniqueid;

				 $item = "uniquee";
                 $value = $final;
                 $settings = acyearctrl::filteracyearctrlshow($item,$value); 
                 if ( $settings == false) {
                 $table = "acyearsettings";
				$data = array('year' =>$acyear,
							 'uniquee' =>$final,
							'yearinit' =>$_POST["yearof"],
							  'smster' =>$_POST["smster"]);
				$answer = acyearmodal::acyearmodaladd($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "System settings have been added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
					}
                 } else{
                 	echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "error",
							title: "The selected academic year and semester exists",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
                 }
				

		}
	}

	static public function acyearctrlshow($item, $value){
		$table = "acyearsettings";
		$answer = acyearmodal::acyearmodalshow($table, $item, $value);
		return $answer;
	}
	static public function sortacyearctrlshow($item, $value){
		$table = "acyearsettings";
		$answer = acyearmodal::sortacyearmodalshow($table, $item, $value);
		return $answer;
	}
	
	static public function filteracyearctrlshow($item, $value){
		$table = "acyearsettings";
		$answer = acyearmodal::filteracyearmodalshow($table, $item, $value);
		return $answer;
	}
	static public function slctacyearctrlshow($item, $value){
		$table = "acyearsettings";
		$answer = acyearmodal::slctacyearmodalshow($table, $item, $value);
		return $answer;
	}

	static public function acyearctrledit()
	{
	if (isset($_POST["editdataentry"])) {
				
		$table = "acyearsettings";
		$item1 = "dataentryaccess";
		$value1 = $_POST["editdataentry"];
		$item2 = "id";
		$value2 = $_POST["semsid"];
		$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "System settings have been edited succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
				}

		}
	}

static public function acyearctrlsetcrnt()
	{
	if (isset($_POST["semsteryr"])) {
				
				$item = null;
                $value = null;
                $settings = acyearctrl::slctacyearctrlshow($item,$value); 
                if ($settings == true) {
                foreach ($settings as $key => $value) {
                	$settingsidi = $value["id"];
                }
                $satusupdate = "0";
				$table = "acyearsettings";
				$item1 = "currentstatus";
				$value1 = $satusupdate;
				$item2 = "id";
				$value2 = $settingsidi;
				$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

				$satusupdate = "1";
				$table = "acyearsettings";
				$item1 = "currentstatus";
				$value1 = $satusupdate;
				$item2 = "id";
				$value2 = $_POST["semsteryr"];
				$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
				if ($lastLogin == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "The selected academic year and semester have been set succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
					}
                } else{
                $satusupdate = "1";
				$table = "acyearsettings";
				$item1 = "currentstatus";
				$value1 = $satusupdate;
				$item2 = "id";
				$value2 = $_POST["semsteryr"];
				$lastLogin = usersmodal::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
				if ($lastLogin == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "The selected academic year and semester have been set succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
					}

              }
				
		 }
	}

	
static public function acyearctrlsetcrntupdate()
	{
	if (isset($_POST["showinfostatus"])) {
				
		$table = "acyearsettings";
		$item1 = "displaystatus";
		$value1 = $_POST["showinfostatus"];
		$item2 = "id";
		$value2 = $_POST["semsid"];
		$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "System settings have been edited succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "semsterlist";
							}
						});
						</script>';
				}

		}
	}

}


class SearchInfoCtrl
{
	
	static public function CheckInfoCtrl($uri)
	{
	if (isset($_POST["slclassid"])) {
		
		$item = "userid";
        $value = $_SESSION['id'];
        $settings = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);

        if ( $settings == null) {
         $table = "searchinfo";
		 $data = array('userid' =>$_SESSION['id'],
					    'classsup' =>$_POST["slclassid"],
					    'teacherid' =>$_POST["teacherid"],
						'classbrk' =>0,
						'classipt' =>0);
		 $answer = SearchInfoMdl::CheckInfoMdl($table,$data);
		
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "Succesfully!",
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
	        else { 
	         $table = "searchinfo";
			$item1 = "classsup";
			$value1 = $_POST["slclassid"];
			$item2 = "userid";
			$value2 = $_SESSION['id'];
			$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);


			$table = "searchinfo";
			$item1 = "teacherid";
			$value1 = $_POST["teacherid"];
			$item2 = "userid";
			$value2 = $_SESSION['id'];
			$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);


			if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "Succesfully!",
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
	}


	static public function ShowSearchInfoCtrl($item, $value){
		$table = "searchinfo";
		$answer = Modulesmodal::modulesmodalshow($table, $item, $value);
		return $answer;
	}
}
