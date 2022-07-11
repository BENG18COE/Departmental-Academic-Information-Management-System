
<?php 

class FinalpresentationMdl
{
	
	static public function PanelSittingMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid, nodays,sems,acyear) VALUES (:teacherid, :nodays, :sems,:acyear)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":nodays", $data["nodays"], PDO::PARAM_STR);
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

	

	static public function ShowPanelSittingMdl($table, $item, $value){
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

		static public function ViewPersonalShowConsultanceMdl($table, $item, $value){
	
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacherid = $value");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	$stmt -> close();
	$stmt = null;
	}



		static public function StudentsSupervsionMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid,nostudentsupervsion,sems,acyear,nostudentbooksmark,nostudentsipt) VALUES (:teacherid,:nostudentsupervsion,:sems,:acyear,:nostudentbooksmark,:nostudentsipt)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":nostudentsupervsion", $data["nostudentsupervsion"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":nostudentbooksmark", $data["nostudentbooksmark"], PDO::PARAM_STR);
		$stmt -> bindParam(":nostudentsipt", $data["nostudentsipt"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	

	static public function StudentListMdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(teacherid, type,studentid,sems,acyear) VALUES (:teacherid, :type,:studentid, :sems,:acyear)");
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":type", $data["type"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":studentid", $data["studentid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}


	static public function CheckAllocationSupervsionMdl($table, $item, $value,$ticha){
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE sems = '$item' AND acyear = '$value' AND teacherid = '$ticha' ");
	$stmt -> execute();
	return $stmt -> fetch();	
	$stmt -> close();
	$stmt = null;

	}

		static public function StudentAllocatedShowMdl($table, $item, $value){
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  teacherid = $value AND type = '$item' ");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	$stmt -> close();
	$stmt = null;

	}

	static public function DepartStudentAllocatedShowMdl($table, $item, $value){
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  type = '$item' ");
	$stmt -> execute();
	return $stmt -> fetchAll();	
	$stmt -> close();
	$stmt = null;

	}

		static public function TeacherExtraHoursMdl($table, $item, $value){
	$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  teacherid = $value ");
	$stmt -> execute();
	return $stmt -> fetch();	
	$stmt -> close();
	$stmt = null;

	}


}
