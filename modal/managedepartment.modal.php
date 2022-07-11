<?php
require_once"connection.php";

class managedepartmdl
{
	



static public function updateclassvisibltymdl($table,$data)
	{
	$stmt = Connection::connect()->prepare("INSERT INTO $table(foreigndepartid, classid,  departid,userid) VALUES (:foreigndepartid, :classid,  :departid, :userid)");
		$stmt -> bindParam(":foreigndepartid", $data["foreigndepartid"], PDO::PARAM_STR);
		$stmt -> bindParam(":classid", $data["classid"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}
	static public function adddepartmentmdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(name, initial,  hod) VALUES (:name, :initial,  :hod)");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":initial", $data["initial"], PDO::PARAM_STR);
		$stmt -> bindParam(":hod", $data["hod"], PDO::PARAM_STR);
	
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function departmentmdlshow($table, $item, $value){
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

	static public function filterclassvisbilitymdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE classid = $value AND foreigndepartid  = $item ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	


	static public function filterteacherlistmdlshow($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE departid = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function departfilterteacherlistmdlshow($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	status = 'partime' ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function filterteacherpartimelistmdlshow($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE departid = $value AND status = 'partime' ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function filterteacherfulltimelistmdlshow($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE departid = $value AND status = 'fulltime' ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function studentsctrlinclassmdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	classid = $value AND supervisionstatus = 0 ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	static public function studentsctrlinclass2mdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	classid = $value AND iptbooksmarkstatus = 0 ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	

		static public function studentsctrlinclass1mdl($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE 	classid = $value AND booksmarkstatus = 0 ");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}



	static public function filterteacherlistmdlshowtwo($table, $item, $value){
	
		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE foreigndepartid = $value");
		$stmt -> execute();
		return $stmt -> fetchAll();	
		$stmt -> close();
		$stmt = null;

	}

	

	static public function editdepartmentmdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name,  initial  = :initial, hod = :hod WHERE id = :id");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":initial", $data["initial"], PDO::PARAM_STR);
		$stmt -> bindParam(":hod", $data["hod"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {	
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}

	static public function departmentmodaldel($table, $data){
		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");
		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);
		if($stmt -> execute()){
		return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}

	
	static public function addmutlpleteachermdl($table,$data)
	{   

		$stmt = Connection::connect()->prepare("INSERT INTO $table(first,secon,third,title,departid,userid,signuptoken,role,status) VALUES (:first,:secon,:third,:title,:departid,:userid,:signuptoken,:role,:status)");
		$stmt -> bindParam(":first", $data["first"], PDO::PARAM_STR);
		$stmt -> bindParam(":secon", $data["secon"], PDO::PARAM_STR);
		$stmt -> bindParam(":third", $data["third"], PDO::PARAM_STR);
		$stmt -> bindParam(":title", $data["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$stmt -> bindParam(":signuptoken", $data["signuptoken"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $data["status"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	

	static public function editmutlpleteachermdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET first = :first,  secon  = :secon, third = :third, title = :title,
		departid = :departid, userid = :userid, role = :role, status = :status  WHERE id = :id");
		$stmt -> bindParam(":first", $data["first"], PDO::PARAM_STR);
		$stmt -> bindParam(":secon", $data["secon"], PDO::PARAM_STR);
		$stmt -> bindParam(":third", $data["third"], PDO::PARAM_STR);
		$stmt -> bindParam(":title", $data["title"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":userid", $data["userid"], PDO::PARAM_STR);
		$stmt -> bindParam(":role", $data["role"], PDO::PARAM_STR);
		$stmt -> bindParam(":status", $data["status"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {	
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}



static public function addmodulesmdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(name, departid, code,hrs,min) VALUES (:name, :departid, :code,:hrs,:min)");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrs", $data["hrs"], PDO::PARAM_STR);
		$stmt -> bindParam(":min", $data["min"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	static public function addstudentsmdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(classid, fullname, departid,phone,regno) VALUES (:classid, :fullname, :departid,:phone,:regno)");
		$stmt -> bindParam(":classid", $data["classid"], PDO::PARAM_STR);
		$stmt -> bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $data["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":regno", $data["regno"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}



static public function editmodulesmdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name,  hrs  = :hrs, min = :min, code = :code WHERE id = :id");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":hrs", $data["hrs"], PDO::PARAM_STR);
		$stmt -> bindParam(":min", $data["min"], PDO::PARAM_STR);
		$stmt -> bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {	
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}
	




static public function addcoarsemdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(name, departid, intial) VALUES (:name, :departid, :intial)");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		$stmt -> bindParam(":intial", $data["intial"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	





static public function editcoarsemdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name,  intial  = :intial  WHERE id = :id");
		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":intial", $data["intial"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_STR);
		if ($stmt->execute()) {
			return 'ok';
		} else {	
			return 'error';
		}
		$stmt -> close();
		$stmt = null;
	}

	static public function clasesmodaladd($table,$data)
	{		
		$stmt = Connection::connect()->prepare("INSERT INTO $table(classtype, totalsdnts,yearof, coarse, stream, departid) VALUES (:classtype, :totalsdnts,:yearof, :coarse, :stream, :departid)");
		$stmt -> bindParam(":classtype", $data["classtype"], PDO::PARAM_STR);
		$stmt -> bindParam(":totalsdnts", $data["totalsdnts"], PDO::PARAM_STR);
		$stmt -> bindParam(":yearof", $data["yearof"], PDO::PARAM_STR);
		$stmt -> bindParam(":coarse", $data["coarse"], PDO::PARAM_STR);
		$stmt -> bindParam(":stream", $data["stream"], PDO::PARAM_STR);
		$stmt -> bindParam(":departid", $data["departid"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}

	



static public function editstudentsmdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET fullname = :fullname,  phone  = :phone, regno  = :regno  WHERE id = :id");
		$stmt -> bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $data["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":regno", $data["regno"], PDO::PARAM_STR);
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

?>