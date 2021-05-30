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
        
           $sql = 'CALL Regsuper()';
            // call the stored procedure
            $select = $con->query($sql);
            if($con->error){
                echo '<script>alert("ERROR '.$con->error.'");
                window.location="home.php";
            </script>';
            }
            else{
            echo '<script>alert("Registered Supervisor");
        </script>';
            }
        ?>
        <table border="2">
            <tr>
                <th>Firstname</th>
                <th>Surname</th>
				<th>Email</th>
            </tr>
            <?php while ($r = $select->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $r['Firstname'] ?></td>
					<td><?php echo $r['Surname'] ?></td>
					<td><?php echo $r['Email'] ?></td>      
                </tr>
                <?php endwhile; ?>
        </table>
        <?php include 'Footer.php'; ?>
    </body>
</html>    