<!DOCTYPE html>
<html>
<head>
		<title>Permission List</title>
	</head>
<?php include 'head.php';?>
<body>
<?php 
include 'login.php';
include 'navbar.php';
$ResultSet = $con->query("SELECT Rolename FROM roles");
$ResultSet1 = $con->query("SELECT Rolename FROM roles");
$ResultSet2 = $con->query("SELECT Permname FROM permissions");
$ResultSet3 = $con->query("SELECT Permname FROM permissions");
?>
<div class="container">
<div class="row">
		<div class="col-md-6">
			<h4>Permission List</h4>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Permission ID</th>
						<th>Menu Name</th>
						<th>Menu URL</th>
						<th>Menu Role</th>
					</tr>
				</thead>
				<tbody>
						<?php
						$menulistqry="SELECT * from permissions where pmenustat='Enable'";

						$menulistres=mysqli_query($con,$menulistqry);
						while ($menudata=mysqli_fetch_assoc($menulistres)) {
							$PermID = $menudata['PermID'];
							$menulistqrySQL="SELECT Rolename From roles JOIN (rolespermissions, permissions) ON (rolespermissions.RoleID=roles.RoleID and permissions.PermID=rolespermissions.PermID) WHERE permissions.PermID=$PermID";
							$menulistres2=mysqli_query($con,$menulistqrySQL);
							$menudata2=mysqli_fetch_all($menulistres2);
							$menudata2imp = implode(', ', array_column($menudata2, 0));
						?>
						<tr>
							<td><?php echo $menudata['PermID'];?></td>
							<td><?php echo $menudata['Permname'];?></td>
							<td><?php echo $menudata['pMenuurl'];?></td>
							<td><?php echo $menudata2imp;?></td>
							</tr>
						<?php
						}
						?>
					
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
			<h4>Add Page</h4>
			<hr>
			<form method="post" action="addmenudb.php">
				<div class="form-group">
					<input type="text" name="menu_name" id="menu_name" placeholder="Menu Name" class="form-control" />
				</div>
				<div class="form-group">
					<input type="text" name="menu_Url" id="menu_Url" placeholder="Menu URL" class="form-control" />
				</div>
				<div class="form-group">
				<select name="menu_role" placeholder="Menu role Level" id="Role" required>
				<option selected disabled>Role Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Rolename'] . "'>" . $row['Rolename'] . "</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Add Menu"/>
				</div>
				</form>

			<h4>Add Page Permission</h4>
			<hr>
			<form method="post" action="addmenuperm.php">
				<div class="form-group">
				<select name="Perm_Name" id="Perm_Name" required>
				<option selected disabled>Permission Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet2)){
						echo "<option value='" . $row['Permname'] . "'>" . $row['Permname'] . "</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
				<select name="menu_role_add" id="menu_role_add" required>
				<option selected disabled>Role Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet1)){
						echo "<option value='" . $row['Rolename'] . "'>" . $row['Rolename'] . "</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Add role"/>
				</div>

			</form>

			<h4>Delete Page Permission</h4>
			<hr>
			<form method="post" action="delete_menu.php">
				<div class="form-group">
				<select name="Perm_Name" id="Perm_Name" required>
				<option selected disabled>Permission Name</option>
					<?php
					while ($row = mysqli_fetch_array($ResultSet3)){
						echo "<option value='" . $row['Permname'] . "'>" . $row['Permname'] . "</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<input name="menu_submit" class="btn btn-primary" type="submit" value="Delete"/>
				</div>

			</form>
		</div>
	</div>
</div>
<?php include 'Footer.php';?>
</body>
</html>