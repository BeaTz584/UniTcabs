<?php
$year = $_GET['Year'];
$sem = $_GET['Semester'];
$ResultSet11 = $con->query("SELECT Unitoffer FROM unitsoffering WHERE year = $year AND Semester = $sem");
?>
				