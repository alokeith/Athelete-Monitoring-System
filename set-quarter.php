<?php
session_start();

require_once("Components/quarter-reg/php-ext.php");

$sql = new queries();
$get = new getMe();


if (isset($_SESSION["quarter"])){
	header("location:../AMS/");
	exit();
}else{
			$list = $sql->getList("quarter");
			$listcount = $list->num_rows;
			$countinfo = "<h5>" . $listcount . " Quarter/s in records</h5>";
			$lists = "";
			if ($listcount > 0) {
				while ($r = $list->fetch_assoc()) {
					$quarterid = $r["quar_id"];
					$quarterdesc = $r["quar_desc"];
					$lists .= "<li><a href='set-quarter.php?quarter=$quarterid&quartername=$quarterdesc'><div class='collapsible-header'><b>$quarterdesc</b></div></a></li>";
				}
				$cont = "<ul class='collapsible'>$lists</ul>";
			} else {
				$cont = "No record!";
			}
}

if (isset($_GET["quarter"])){
	$_SESSION["quarter"] = $_GET["quarter"];
	$_SESSION["quartername"] = $_GET["quartername"];
	header("location:index.php");
	exit();
}



?>


<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="Components/quarter-reg/css/materialize.min.css">
	<script type="text/javascript" src="Components/quarter-reg/js/jquery.min.js"></script>
	<script type="text/javascript" src="Components/quarter-reg/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Components/quarter-reg/style.css">
	<title>Report</title>
</head>

<style type="text/css">
	
	body {
		font-family: century gothic;
	}

</style>

<body>

	<div class="row">
		<h4>Please select a quarter before you proceed.</h4>
		<div id="event-list" class="col s6">
			<hr>
			<?php echo $countinfo; ?>
			<?php
				echo $cont;
			?>
			<span id="alert">
			</span>
		</div>
	</div>



</body>
</html>
