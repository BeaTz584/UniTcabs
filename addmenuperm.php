<?php
include 'login.php';
include 'DB.php';

if(isset($_POST['menu_submit']))
{
	$Perm_Name=$_POST['Perm_Name'];
	$menu_role_add=$_POST['menu_role_add'];


	if($Perm_Name!='')
	{
		$insertqry="Call MenuRole('$Perm_Name','$menu_role_add')";
		$insertres=mysqli_query($con,$insertqry);
					if($con->error){
		echo '<script>alert("ERROR '.$con->error.'");
		window.location="addmenu.php";
	</script>';
	}
	else{
	echo '<script>alert("Permission added successfully");
	window.location="addmenu.php";
</script>';
	}
	}
}
?>