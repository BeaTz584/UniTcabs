<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'tcabs';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$SQL = 'CALL disunitstudy';
$result = mysqli_query($con,$SQL) or die ("bad Query: $SQL");

echo"<table border= '1'>";
echo "<tr><td>Unitname</td><td>Semester</td><td>Teachingperiod</td></tr>";
while ($row = mysqli_fetch_assoc($result)){
	echo "<tr><td>{$row['Unitname']}</td><td>{$row['Semester']}</td><td>{$row['Teachingper']}</td></tr>";
}
echo"</table>";
$con->close();
?>