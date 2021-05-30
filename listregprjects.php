<!DOCTYPE html>
<html>
    <head>
        <title>registed units with convenror </title>
    </head>
    <body>
        <?php
        include 'login.php';
        include 'head.php';
        include 'navbar.php';
        
           $sql = 'CALL Regprojects()';
            // call the stored procedure
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
                <th>ProjectID</th>
                <th>Projectname</th>
            </tr>
            <?php while ($r = $select->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $r['ProjectID'] ?></td>
					<td><?php echo $r['Projectname'] ?></td>          
                    </td>
                </tr>
                <?php endwhile; ?>
        </table>
        <?php include 'Footer.php'; ?>
    </body>
</html>    