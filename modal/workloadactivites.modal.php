<?php
require_once"connection.php";
class Modulesmodal
{
	
	static public function Modulesmodaladd($table,$data)
	{		
		$stmt = Connection::connect()->prepare("INSERT INTO $table(code, smster,name,departid,hrstght,classtype) VALUES (:code, :smster,:name, :departid,:hrstght,:classtype)");
		$stmt -> bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt -> bindParam(":smster", $data["smster"], PDO::PARAM_STR);
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrstght", $data["hrstght"], PDO::PARAM_STR);
		$stmt -> bindParam(":classtype", $data["classtype"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}


	static public function  modulesmodalshow($table, $item, $value){
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
	static public function  CheckDepartmentpartimeMdl($table, $item, $value){
	
		
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	teacherid = $value ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;

	}


	static public function  advmodulesmodalshow($table, $item, $value){
		if($item != null){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  departid = '$_SESSION[departid]'");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE departid ='$_SESSION[departid]'");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;

	}

		static public function  DepartModuleAssignedToTichaMdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}

	static public function  ModuleAssignedToTichaMdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacherid = $value ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}

	static public function  filtermodulesmodalshow($table, $item, $value){
		if($item != null){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  teacherid = $value AND  moduleid = $item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacherid =$value AND  moduleid = $item");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;

	}

	static public function  showmodulesmodalshow($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE teacherid = $value ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function  chkmodulesmodalshow($table, $item, $value){
		if($item != null){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  moduleid = $value ");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE moduleid = $value ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;

	}

	static public function  Viewhrsmodalshow($table, $item, $value){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE id = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}
		static public function  Viewmodulesmodalshow($table, $item, $value){
		if($item != null){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  teacherid = $value");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE  teacherid = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;

	}
	static public function  Mdlsmodalshow($table, $item, $value){
		
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE classid = $item AND moduleid = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function Modulesmodaledit($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET code = :code,  smster  = :smster, departid  = :departid, name  = :name hrstght =:hrstght  WHERE id = :id");
		$stmt -> bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt -> bindParam(":smster", $data["smster"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrstght", $data["hrstght"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {	
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}


}


class assignmodulesmodal
{
	
	static public function assignmodulesmodaladd($table,$data)
	{		

		$stmt = Connection::connect()->prepare("INSERT INTO $table(classid, moduleid, departid,teacherid,hrstght,sems,acyear, idunique,min) VALUES (:classid, :moduleid, :departid, :teacherid, :hrstght, :sems, :acyear,:idunique,:min)");
		$stmt -> bindParam(":classid", $data["classid"], PDO::PARAM_STR);
		$stmt -> bindParam(":moduleid", $data["moduleid"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrstght", $data["hrstght"], PDO::PARAM_STR);
		$stmt -> bindParam(":idunique", $data["idunique"], PDO::PARAM_STR);
		$stmt -> bindParam(":min", $data["min"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function moduleshrsmodaladd($table,$data)
	{		

		$stmt = Connection::connect()->prepare("INSERT INTO $table(departid,teacherid,hrstght,sems,acyear,idunique,min) VALUES (:departid, :teacherid, :hrstght,:sems, :acyear, :idunique,:min)");
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrstght", $data["hrstght"], PDO::PARAM_STR);
		$stmt -> bindParam(":sems", $data["sems"], PDO::PARAM_STR);
		$stmt -> bindParam(":acyear", $data["acyear"], PDO::PARAM_STR);
		$stmt -> bindParam(":idunique", $data["idunique"], PDO::PARAM_STR);
		$stmt -> bindParam(":min", $data["min"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
}

?>