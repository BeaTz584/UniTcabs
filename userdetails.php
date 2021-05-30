
<?php

include "login.php";

include "head.php";

include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title>User Details</title>
</head>
<body>

<h2>User Details</h2>

<table border="2">
  <tr>
    <td>User ID</td>
    <td>Username</td>
    <td>Password</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>Phonenumber</td>
    <td>Role</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php

//$records = mysqli_query($con,"Select * FROM user JOIN (userroles, roles) ON (userroles.UserID=user.UserID AND userroles.RoleID=roles.RoleID) WHERE roles.RoleID <> 1"); // fetch data from database
$stmt = $con->prepare("Select * FROM user JOIN (userroles, roles) ON (userroles.UserID=user.UserID AND userroles.RoleID=roles.RoleID) WHERE roles.RoleID<>1");
$stmt->execute();
$result = $stmt->get_result();
while($data = mysqli_fetch_assoc($result))
{
?>
  <tr>
    <td><?php echo $data['UserID']; ?></td>
    <td><?php echo $data['Username']; ?></td>
    <td><?php echo $data['Password']; ?></td>    
    <td><?php echo $data['Firstname']; ?></td>
    <td><?php echo $data['Surname']; ?></td> 
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['Phonenumber']; ?></td>
    <td><?php echo $data['Rolename']; ?></td>    
    <td><a href="edituser.php?UserID=<?php echo $data['UserID']; ?>">Edit</a></td>
    <td><a href="deleteuser.php?UserID=<?php echo $data['UserID']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
<?php include "Footer.php"; ?>
</html>