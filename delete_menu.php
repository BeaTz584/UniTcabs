<?php

include "login.php";

include "navbar.php";

include "head.php";

include "Footer.php";

$permID = $_POST['Perm_Name']; // get id through query string

$del = mysqli_query($con,"delete from permissions where Permname = '$permID'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    echo '<script>alert("Page Permission is Deleted successfully.");
    window.location="addmenu.php";
</script>'; // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>