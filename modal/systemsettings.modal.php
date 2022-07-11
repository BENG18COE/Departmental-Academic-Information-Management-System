<?php
require_once"connection.php";


class acyearmodal
{
	
	static public function acyearmodaladd($table,$data)
	{		
	$stmt = Connection::connect()->prepare("INSERT INTO $table(year, smster,yearinit,uniquee) VALUES (:year, :smster, :yearinit,:uniquee)");
		$stmt -> bindParam(":year", $data["year"], PDO::PARAM_STR);
		$stmt -> bindParam(":smster", $data["smster"], PDO::PARAM_STR);
		$stmt -> bindParam(":yearinit", $data["yearinit"], PDO::PARAM_STR);
		$stmt -> bindParam(":uniquee", $data["uniquee"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function  acyearmodalshow($table, $item, $value){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table ");
		$stmt -> execute();
		return $stmt -> fetch();	
		$stmt -> close();
		$stmt = null;

	}
	static public function  sortacyearmodalshow($table, $item, $value){
	if($item != null){
	$stmt = Connection::connect()->prepare("SELECT currentstatus,smster,year  FROM $table ORDER BY currentstatus DESC");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
			return $stmt -> fetch();
		}
		else{
		$stmt = Connection::connect()->prepare("SELECT currentstatus,smster, year FROM $table ORDER BY currentstatus DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		}
		$stmt -> close();
		$stmt = null;

	}
	static public function  filteracyearmodalshow($table, $item, $value){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE uniquee = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}
	static public function  slctacyearmodalshow($table, $item, $value){
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	currentstatus = 1");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;
	}

	static public function acyearmodaledit($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET year = :year,  yearinit  = :yearinit, dataentryaccess  = :dataentryaccess, smster = :smster WHERE id = :id");
		$stmt -> bindParam(":year", $data["year"], PDO::PARAM_STR);
		$stmt -> bindParam(":yearinit", $data["yearinit"], PDO::PARAM_STR);
		$stmt -> bindParam(":smster", $data["smster"], PDO::PARAM_STR);
		$stmt -> bindParam(":dataentryaccess", $data["dataentryaccess"], PDO::PARAM_STR);
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



class SearchInfoMdl
{
	
	static public function CheckInfoMdl($table,$data)
	{		
	$stmt = Connection::connect()->prepare("INSERT INTO $table(userid, classsup,classbrk,classipt,teacherid) VALUES (:userid, :classsup, :classbrk,:classipt,:teacherid)");
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$stmt -> bindParam(":classsup", $data["classsup"], PDO::PARAM_STR);
		$stmt -> bindParam(":classbrk", $data["classbrk"], PDO::PARAM_STR);
		$stmt -> bindParam(":classipt", $data["classipt"], PDO::PARAM_STR);
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}


}