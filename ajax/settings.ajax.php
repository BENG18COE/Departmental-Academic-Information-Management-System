<?php

include "../controller/systemsettings.controller.php";
include "../modal/systemsettings.modal.php";


class acyearajax
{
	public $setsid;
	public function  acyearajaxedit()
	{
		$item = "id";
		$value = $this->setsid;
		$answer =  acyearctrl::acyearctrlshow($item,$value); 
		echo json_encode($answer);
	}

}


if (isset($_POST["setsid"])) {
	$cate = new acyearajax();
	$cate -> setsid = $_POST["setsid"];
	$cate -> acyearajaxedit();
}
?>