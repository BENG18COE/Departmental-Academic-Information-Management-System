<?php 
require_once"connection.php";
class ExaminationManagemdl
{
	
	static public function AddScriptMarkingMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid, classid,moduleid,sems,acyear,numberofstudents) VALUES (:teacherid, :classid,  :moduleid, :sems,:acyear,:numberofstudents)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":classid", $data["classid"], PDO::PARAM_STR);
		$stmt -> bindParam(":moduleid", $data["moduleid"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":numberofstudents", $data["numberofstudents"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function AddExamSettingsMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid, classid,moduleid,sems,acyear) VALUES (:teacherid, :classid,  :moduleid, :sems,:acyear)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":classid", $data["classid"], PDO::PARAM_STR);
		$stmt -> bindParam(":moduleid", $data["moduleid"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	

	static public function CheckAssingedCtrLSetMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacherid = $value ");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	$stmt -> close();
	$stmt = null;
	}

	static public function SumOfScriptSetMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT SUM(numberofstudents) AS sumstdnts FROM $table WHERE teacherid = $value ");
	$stmt -> execute();
	return $stmt -> fetch();	
	$stmt -> close();
	$stmt = null;
	}

	
	static public function ShowAssignedExamsSetMdl($table, $item, $value){
	if($item != null){
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
	$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
	$stmt -> execute();
		return $stmt -> fetch();
	}
	else{
	$stmt = Connection::connect()->prepare("SELECT * FROM $table");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	}
	$stmt -> close();
	$stmt = null;

	}

	static public function ShowExamsSetByTichaMdl($table, $item, $value){

	$stmt = Connection::connect()->prepare("SELECT * FROM $table  WHERE teacherid = $value");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	$stmt -> close();
	$stmt = null;
	}
	
}


class ConsultancMdl
{
	
	static public function AddNewConsultancRecordMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid, organizationname,projectdexcription,sems,acyear) VALUES (:teacherid, :organizationname,  :projectdexcription, :sems,:acyear)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":organizationname", $data["organizationname"], PDO::PARAM_STR);
		$stmt -> bindParam(":projectdexcription", $data["projectdexcription"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}







