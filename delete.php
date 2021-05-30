
<?php include 'login.php';?>
<?php


include "DB.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string
echo $id;
$del = mysqli_query($con,"DELETE FROM enrolment where TeamID = $id"); // delete query

if($del == TRUE)
{
    $con->mysqli_close; // Close connection
    header("location:updateteaminfo.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
} 
?>

