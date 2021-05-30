	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">TCABS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
      </li>
      <?php 

$UID = $_SESSION['id'];

$nav=mysqli_query($con,"SELECT roles.RoleID FROM roles JOIN (userroles, user) ON (userroles.RoleID=roles.RoleID AND user.UserID=userroles.UserID) WHERE user.UserID = $UID;");
while($data=mysqli_fetch_assoc($nav))
  {
   if(in_array(1, $data)){
    include 'admin.php';
    include 'settings.php'; 
  }
  if(in_array(2, $data)){
    include 'admin.php';
  }
  if(in_array(3, $data)){
    include 'convenor.php';
  }
  if(in_array(4, $data)){
  }
  if(in_array(5, $data)){
  }
  }
      ?>
            <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
      </li>
    </ul>
</div>	
</nav>	