<?php

require_once("php-ext.php");

$sql = new queries();
$get = new getMe();

?>

<!DOCTYPE html>
<html>

<head>


	<script src="qrgen/qrcode.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<title>QR Code Generator</title>
</head>

<body>

	<link rel="stylesheet" type="text/css" href="style.css">

	<?php

	if (isset($_GET["printid"])) {
		if (isset($_GET["eventid"])) {
			$raweventid = $_GET["eventid"];
			///CHECK ID IF EXIST IN DATABASE;
			$checkid = $sql->checkid("event", "event_id", $raweventid);
			$checkconfirm = $checkid->num_rows;
			if ($checkconfirm < 1) {
				$_SESSION["alert"] = "Event does not exist!";
				header("location:../id-printing");
				exit();
			} else {
				$getperson = $sql->getitembyrelatedid("personnel", "event_id", $raweventid);
				$person = "";
				if ($getperson->num_rows > 0) {
					while ($r = $getperson->fetch_assoc()) {
						$personid = $r["person_id"];
						$personname = $r["person_name"];
						$role = $r["role_id"];
						$personcode = "CVRAA$personid";
						$eventname = $get->getItemName("event_name", "event", "event_id", $raweventid);
						$eventcontact = $get->getItemName("event_contact", "event", "event_id", $raweventid);
						if ($eventcontact == "") {
							$eventcontact = "";
						}
						$eventname = ucwords($eventname);
						$personrole = $get->getItemName("role_name", "role", "role_id", $role);
						$personrole = ucfirst($personrole);
						if ($raweventid == 53){
							$person .= "<table>
											<tr>
												<td>$personid</td>
												<td>$personname</td>
												<td><div id='qrcode$personid'></div></td>
											</tr>
										</table>
										<script type='text/javascript'>
											var qrcode$personid = new QRCode(document.getElementById('qrcode$personid'), {
												width:150,
												height:150
											});
											function makeCode() {
												qrcode$personid.makeCode('$personcode');
											}
											makeCode();
										</script>
										";

						}else{
							$person .= "
								<div class='id-content' ID='id-content-$personid'>
									<center>
									<table id='tbl-$personid'>
										<tr>
											<td colspan='2'></td>
										<tr>
										<tr>
											<td colspan='2'>
												<div class='id-pic' style='background-image:url(\"pictures/$personid.jpg\");'>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan='2'><b id='person-name-$personid'>$personname</b></td>
										</tr>
										<tr>
											<td colspan='2'>$eventname</td>
										</tr>
										<tr>
											<td><div id='qrcode$personid'></div></td>
											<td><b>$personrole</b><br><em class='code'>$personcode</em></td>
										</tr>
									</table>
									</center>
								</div>
								<div class='id-content-back' ID='id-content-back-$personid'>
									<table>
										<tr>
											<td>
												<br>
												<b> &nbsp;Coach:</b> $eventcontact
											</td>
										</tr>
									</table>
								</div>
								<script type='text/javascript'>
									var qrcode$personid = new QRCode(document.getElementById('qrcode$personid'), {
										width:60,
										height:60
									});
									function makeCode() {
										qrcode$personid.makeCode('$personcode');
									}
									makeCode();
								</script>
							";	
						}
						
					}
					$persons = "
							$person
					";
				} else {
					$persons = "No personnel in this event.";
				}
			}
		}
		////FOR INDIVIDUAL PRINTING
		if (isset($_GET["personid"])) {
			$rawpersonid = $_GET["personid"];
			///CHECK ID IF EXIST IN DATABASE;
			$checkid = $sql->checkid("personnel", "person_id", $rawpersonid);
			$checkconfirm = $checkid->num_rows;
			if ($checkconfirm < 1) {
				$_SESSION["alert"] = "Person does not exist!";
				header("location:../id-printing");
				exit();
			} else {
				$getperson = $sql->getitembyrelatedid("personnel", "person_id", $rawpersonid);
				$person = "";
				if ($getperson->num_rows > 0) {
					while ($r = $getperson->fetch_assoc()) {
						$personid = $r["person_id"];
						$personname = $r["person_name"];
						$role = $r["role_id"];
						$personcode = "CVRAA$personid";
						$eventid = $get->getItemName("event_id", "personnel", "person_id", $personid);
						$eventname = $get->getItemName("event_name", "event", "event_id", $eventid);
						$eventname = ucwords($eventname);
						$eventcontact = $get->getItemName("event_contact", "event", "event_id", $eventid);
						if ($eventcontact == "") {
							$eventcontact = "";
						}
						$personrole = $get->getItemName("role_name", "role", "role_id", $role);
						$personrole = ucfirst($personrole);
						$person .= "
							<div class='id-content' id='id-content'>
								<center>
								<table id='tbl'>
									<tr>
										<td colspan='2'></td>
									<tr>
									<tr>
										<td colspan='2'>
											<div class='id-pic' style='background-image:url(\"pictures/$personid.jpg\");'>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan='2'><b id='person-name'>$personname</b></td>
									</tr>
									<tr>
										<td colspan='2'>$eventname</td>
									</tr>
									<tr>
										<td><div id='qrcode$personid'></div></td>
										<td><b>$personrole</b><br><em class='code'>$personcode</em></td>
									</tr>
								</table>
								</center>
							</div>
							<div class='id-content-back'>
								<table>
									<tr>
										<td>
											<br>
											<b> &nbsp;Coach:</b> $eventcontact
										</td>
									</tr>
								</table>
							</div>
							<script type='text/javascript'>
								var qrcode$personid = new QRCode(document.getElementById('qrcode$personid'), {
									width:60,
									height:60
								});
								function makeCode() {		
									qrcode$personid.makeCode('$personcode');
								}
								makeCode();
							</script>
						";
					}
					$persons = "
							$person
					";
				} else {
					$persons = "No personnel in this event.";
				}
			}
		}
	}

	?>
	<div id="id-container">
		<?php echo $persons; ?>
	</div>


</body>

<script type="text/javascript">
	window.print();
	window.onafterprint = function() {
		//window.close();
	}
	//window.location = "../id-printing/";
</script>

</html>