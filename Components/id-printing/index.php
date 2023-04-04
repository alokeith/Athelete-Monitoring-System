<?php

require_once("php-ext.php");

$sql = new queries();

$alert = "";
if (isset($_SESSION["alert"])) {
	$alert = $_SESSION["alert"];
}


?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<script src="qrgen/qrcode.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>QR Code Generator</title>
</head>

<body>

	<div class="row">
		<div id="event-list" class="col s6">
			<br>
			<a class="btn btn-waves-effect red" href="../../index.php">Return</a>
			<?php echo $alert; ?>
			<?php
			$list = $sql->getList("event");
			$listcount = $list->num_rows;
			echo "<h5>" . $listcount . " Events in records</h5>";
			$lists = "";
			if ($listcount > 0) {
				while ($r = $list->fetch_assoc()) {
					$eventid = $r["event_id"];
					$eventname = $r["event_name"];
					$eventname = ucwords($eventname);
					$personlist = $sql->getitembyrelatedid("personnel", "event_id", $eventid);
					$countpersonlist = $personlist->num_rows;
					if ($countpersonlist > 0) {
						$persons = "";
						while ($r = $personlist->fetch_assoc()) {
							$personid = $r["person_id"];
							$personname = $r["person_name"];
							$persons .= "
									      <li class='collection-item'>
									      	<div class='row'>
												
									      		<div class='col s4'>
									      			<a class='btn btn-waves-effect grey'  onclick='printidin(\"1\",\"$personid\")' title='Print ID for $personname'>Print ID</a>
									      		</div>
									      		<div class='col s3'>
									      			<div class='id-pic-list' style='background-image:url(\"pictures/$personid.jpg\");'></div>
									      		</div>
									      		<div class='col s5'>
									      			<b>$personname - $personid</b>
									      		</div>
									      	</div>
									       </li>
										";
						}
					} else {
						$persons = "<li class='collection-item'>No personnel found.</li>";
					}
					$lists .= "<li><div class='collapsible-header'><a class='btn btn-waves-effect green' onclick='printid(\"1\",\"$eventid\")' title='Print ID for $eventname'>Print ID</a> <b>$eventname</b> - ($countpersonlist personnel)</div>
					<div class='collapsible-body'>
						<div class='row'>
							<div class='col s12'>
								    <ul class='collection'>
								      $persons
								    </ul>
							</div>
						</div>
					</div></li>";
				}
				echo "<ul class='collapsible'>$lists</ul>";
			} else {
				echo "No record!";
			}
			?>
		</div>
	</div>



</body>

<script type="text/javascript">
	function printid(printid, eventid) {
		var printWindow = window.open('print-id.php?printid=' + printid + '&eventid=' + eventid, 'Print ID', 'height=500,width=900');
		printWindow.document.close();
		printWindow.focus();
	}

	function printidin(printid, personid) {
		var printWindow = window.open('print-id.php?printid=' + printid + '&personid=' + personid, 'Print ID', 'height=500,width=900');
		printWindow.document.close();
		printWindow.focus();
	}
	$(document).ready(function() {
		$('.collapsible').collapsible();
	});
</script>

</html>

<?php

if (isset($_SESSION["alert"])) {
	//unset($_SESSION["alert"]);
}

?>