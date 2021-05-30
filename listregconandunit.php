  <?php
include 'login.php';

include 'navbar.php';
include 'head.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registed units with convenror </title>

    </head>
    <body>
        <?php
            $sql = 'CALL DisplayUnit()';
              $select = $con->query($sql);
            if($con->error){
                echo '<script>alert("ERROR '.$con->error.'");
                window.location="Reg_Project.php";
            </script>';
            }
            else{
            echo '<script>alert("Registered Projects");
        </script>';
            }
        ?>
        <table border="2">
            <tr>
                <th>Unitname</th>
                <th>Location</th>
				<th>ConvenorID</th>
				<th>Year</th>
				<th>Semester</th>
			    <th>Teaching period </th>
            </tr>
            <?php while ($r = $select->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $r['Unitname'] ?></td>
					<td><?php echo $r['Location'] ?></td>
					<td><?php echo $r['ConvenorID'] ?></td>
					<td><?php echo $r['Year'] ?></td>
					<td><?php echo $r['Semester'] ?></td>
					<td><?php echo $r['Teachingper'] ?></td>
                 
                    </td>
                </tr>
				
            <?php endwhile; ?>
        </table>
    </body>
     <?php include 'Footer.php'?>
</html>
