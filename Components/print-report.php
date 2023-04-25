<?php

session_start();
if (!isset($_SESSION["quarter"])){
    echo "<script>window.close()</script>";
}
$quarterid = $_SESSION["quarter"];
require_once("quarter-reg/php-ext.php");

$sql = new queries();
$get = new getMe();
date_default_timezone_set('Asia/Manila');
// Get the current date
$currentDateTime = date('Y-m-d h:i A');

// Display the current date
echo " As of: " . $currentDateTime;

if (!isset($_GET["reptype"])){
	echo "<script>window.close()</script>";
}else{
	$title = "";
	$lists = "";
	$registeredlist = "";
	switch ($_GET["reptype"]) {
		case '1': 
			$title = "<h4>Log status (<em>INSIDE</em>) of personnel assigned in this quarter as of datetime above.</h4>";
			$list = $sql->listEventByStat($quarterid, "1");
			$listcount = $list->num_rows;
			break;
		case '2': 
			$title = "<h4>Log status (<em>OUTSIDE</em>) of personnel assigned in this quarter as of datetime above.</h4>";
			$list = $sql->listEventByStat($quarterid, "0");
			$listcount = $list->num_rows;
			break;
		case '3': 
			$title = "<h4>Log status (<em>INSIDE</em>) of personnel NOT ASSIGNED in this quarter as of datetime above.</h4>";
			$list = $sql->listEventByStatNotIn($quarterid, "1");
			$listcount = $list->num_rows;
			break;
		default:
			echo "<script>window.close()</script>";
			break;
	}
	if ($listcount > 0) {
		$totalperson = 0;
		while ($r = $list->fetch_assoc()) {
			$eventid = $r["event_id"];
			$eventname = $r["event_name"];
			$eventname = ucwords($eventname);
			switch ($_GET["reptype"]) {
				case '1':
					$personlist = $sql->getitembyrelatedidreg("personnel", "event_id", $eventid, $quarterid, "1");
					break;
				case '2':
					$personlist = $sql->getitembyrelatedidreg("personnel", "event_id", $eventid, $quarterid, "0");
					break;
				case '3':
					$personlist = $sql->getitembyrelatedidnotreg("personnel", "event_id", $eventid, $quarterid, "1");
					break;
				default:
					echo "<script>window.close()</script>";
					break;
			}
			
			$countpersonlist = $personlist->num_rows;
			$totalperson = $totalperson + $countpersonlist;
			if ($countpersonlist > 0) {
				$persons = "";
				while ($r = $personlist->fetch_assoc()) {
					$personid = $r["person_id"];
					$personname = $r["person_name"];
					$persons .= "
									      <li class='collection-item grey'>
									      	<div class='row'>
									      		<div class='col s3'>
									      			<div class='id-pic-list' style='background-image:url(\"id-printing/pictures/$personid.jpg\");'></div>
									      		</div>
									      		<div class='col s5'>
									      			$personname - $personid
									      		</div>
									      	</div>
									       </li>
										";
				}
			} else {
				$persons = "<li class='collection-item'>No personnel found.</li>";
			}
			$lists .= "<li><div class='collapsible-header'><b>$eventname</b> ($countpersonlist)</div><div class='collapsible-body'><ul class='collection'>$persons</ul></div></li>";
		}
		$registeredlist .= "$totalperson Personnel found<ul class='collapsible'>$lists</ul>";
	} else {
		$registeredlist = "No record!";
	}
}


?>
<style type="text/css">
	body{
		font-family: century gothic;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Print report</title>
</head>
<body>
<h5><?php echo $title; ?> </h5>
	<?php echo $lists; ?>

</body>

<script type="text/javascript">
	window.print();
	window.onafterprint = function() {
		window.close();
	}
	//window.location = "../id-printing/";
</script>

</html>