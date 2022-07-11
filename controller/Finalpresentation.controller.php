

<?php 


class FinalpresentationCtrl
{
	
	static public function PanelSittingCtrl()
	{
	if (isset($_POST["finlteacherid"])) {

				 $item = null;
                 $value = null;
                 $settings = acyearctrl::acyearctrlshow($item,$value); 
                 $settingsk = $settings["dataentryaccess"];
                 $acyear = $settings["year"];
                 $sems = $settings["smster"];
                 $semyear = $settings["uniquee"];
                 	

				$table = "panelsittings";
				$data = array('teacherid' =>$_POST["finlteacherid"],
								'nodays' =>$_POST["noofdays"],
								'sems' =>$sems,
								'acyear' =>$acyear);
				$answer = FinalpresentationMdl::PanelSittingMdl($table,$data);
				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "finalpresentation";
							}
						});
						</script>';
				}
		}
	}

		static public function ShowPanelSittingCtrl($item, $value){
		$table = "panelsittings";
		$answer = FinalpresentationMdl::ShowPanelSittingMdl($table, $item, $value);
		return $answer;
	}

	


static public function StudentsSupervsionCtrl()
	{
	if (isset($_POST["slctstudentid"])) {

				$item = "userid";
                $value = $_SESSION['id'];
                $searchinfo = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);


				$item = null;
                $value = null;
                $settings = acyearctrl::acyearctrlshow($item,$value); 

                $settingsk = $settings["dataentryaccess"];
                $acyear = $settings["year"];
                $sems = $settings["smster"];
                $semyear = $settings["uniquee"];
                 
                $countstudents = count($_POST["slctstudentid"]);
                
                $item = $sems;
                $value = $acyear;
                $ticha = $searchinfo["teacherid"];
                $modules = FinalpresentationCtrl::CheckAllocationSupervsionCtrl($item,$value,$ticha);
                if ($modules == null ) {
                $table = "studentallocation";
				$data = array('teacherid' =>$searchinfo["teacherid"],
							  'nostudentsupervsion' =>$countstudents,
							  'nostudentbooksmark' =>0,
							  'nostudentsipt' =>0,
							  'sems' =>$sems,
							  'acyear' =>$acyear);
				$answer = FinalpresentationMdl::StudentsSupervsionMdl($table,$data);

                } else {
                	$amount  = $modules['nostudentsupervsion']+ $countstudents;

                	$table = "studentallocation";
					$item1 = "nostudentsupervsion";
					$value1 = $amount;
					$item2 = "teacherid";
					$value2 = $searchinfo["teacherid"];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
                }
                
	

					$cnt1 = count($_POST["slctstudentid"]);
					for ($j=0; $j < $cnt1; $j++) {
					$table = "studentslists";
					$item1 = "supervisionstatus";
					$value1 = 1;
					$item2 = "id";
					$value2 = $_POST["slctstudentid"][$j];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

					$table = "studentalloclist";
				    $data = array('teacherid' =>$searchinfo["teacherid"],
							  'studentid' =>$_POST["slctstudentid"][$j],
							  'type' =>'supervison',
							  'sems' =>$sems,
							  'acyear' =>$acyear);
					$answer = FinalpresentationMdl::StudentListMdl($table,$data);
					}

				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "studentsupersion";
							}
						});
						</script>';
				}
		}
	}

		static public function ShowStudentsSupervsionCtrl($item, $value){
		$table = "studentallocation";
		$answer = FinalpresentationMdl::ShowPanelSittingMdl($table, $item, $value);
		return $answer;
	}

	static public function CheckAllocationSupervsionCtrl($item,$value,$ticha){
		$table = "studentallocation";
		$answer = FinalpresentationMdl::CheckAllocationSupervsionMdl($table,$item,$value,$ticha);
		return $answer;
	}



static public function FinalBooksMarkingCtrl()
	{
	if (isset($_POST["brkstudentid"])) {

				$item = "userid";
                $value = $_SESSION['id'];
                $searchinfo = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);


				$item = null;
                $value = null;
                $settings = acyearctrl::acyearctrlshow($item,$value); 

                $settingsk = $settings["dataentryaccess"];
                $acyear = $settings["year"];
                $sems = $settings["smster"];
                $semyear = $settings["uniquee"];
                 
                $countstudents = count($_POST["brkstudentid"]);
                
                $item = $sems;
                $value = $acyear;
                $ticha = $searchinfo["teacherid"];
                $modules = FinalpresentationCtrl::CheckAllocationSupervsionCtrl($item,$value,$ticha);
                
                if ($modules == null ) {
                	$table = "studentallocation";
				$data = array('teacherid' =>$searchinfo["teacherid"],
							  'nostudentsupervsion' =>0,
							  'nostudentbooksmark' =>$countstudents,
							  'nostudentsipt' =>0,
							  'sems' =>$sems,
							  'acyear' =>$acyear);
				$answer = FinalpresentationMdl::StudentsSupervsionMdl($table,$data);
                } else {
                	$amount  = $modules['nostudentbooksmark']+ $countstudents;

                	$table = "studentallocation";
					$item1 = "nostudentbooksmark";
					$value1 = $amount;
					$item2 = "teacherid";
					$value2 = $searchinfo["teacherid"];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
                }
                
			

					$cnt1 = count($_POST["brkstudentid"]);
					for ($j=0; $j < $cnt1; $j++) {
					$table = "studentslists";
					$item1 = "booksmarkstatus";
					$value1 = 1;
					$item2 = "id";
					$value2 = $_POST["brkstudentid"][$j];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

					$table = "studentalloclist";
				    $data = array('teacherid' =>$searchinfo["teacherid"],
							  'studentid' =>$_POST["brkstudentid"][$j],
							  'type' =>'booksmarking',
							  'sems' =>$sems,
							  'acyear' =>$acyear);
					$answer = FinalpresentationMdl::StudentListMdl($table,$data);
					}

				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "booksmarking";
							}
						});
						</script>';
				}
		 }
	}


	


static public function IptBooksMarkingCtrl()
	{
	if (isset($_POST["ipttudentid"])) {

				$item = "userid";
                $value = $_SESSION['id'];
                $searchinfo = SearchInfoCtrl::ShowSearchInfoCtrl($item,$value);


				$item = null;
                $value = null;
                $settings = acyearctrl::acyearctrlshow($item,$value); 

                $settingsk = $settings["dataentryaccess"];
                $acyear = $settings["year"];
                $sems = $settings["smster"];
                $semyear = $settings["uniquee"];
                 
                $countstudents = count($_POST["ipttudentid"]);
                
                $item = $sems;
                $value = $acyear;
                $ticha = $searchinfo["teacherid"];
                $modules = FinalpresentationCtrl::CheckAllocationSupervsionCtrl($item,$value,$ticha);
                
                if ($modules == null ) {
                	$table = "studentallocation";
				$data = array('teacherid' =>$searchinfo["teacherid"],
							  'nostudentsupervsion' =>0,
							  'nostudentbooksmark' =>0,
							  'nostudentsipt' =>$countstudents,
							  'sems' =>$sems,
							  'acyear' =>$acyear);
				$answer = FinalpresentationMdl::StudentsSupervsionMdl($table,$data);
                } else {
                	$amount  = $modules['nostudentsipt']+ $countstudents;

                	$table = "studentallocation";
					$item1 = "nostudentsipt";
					$value1 = $amount;
					$item2 = "teacherid";
					$value2 = $searchinfo["teacherid"];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
                }
                
			

					$cnt1 = count($_POST["ipttudentid"]);
					for ($j=0; $j < $cnt1; $j++) {
					$table = "studentslists";
					$item1 = "iptbooksmarkstatus";
					$value1 = 1;
					$item2 = "id";
					$value2 = $_POST["ipttudentid"][$j];
					$lastLogin = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

					$table = "studentalloclist";
				    $data = array('teacherid' =>$searchinfo["teacherid"],
							  'studentid' =>$_POST["ipttudentid"][$j],
							  'type' =>'iptbooksmarking',
							  'sems' =>$sems,
							  'acyear' =>$acyear);
					$answer = FinalpresentationMdl::StudentListMdl($table,$data);
					}

				if ($answer == 'ok') {
						echo '<script>
						Swal.fire({
							icon: "success",
							title: "Succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"
						}).then(function(result){
							if(result.value){
								window.location = "iptstudent";
							}
						});
						</script>';
				}
		 }
	}
	static public function StudentAllocatedShowCtrl($item,$value){
		$table = "studentalloclist";
		$answer = FinalpresentationMdl::StudentAllocatedShowMdl($table,$item,$value);
		return $answer;
	}

	static public function DepartStudentAllocatedShowCtrl($item,$value){
		$table = "studentalloclist";
		$answer = FinalpresentationMdl::DepartStudentAllocatedShowMdl($table,$item,$value);
		return $answer;
	}

		static public function TeacherExtraHoursCtrl($item,$value){
		$table = "extrahours";
		$answer = FinalpresentationMdl::TeacherExtraHoursMdl($table,$item,$value);
		return $answer;
	}

	static public function PanelAttendFinalCtrl($item,$value){
		$table = "panelsittings";
		$answer = FinalpresentationMdl::TeacherExtraHoursMdl($table,$item,$value);
		return $answer;
	}

	

}