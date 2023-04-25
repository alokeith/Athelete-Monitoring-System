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
	public function getListDesc($table, $colOrder, $col, $id){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table WHERE $col = '$id' ORDER BY $colOrder DESC";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
	function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    function valueArray($array){
    	$result = "";
    	$a = 0;
        for ($i=0; $i<count($array); $i++){
            $a = $a+1;
            if ($a == count($array)){
                $result .= "$array[$i]"; 
            }else{
                $result .= "$array[$i],"; 
            }
        }
    	return $result;
    }
    /*
	public function insertQuery(){
		//$values = $this->valueArray($param_value_array);
		$conn = new mysqli("localhost","root","","ams");
		$stmt = $conn->prepare("INSERT INTO reg_personnel (person_id, quar_id) VALUES (?,?)");
        $stmt->bind_param("ii", "123,1");
        $stmt->execute();
        if (!$sql){
        	$result = "error";
        }else{
        	$result = $stmt;
        }
        $stmt->close();
	}
	*/


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
	public function getitembyrelatedidreg($table, $col, $id, $quarterid, $status){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table WHERE $col = '$id' AND person_status = '$status' AND person_id IN (SELECT person_id FROM reg_personnel WHERE quar_id = '$quarterid')";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
	public function getitembyrelatedidnotreg($table, $col, $id, $quarterid, $status){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM $table WHERE $col = '$id' AND person_status = '$status' AND person_id NOT IN (SELECT person_id FROM reg_personnel WHERE quar_id = '$quarterid')";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
	public function listEventByStat($quarterid, $status){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM event WHERE event_id IN (SELECT event_id FROM personnel WHERE person_id IN (SELECT person_id FROM reg_personnel WHERE quar_id = '$quarterid') AND person_status = '$status')";
		$result = $conn->query($sql);
		$conn->close();
		return $result;
	}
	public function listEventByStatNotIn($quarterid, $status){
		$conn = new mysqli("localhost","root","","ams");
		$sql = "SELECT * FROM event WHERE event_id IN (SELECT event_id FROM personnel WHERE person_id NOT IN (SELECT person_id FROM reg_personnel WHERE quar_id = '$quarterid') AND person_status = '$status')";
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