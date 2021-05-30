<?php

include "login.php";

include "navbar.php";

include "head.php";

include "Footer.php";

$UserID = $_GET['UserID']; // get id through query string

$del = mysqli_query($con,"delete from user where UserID = '$UserID'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    echo '<script>alert("User is Deleted successfully.");
    window.location="userdetails.php";
</script>';
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>