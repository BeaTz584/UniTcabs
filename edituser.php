<?php

include "login.php"; // Using database connection file here

include "navbar.php";

include "head.php";

$id = $_GET['UserID']; // get id through query string

$qry = mysqli_query($con,"Select * FROM user JOIN (userroles, roles) ON (userroles.UserID=user.UserID AND userroles.RoleID=roles.RoleID) where user.UserID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

$ResultSet = $con->query("SELECT Rolename FROM roles WHERE Rolename<>'Super Admin'");

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['Username'];
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $Firstname = $_POST['Firstname'];
    $Surname = $_POST['Surname'];
    $Email = $_POST['Email'];
    $Phonenumber = $_POST['Phonenumber'];
    $Rolename = $_POST['Rolename'];
	
    $edit = mysqli_query($con,"update user JOIN (userroles, roles) ON (userroles.UserID=user.UserID AND userroles.RoleID=roles.RoleID) set Username='$username', Password='$password', Firstname='$Firstname', Surname='$Surname', Email='$Email', Phonenumber='$Phonenumber', Rolename='$Rolename' where user.UserID='$id'");
	
    if($edit)
    {
        mysqli_close($con); // Close connection
        echo '<script>alert("User edited successfully.");
        window.location="userdetails.php";
    </script>';
        exit;
    }
    else
    {
        echo $con->error;
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="Username" value="<?php echo $data['Username'] ?>" placeholder="Enter New Username" Required>
  <input type="text" name="Password" placeholder="Enter New Password" Required>
  <input type="text" name="Firstname" value="<?php echo $data['Firstname'] ?>" placeholder="Enter New Firstname" Required>
  <input type="text" name="Surname" value="<?php echo $data['Surname'] ?>" placeholder="Enter New Surname" Required>
  <input type="text" name="Email" value="<?php echo $data['Email'] ?>" placeholder="Enter New Email" Required>
  <input type="text" name="Phonenumber" value="<?php echo $data['Phonenumber'] ?>" placeholder="Enter New Phonenumber" Required>
  <select name="Rolename" placeholder="Rolename" id="Rolename" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Rolename'] . "'>" . $row['Rolename'] . "</option>";
					}
					?>
					</select>
  <input type="submit" name="update" value="Update">
</form>
<?php include "Footer.php"; ?>