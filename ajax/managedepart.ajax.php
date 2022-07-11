<?php



include "../controller/manageuseraccount.controller.php";
include "../controller/managedepartment.controller.php";
include "../modal/managedepartment.modal.php";
include "../modal/manageuseraccount.modal.php";


class ajaxmanagedepart
{
	
	public $brid;
	public function  ajaxeditdepartment()
	{
		$item = "id";
		$value = $this->brid;
		$answer = managedepartsctrl::departmentctrlshow($item,$value); 
		echo json_encode($answer);
	}

	public $tchid;
	public function  ajaxeditteacher()
	{
		$item = "id";
		$value = $this->tchid;
	  	$answer = managedepartsctrl::allteacherslistctrlshow($item,$value);  
		echo json_encode($answer);
	}

	public $mdlid;
	public function  ajaxeditmodule()
	{
		$item = "id";
		$value = $this->mdlid;
	  	$answer = managedepartsctrl::allmoduleslistctrlshow($item,$value);  
		echo json_encode($answer);
	}

	public $coaresid;
	public function  ajaxeditcoarse()
	{
		$item = "id";
		$value = $this->coaresid;
	  	$answer = managedepartsctrl::allcoarseslistctrlshow($item,$value);  
		echo json_encode($answer);
	}

	public $classid;
	public function  ajaxeditclass()
	{
		$item = "id";
		$value = $this->classid;
	  	$answer = managedepartsctrl::allclasslistctrlshow($item,$value);  
		echo json_encode($answer);
	}

	public $stdid;
	public function  ajaxeditstudent()
	{
		$item = "id";
		$value = $this->stdid;
	  	$answer = managedepartsctrl::allstudentsctrlshow($item,$value);  
		echo json_encode($answer);
	}


}





if (isset($_POST["mdlid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> mdlid = $_POST["mdlid"];
	$cate -> ajaxeditmodule();
}
if (isset($_POST["brid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> brid = $_POST["brid"];
	$cate -> ajaxeditdepartment();
}

if (isset($_POST["tchid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> tchid = $_POST["tchid"];
	$cate -> ajaxeditteacher();
}

if (isset($_POST["coaresid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> coaresid = $_POST["coaresid"];
	$cate -> ajaxeditcoarse();
}

if (isset($_POST["classid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> classid = $_POST["classid"];
	$cate -> ajaxeditclass();
}

if (isset($_POST["stdid"])) {
	$cate = new ajaxmanagedepart();
	$cate -> stdid = $_POST["stdid"];
	$cate -> ajaxeditstudent();
}





?>