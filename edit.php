<?php include 'login.php';?>
<?php


include "DB.php"; //sing database connection file here

$id = $_GET['id']; // get id through query string

$qry = $con->query( "SELECT * FROM enrolment"); 

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{


    $Puid = $_POST['UserID'];
    $Pu = $_POST['Unitoffer'];
    
    $edit = mysqli_query($con, "UPDATE enrolment SET UserID='$Puid',Unitoffer='$Pu' where TeamID='$id'");

    if($edit == TRUE)
    {
        mysqli_close($con); // Close connection
        header("location:updateteaminfo.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($con);
    }    	
}
?> 



<h3>Update team information</h3>

<form method="POST">
  
 
  <input type="text" name="UserID" value="<?php echo $data['UserID'] ?>" placeholder="Enter USER ID" Required>
  <input type="text" name="Unitoffer" value="<?php echo $data['Unitoffer'] ?>" placeholder="Enter UNITOFFER" Required>
 
  <input type="submit" name="update" value="Update">
</form>