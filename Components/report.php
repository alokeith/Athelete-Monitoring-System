<?php
session_start();
require_once("quarter-reg/php-ext.php");
if (!isset($_SESSION["quarter"])){
    header("location:../set-quarter.php");
    exit();
}
$sql = new queries();
$get = new getMe();

date_default_timezone_set('Asia/Manila');
// Get the current date
$currentDateTime = date('Y-m-d h:i A');

// Display the current date
echo " As of: " . $currentDateTime;
$alert = "";
if (isset($_SESSION["alert"])) {
	$alert = $_SESSION["alert"];
}
$cont = "";
$registeredlist = "";

$quarterid = $_SESSION["quarter"];
$quartername = $_SESSION["quartername"];

	//display list of event WHERE personnel are assigned to this quarter and status of OUTSIDE
	$listin = $sql->listEventByStat($quarterid, "1");
	$listcountin = $listin->num_rows;
	$registeredlistin = "<b class='green-text'>Inside Personnel Registered to this quarter</b><h5>(" . $listcountin . ") Events found</h5>";
	$listsin = "";
	$personsin = "";
	if ($listcountin > 0) {
		$totalperson = 0;
		while ($r = $listin->fetch_assoc()) {
			$eventid = $r["event_id"];
			$eventname = $r["event_name"];
			$eventname = ucwords($eventname);
			$personlist = $sql->getitembyrelatedidreg("personnel", "event_id", $eventid, $quarterid, "1");
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
									      			<b>$personname - $personid</b>
									      		</div>
									      	</div>
									       </li>
										";
				}
			} else {
				$persons = "<li class='collection-item'>No personnel found.</li>";
			}
			$listsin .= "<li><div class='collapsible-header'><b>$eventname</b> ($countpersonlist outside)</div><div class='collapsible-body'><ul class='collection'>$persons</ul></div></li>";
		}
		$registeredlistin .= "$totalperson Personnel found<ul class='collapsible'>$listsin</ul>";
	} else {
		$registeredlistin = "No record!";
	}

	//display list of event WHERE personnel are assigned to this quarter and status of OUTSIDE
	$listout = $sql->listEventByStat($quarterid, "0");
	$listcountout = $listout->num_rows;
	$registeredlistout = "<b class='red-text'>Outside Personnel Registered to this quarter</b><h5>(" . $listcountout . ") Events found</h5>";
	$listsout = "";
	$personsout = "";
	if ($listcountout > 0) {
		$totalperson = 0;
		while ($r = $listout->fetch_assoc()) {
			$eventid = $r["event_id"];
			$eventname = $r["event_name"];
			$eventname = ucwords($eventname);
			$personlist = $sql->getitembyrelatedidreg("personnel", "event_id", $eventid, $quarterid, "0");
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
									      			<b>$personname - $personid</b>
									      		</div>
									      	</div>
									       </li>
										";
				}
			} else {
				$persons = "<li class='collection-item'>No personnel found.</li>";
			}
			$listsout .= "<li><div class='collapsible-header'><b>$eventname</b> ($countpersonlist outside)</div><div class='collapsible-body'><ul class='collection'>$persons</ul></div></li>";
		}
		$registeredlistout .= "$totalperson Personnel found<ul class='collapsible'>$listsout</ul>";
	} else {
		$registeredlistout = "No record!";
	}

	//display list of event WHERE personnel are not assigned to this quarter and status of INSIDE
	$otherlistin = $sql->listEventByStatNotIn($quarterid, "1");
	$otherlistcountin = $otherlistin->num_rows;
	$unregisteredlistin = "<b class='orange-text'>Inside Personnel Not Registered to this quarter</b><h5>(" . $otherlistcountin . ") Events found</h5>";
	$otherlistsin = "";
	$otherpersonsin = "";
	if ($otherlistcountin > 0) {
		$totalperson = 0;
		while ($r = $otherlistin->fetch_assoc()) {
			$eventid = $r["event_id"];
			$eventname = $r["event_name"];
			$eventname = ucwords($eventname);
			$personlist = $sql->getitembyrelatedidnotreg("personnel", "event_id", $eventid, $quarterid, "1");
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
									      			<b>$personname - $personid</b>
									      		</div>
									      	</div>
									       </li>
										";
				}
			} else {
				$persons = "<li class='collection-item'>No personnel found.</li>";
			}
			$otherlistsin .= "<li><div class='collapsible-header'><b>$eventname</b> ($countpersonlist outside)</div><div class='collapsible-body'><ul class='collection'>$persons</ul></div></li>";
		}
		$unregisteredlistin .= "$totalperson Personnel found<ul class='collapsible'>$otherlistsin</ul>";
	} else {
		$unregisteredlistin = "No record!";
	}


/*
	$list = $sql->getList("quarter");
			$listcount = $list->num_rows;
			echo "<h5>" . $listcount . " Quarter/s in records</h5>";
			$lists = "";
			if ($listcount > 0) {
				while ($r = $list->fetch_assoc()) {
					$quarterid = $r["quar_id"];
					$quarterdesc = $r["quar_desc"];
					$lists .= "<li><a href='index.php?quarterselection=$quarterid&quarterselectionname=$quarterdesc'><div class='collapsible-header'><b>$quarterdesc</b></div></a></li>";
				}
				$cont = "<ul class='collapsible'>$lists</ul>";
			} else {
				$cont = "No record!";
			}
*/
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="quarter-reg/css/materialize.min.css">
	<script type="text/javascript" src="quarter-reg/js/jquery.min.js"></script>
	<script type="text/javascript" src="quarter-reg/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="quarter-reg/style.css">
	<title>Report</title>
</head>

<style type="text/css">
	
	body {
		font-family: century gothic;
	}

</style>

<body>
	<h4>Report on <?php echo $quartername." - ".$quarterid; ?></h4>
		<a class="btn btn-waves-effect red" href="../">Return</a>

	<div class="row">
		<div class="col s4">
			<br>
			<h5>Registered Personnel Inside <a href="#printReport" class="btn btn-waves-effect green" onclick="printReport('1')">Print</a></h5>
			<hr>
			<div class="row" id="registered-cont">
				<?php echo $registeredlistin; ?>
			</div>
		</div>
		<div class="col s4">
			<br>
			<h5>Registered Personnel Outside <a href="#printReport" class="btn btn-waves-effect red" onclick="printReport('2')">Print</a></h5>
			<hr>
			<div class="row" id="registered-cont">
				<?php echo $registeredlistout; ?>
			</div>
		</div>
		<div class="col s4">
			<br>
			<h5>Inside Personnel from other Quarter <a href="#printReport" class="btn btn-waves-effect orange" onclick="printReport('3')">Print</a></h5>
			<hr>
			<div class="row" id="registered-cont">
				<?php echo $unregisteredlistin; ?>
			</div>
		</div>
	</div>



</body>

<script type="text/javascript">

	$(document).ready(function() {
		$('.collapsible').collapsible();
	});

function register(id, quarterid) {
	var personid = $("#"+id).val();
	var scanfield = $("#"+id);
	var lists = $("#registered-cont");
    var stat = $('#reg-stat');
    var alert = $('#alert');
    $.ajax({
      type: 'POST',
      url: 'parser.php',
      data: 'register='+personid+'&quarterid='+quarterid,
      dataType: 'JSON',
      beforeSend: function() {
      	alert.html("");
        stat.html("Please wait...");
      },
      error: function(jqXHR, status, err) {
        stat.html("Error!");
      },
      success: function(data) {
        scanfield.val("");
        if (data.result == "success"){
        	stat.html("Registered Successfully!");
        	location.reload();
        }else{
        	stat.html(data.result);
        }
      }
    });
     return false;
  }
  function printReport(reptype) {
		var printWindow = window.open('print-report.php?reptype=' + reptype, 'Print Report', 'height=500,width=900');
		printWindow.document.close();
		printWindow.focus();
	}
</script>

</html>

<?php

if (isset($_SESSION["alert"])) {
	unset($_SESSION["alert"]);
}

?>