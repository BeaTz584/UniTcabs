<!DOCTYPE html>
<html>
    <head>
        <title>registed units with students  </title>
    </head>
    <body>
                <?php
        include 'login.php';
        include 'head.php';
        include 'navbar.php';
        
           $sql = 'CALL displaystu()';
            // call the stored procedure
            $select = $con->query($sql);
            if($con->error){
                echo '<script>alert("ERROR '.$con->error.'");
                window.location="home.php";
            </script>';
            }
            else{
            echo '<script>alert("Registered students in study");
        </script>';
            }
        ?>
        <table Border='2'>
            <tr>
                <th>Firstname</th>
                <th>Surname</th>
				<th>RoleID</th>
				<th>Unitoffer</th>
				<th>Semester</th>
			    <th>Unitname</th>
            </tr>
            <?php while ($r = $select->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $r['Firstname'] ?></td>
					<td><?php echo $r['Surname'] ?></td>
					<td><?php echo $r['RoleID'] ?></td>
					<td><?php echo $r['Unitoffer'] ?></td>
					<td><?php echo $r['Semester'] ?></td>
					<td><?php echo $r['Unitname'] ?></td>
                 
                    </td>
                </tr>
				
            <?php endwhile; ?>
        </table>
    </body>
<?php include 'Footer.php'; ?>
</html>    