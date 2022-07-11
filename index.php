<?php 
include "controller/template.controller.php";
include "controller/managedepartment.controller.php";
include "controller/manageuseraccount.controller.php";
include "controller/systemsettings.controller.php";
include "controller/workloadactivites.controller.php";
include "controller/examination.controller.php";
include "controller/Finalpresentation.controller.php";
include "controller/payments.controller.php";


include "modal/managedepartment.modal.php";
include "modal/manageuseraccount.modal.php";
include "modal/systemsettings.modal.php";
include "modal/workloadactivites.modal.php";
include "modal/examination.modal.php";
include "modal/Finalpresentation.modal.php";
include "modal/payment.model.php";


$newview = new deftemplate;
$newview ->	template();







