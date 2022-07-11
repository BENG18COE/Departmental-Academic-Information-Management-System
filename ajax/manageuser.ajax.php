<?php

include "../controller/manageuseraccount.controller.php";
include "../modal/manageuseraccount.modal.php";



class ajaxmanageusers
{
	
	public $tchid;
	public function  ajaxeditteacher()
	{
		$item = "id";
		$value = $this->tchid;
	  	$answer = manageuseraccountsctrl::pendingteacherslistctrlshow($item,$value);  
		echo json_encode($answer);
	}

	public $activateUser;
	public $activateId;	
	public function ajaxActivateUser(){
		$table = "useracounts";
		$item1 = "status";
		$value1 = $this->activateUser;
		$item2 = "id";
		$value2 = $this->activateId;
		$answer = manageuseraccountsmdl::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
		echo json_encode($answer);
	}

}


if (isset($_POST["tchid"])) {
	$cate = new ajaxmanageusers();
	$cate -> tchid = $_POST["tchid"];
	$cate -> ajaxeditteacher();
}


if (isset($_POST["activateUser"])) {

	$activateUser = new ajaxmanageusers();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> ajaxActivateUser();
}


?>