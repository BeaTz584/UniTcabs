<?php
include 'login.php';
include 'DB.php';

if(isset($_POST['menu_submit']))
{
	$menu_name=$_POST['menu_name'];
	$menu_URL=$_POST['menu_Url'];
	$menu_Role=$_POST['menu_role'];


	if($menu_name!='')
	{
		$insertqry="Call Menulist('$menu_name', '$menu_URL', '$menu_Role')";
		$insertres=mysqli_query($con,$insertqry);
			if($con->error){
		echo '<script>alert("ERROR '.$con->error.'");
		window.location="addmenu.php";
	</script>';
	}
	else{
	echo '<script>alert("Page added successfully");
	window.location="addmenu.php";
</script>';
	}
	}
}
?>