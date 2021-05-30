<?php include 'login.php';?>
<?php
include 'DB.php';
include 'head.php';
include 'navbar.php';
if(isset($_POST['but_import'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["importfile"]["name"]);
 
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    $uploadOk = 1;
    if($imageFileType != "csv" ) {
      $uploadOk = 0;
    }
 
    if ($uploadOk != 0) {
       if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir.'importfile.csv')) {
 
         // Checking file exists or not
         $target_file = $target_dir . 'importfile.csv';
         $fileexists = 0;
         if (file_exists($target_file)) {
            $fileexists = 1;
         }
         if ($fileexists == 1 ) {
 
            // Reading file
            $file = fopen($target_file,"r");
            $i = 0;
 
            $importData_arr = array();
                        
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
              $num = count($data);
 
              for ($c=0; $c < $num; $c++) {
                 $importData_arr[$i][] = mysqli_real_escape_string($con, $data[$c]);
              }
              $i++;
            }
            fclose($file);
 
            $skip = 0;
            // insert import data
            foreach($importData_arr as $data){
               if($skip != 0){
                  $Password = password_hash($data[0], PASSWORD_BCRYPT);
                  $Firstname = $data[1];
                  $Surname = $data[2];
                  $email = $data[3];
                  $Phonenumber = $data[4];


                  // Checking duplicate entry
                  $sql = "select count(*) as allcount from user where Password='" . $Password . "' and Firstname='" . $Firstname . "' and  Surname='" . $Surname . "' and email='" . $email . "' and  Phonenumber='" . $Phonenumber . "' ";
 
                  $retrieve_data = mysqli_query($con,$sql);
                  $row = mysqli_fetch_array($retrieve_data);
                  $count = $row['allcount'];
 
                  if($count == 0){
                     // Insert record
                     $insert_query = "CALL Regstu('".$Password."','".$Firstname."','".$Surname."','".$email."','".$Phonenumber."')";
                     mysqli_query($con,$insert_query);
                  }
               }
               $skip ++;
            }
            $newtargetfile = $target_file;
            if (file_exists($newtargetfile)) {
               unlink($newtargetfile);
            }
          }
 
       }
    }
 }
 ?>
  
 <!-- Import form (start) -->
 <div class="popup_import">
  <form method="post" action="" enctype="multipart/form-data" id="import_form">
   <table width="100%">
 
    <tr>
     <td colspan="2">
      <input type='file' name="importfile" id="importfile">
     </td>
    </tr>
    <tr>
     <td colspan="2" ><input type="submit" id="but_import" name="but_import" value="Import"></td>
    </tr>
    <tr>
     <td colspan="2" align="center"><span class="format">Pasword, First name, Surname, Email, Phonenumber</span> </td>
    </tr>
    <tr>
     <td colspan="2" align="center"><a href="import_example.csv" target="_blank">Download Sample</a></td>
    </tr>
 
    <tr>
     <td colspan="2"><b>Instruction : </b><br/>
      <ul>
       <li>Enclose text field in quotes (' , " ) if text contains comma (,) is used.</li>
       <li>Enclose text field in single quotes (') if text contains double quotes (")</li>
       <li>Enclose text field in double quotes (") if text contains single quotes (')</li>
      </ul>
     </td>
    </tr>
   </table>
  </form>
 </div>
 <!-- Import form (end) -->
 
 <!-- Displaying imported users -->
 <table border="1" id="userTable">
   <tr>
    <td>S.no</td>
    <td>Username</td>
    <td>password</td>
    <td>First name</td>
    <td>Last name</td>
    <td>Email</td>
    <td>phonenumber</td>
   </tr>
   <?php
     $sql = "select * from user order by userid desc";
     $sno = 1;
     $retrieve_data = mysqli_query($con,$sql);
     while($row = mysqli_fetch_array($retrieve_data)){
         $id = $row['UserID'];
         $username = $row['Username'];
         $password = $row['Password'];
         $fname = $row['Firstname'];
         $lname = $row['Surname'];
         $email = $row['Email'];
         $phonenumber = $row['Phonenumber'];

         echo "<tr>
             <td>".$sno."</td>
             <td>".$username."</td>
             <td>".$password."</td>
             <td>".$fname."</td>
             <td>".$lname."</td>
             <td>".$email."</td>
             <td>".$phonenumber."</td>
         </tr>";
         $sno++;
     }
    ?>
 </table>
 <?php include 'Footer.php';?>
