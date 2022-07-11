
<?php

class ManagePaymentsMdl
{
	

	static public function AddPaymentratesMdl($table,$data)
	{
		$stmt = Connection::connect()->prepare("INSERT INTO $table(extrhrs, prthours,stdsuprvise,fnlprese,iptmark,examseting,scriptmaking,finalyearmark) VALUES (:extrhrs, :prthours, :stdsuprvise, :fnlprese,:iptmark,:examseting,:scriptmaking,:finalyearmark)");
		$stmt -> bindParam(":extrhrs", $data["extrhrs"], PDO::PARAM_STR);
		$stmt -> bindParam(":prthours", $data["prthours"], PDO::PARAM_STR);
		$stmt -> bindParam(":stdsuprvise", $data["stdsuprvise"], PDO::PARAM_STR);
		$stmt -> bindParam(":fnlprese", $data["fnlprese"], PDO::PARAM_STR);
		$stmt -> bindParam(":iptmark", $data["iptmark"], PDO::PARAM_STR);
		$stmt -> bindParam(":examseting", $data["examseting"], PDO::PARAM_STR);
		$stmt -> bindParam(":scriptmaking", $data["scriptmaking"], PDO::PARAM_STR);
		$stmt -> bindParam(":finalyearmark", $data["finalyearmark"], PDO::PARAM_STR);
		if ($stmt->execute()) {			
			return 'ok';	
		} else {		
			return 'error'.var_dump($stmt->errorInfo());
		}	
		$stmt -> close();
		$stmt = null;
	}


	static public function UpdatePaymentRatesMdl($table,$data){
	$stmt = Connection::connect()->prepare("UPDATE $table SET extrhrs = :extrhrs,  prthours  = :prthours, stdsuprvise = :stdsuprvise,fnlprese = :fnlprese, iptmark = :iptmark, examseting = :examseting, scriptmaking = :scriptmaking,
	finalyearmark = :finalyearmark  WHERE id = :id");
		$stmt -> bindParam(":extrhrs", $data["extrhrs"], PDO::PARAM_STR);
		$stmt -> bindParam(":prthours", $data["prthours"], PDO::PARAM_STR);
		$stmt -> bindParam(":stdsuprvise", $data["stdsuprvise"], PDO::PARAM_STR);
		$stmt -> bindParam(":fnlprese", $data["fnlprese"], PDO::PARAM_STR);
		$stmt -> bindParam(":iptmark", $data["iptmark"], PDO::PARAM_STR);
		$stmt -> bindParam(":examseting", $data["examseting"], PDO::PARAM_STR);
		$stmt -> bindParam(":scriptmaking", $data["scriptmaking"], PDO::PARAM_STR);
		$stmt -> bindParam(":finalyearmark", $data["finalyearmark"], PDO::PARAM_STR);
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
