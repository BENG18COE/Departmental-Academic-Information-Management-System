<?php 

class ExaminationManageCtrl
{
	
	static public function AddScriptMarkingCtrl()
	{
	if (isset($_POST["exmteacherid"])) {

				 $item = null;
                 $value = null;
                 $settings = acyearctrl::acyearctrlshow($item,$value); 
                 $settingsk = $settings["dataentryaccess"];
                 $acyear = $settings["year"];
                 $sems = $settings["smster"];
                 $semyear = $settings["uniquee"];
                 	

				
				$table = "scriptmarking";
				$data = array('teacherid' =>$_POST["exmteacherid"],
								'moduleid' =>$_POST["exmoduleid"],
								'sems' =>$sems,
								'acyear' =>$acyear,
								'classid' =>$_POST["classidi"],
								'numberofstudents' =>$_POST["numberofstudens"]);
				$answer = ExaminationManagemdl::AddScriptMarkingMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "scriptmarking";
							}
						});
						</script>';
				}

		}
	}

	// 	static public function CheckifTeacherIsAssignedExmCtrl($item, $value){
	// 	$table = "scriptmarking";
	// 	$answer = ExaminationManagemdl::CheckifTeacherIsAssignedExmMdl($table, $item, $value);
	// 	return $answer;
	// }

		static public function ShowAssignedExamsSetCtrl($item, $value){
		$table = "scriptmarking";
		$answer = ExaminationManagemdl::ShowAssignedExamsSetMdl($table, $item, $value);
		return $answer;
	}

	static public function CheckAssingedCtrLSetCtrl($item, $value){
		$table = "scriptmarking";
		$answer = ExaminationManagemdl::CheckAssingedCtrLSetMdl($table, $item, $value);
		return $answer;
	}

	static public function SumOfScriptSetCtrl($item, $value){
		$table = "scriptmarking";
		$answer = ExaminationManagemdl::SumOfScriptSetMdl($table, $item, $value);
		return $answer;
	}


	static public function DelAssignedScriptExamCtrl(){
		if(isset($_GET["scrid"])){
			$idlink = base64_decode(urldecode($_GET["scrid"]));                               
            $idlink =  ($idlink*956783/5678)/2234567879;
            $idlink = round($idlink);
            

			$table = "scriptmarking";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);

			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "scriptmarkingrprt";
							}
						});
						</script>';
			}
		
		}
	}

	static public function AddExamSettingsCtrl()
	{
	if (isset($_POST["stdteacherid"])) {

				 $item = null;
                 $value = null;
                 $settings = acyearctrl::acyearctrlshow($item,$value); 
                 $settingsk = $settings["dataentryaccess"];
                 $acyear = $settings["year"];
                 $sems = $settings["smster"];
                 $semyear = $settings["uniquee"];
                 	

				$table = "examsettings";
				$data = array('teacherid' =>$_POST["stdteacherid"],
								'moduleid' =>$_POST["stdmoduleid"],
								'sems' =>$sems,
								'acyear' =>$acyear,
								'classid' =>$_POST["stdclassid"]);
				$answer = ExaminationManagemdl::AddExamSettingsMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "examsetting";
							}
						});
						</script>';
				}

		}
	}

	static public function ShowExamsSettingsCtrl($item, $value){
		$table = "examsettings";
		$answer = ExaminationManagemdl::ShowAssignedExamsSetMdl($table, $item, $value);
		return $answer;
	}

static public function ShowExamsSetByTichaCtrl($item, $value){
		$table = "examsettings";
		$answer = ExaminationManagemdl::ShowExamsSetByTichaMdl($table, $item, $value);
		return $answer;
	}



	static public function DelExamSettingsCtrl(){
		if(isset($_GET["stdid"])){
			$idlink = base64_decode(urldecode($_GET["stdid"]));                               
            $idlink =  ($idlink*956783/5678)/2234567879;
            $idlink = round($idlink);
            
			$table = "examsettings";
			$data = $idlink;
			$answer = managedepartmdl::departmentmodaldel($table, $data);

			if ($answer == "ok") {
				echo '<script>
						Swal.fire({
							icon: "success",
							title: "Deleted succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "examsettingrprt";
							}
						});
						</script>';
			}
		
		}
	}

}







class ConsultancCtrl
{
	
	static public function AddNewConsultancRecordCtrl()
	{
	if (isset($_POST["organizationname"])) {

				 $item = null;
                 $value = null;
                 $settings = acyearctrl::acyearctrlshow($item,$value); 
                 $settingsk = $settings["dataentryaccess"];
                 $acyear = $settings["year"];
                 $sems = $settings["smster"];
                 $semyear = $settings["uniquee"];
                 	

				$table = "externalconsultance";
				$data = array('teacherid' =>$_POST["teacherid"],
								'projectdexcription' =>$_POST["projectdexcription"],
								'organizationname' =>$_POST["organizationname"],
								'sems' =>$sems,
								'acyear' =>$acyear);
				$answer = ConsultancMdl::AddNewConsultancRecordMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully Created!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "viewconsultances";
							}
						});
						</script>';
				}

		}
	}

	static public function ShowConsultancRecordCtrl($item, $value){
		$table = "externalconsultance";
		$answer = FinalpresentationMdl::ShowPanelSittingMdl($table, $item, $value);
		return $answer;
	}

	static public function ViewPersonalShowConsultanceCtrl($item, $value){
		$table = "externalconsultance";
		$answer = FinalpresentationMdl::ViewPersonalShowConsultanceMdl($table, $item, $value);
		return $answer;
	}
	
}




