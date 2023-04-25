<?php
session_start();
require_once("php-ext.php");
if (!isset($_SESSION["quarter"])){
    header("location:../../set-quarter.php");
    exit();
}
$sql = new queries();
$get = new getMe();


$alert = "";
if (isset($_SESSION["alert"])) {
	$alert = $_SESSION["alert"];
}
$cont = "";
$registeredlist = "";
$title = "";
	$selectedquarter = $_SESSION["quarter"];
	$selectedquartername = $_SESSION["quartername"];
	$checkid = $sql->checkid("quarter", "quar_id", $selectedquarter);
	$quartercount = $checkid->num_rows;
	if ($quartercount < 1){
		$cont .= "<a class='btn btn-waves-effect red' href='index.php'>Back</a>";
		$cont .= "<br><br>";
		$cont .= "Quarter does not exist!";
	}else{
		$title = "<h5>You have selected <b>". $selectedquartername .".</b></h5><br>";
		$cont .= "<br><em class='orange-text'>Please make sure you selected the right quarter to avoid false report generation</em><br>";
		$cont .= "
				<input autofocus type='text' id='reg-id' onchange='register(\"reg-id\",\"$selectedquarter\")'>
					";
		$cont .= "<h5>Scan ID to register to this quarter.</h5>";
		$cont .= "<span id='reg-stat'></span>";
	}

	//display list of registered personnel
	$list = $sql->getListDesc("reg_personnel","regperson_id","quar_id",$selectedquarter);
			$listcount = $list->num_rows;
			$registeredlist = "<h5>(" . $listcount . ") records found</h5>";
			$lists = "";
			if ($listcount > 0) {
				while ($r = $list->fetch_assoc()) {
					$personid = $r["person_id"];
					$quarid = $r["quar_id"];
					$personname = $get->getItemName("person_name","personnel","person_id",$personid);
					$lists .= "<li><div class='collapsible-header'><b>$personname</b></div></li>";
				}
				$registeredlist .= "<ul class='collapsible'>$lists</ul>";
			} else {
				$registeredlist = "No record!";
			}


?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Quarter Registration</title>
</head>

<style type="text/css">
	
	body {
		font-family: century gothic;
	}
	.qr-animate {
		width: 60%;
	}

</style>

<body>

	<div class="row">
		<div id="event-list" class="col s6">
			<br>
			<a class="btn btn-waves-effect red" href="../../index.php">Return</a>
			<a class="btn btn-waves-effect green" href="../report.php">Report</a>
			<hr>
			<?php echo $title; ?>
			<?php
				echo $cont;
			?>
			<span id="alert">
				<?php echo $alert; ?>
			</span>
			<br>
			<br>
			<br>
			<center>
				<img src="qrscan-animate.gif" class="qr-animate">
			</center>
		</div>
		<div id="event-list" class="col s6">
			<br>
			<h5>Registered Personnel</h5>
			<hr>
			<div class="row" id="registered-cont">
				<?php echo $registeredlist; ?>
			</div>
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
</script>

</html>

<?php

if (isset($_SESSION["alert"])) {
	unset($_SESSION["alert"]);
}

?>