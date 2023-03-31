<?php


class queries {
	public $result;
	public function getList($table){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table";
		$result = $conn->query($sql);
		//$stmt = $conn->prepare("SELECT * FROM $table");

		//$stmt->bind_param("iiiiiiiiii", $cri_1, $cri_2, $cri_3, $cri_4, $cri_5, $cri_6, $cri_7, $cri_8, $serviceid, $logid);
/*
		$stmt->execute();
		if (!$stmt){
			$result = "Error";
		}else{
			$result = "Success";
		}
		$stmt->close();
*/
		$conn->close();
		return $result;
	}

	public function checkid($table, $col, $id){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table WHERE $col = '$id' LIMIT 1";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
	public function getitembyrelatedid($table, $col, $id){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table WHERE $col = '$id'";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}

}


class getMe {
	public $result;
	public function getItemName($col, $table, $col1, $id) {
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT $col FROM $table WHERE $col1 = '$id' LIMIT 1";
		$query = $conn->query($sql);
		if ($query->num_rows < 1){
			$result = "Record not found!";
		}else{
			while ($r = $query->fetch_assoc()) {
				$name = $r["$col"];
			}
			$result = $name;
		}
		return $result;
		$conn->close();
	}
}


?>