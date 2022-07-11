<?php

require_once"connection.php";

class manageuseraccountsmdl
{
	
	static public function finduserverifymdl($table, $item, $value){
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
	





	static public function addnewuseraccountwomdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(username, emailaddress,password,photo,role,departid,fullname) VALUES (:username, :emailaddress, :password, :photo,:role,:departid,:fullname)");
		$stmt -> bindParam(":username", $data["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":emailaddress", $data["emailaddress"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":photo", $data["photo"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function addnewuseraccountmdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(username, emailaddress,password,photo,role,departid,teacherid,status) VALUES (:username, :emailaddress, :password, :photo,:role,:departid,:teacherid,:status)");
		$stmt -> bindParam(":username", $data["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":emailaddress", $data["emailaddress"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":photo", $data["photo"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":teacherid", $data["teacherid"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $data["status"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlUpdateUser($table, $item1, $value1, $item2, $value2){
		$stmt = Connection::connect()->prepare("UPDATE $table set $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);
		if ($stmt->execute()) {	
			return 'ok';
		} else {
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}

		static public function showuseraccountmdl($table, $item, $value){
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
}


?>