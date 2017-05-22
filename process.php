<html>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<body>
	<div class="container-fluid" id="wrap">
	 <nav class="navbar navbar-default">
	    <div class="container">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
	        <a class="navbar-brand" href="http://localhost/evosys/index.html">EVoSys</a></div>
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="defaultNavbar1">
<ul class="nav navbar-nav navbar-right">
          <li><a href="http://localhost/evosys/about.html">About</a></li>
	          <li><a href="http://localhost/evosys/register.html">Register</a></li>
	          <li><a href="http://localhost/evosys/login.php">Login</a></li>
	          <li><a href="http://localhost/evosys/profile.php">Candidate Profiles</a></li>
	          <li><a href="http://localhost/evosys/statistics.php">Statistics</a></li>
	        </ul>
          </div>
	      <!-- /.navbar-collapse -->
        </div>
	    <!-- /.container-fluid -->
</nav>
<div align="center" class="container">
	<p style="font-size:16px"><strong>
<?php
session_start(); 
$p = "v";
  $users = $_SESSION['userz'];
      if (isset($_POST['submit'])) {
       $sel= $_POST['party'];

}

$servername = "localhost";
$username = "root";
$password = "";
$db = "userdb";
// connection creation
$conn = new mysqli($servername, $username, $password, $db, 3306);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "UPDATE user1 SET vote='$p' WHERE uid='$users'";
$sql1 = "UPDATE profile SET votecount=votecount+1 WHERE party='$sel'";
if($conn->query($sql) === TRUE) {
    echo "Thank you for Voting!";
} else {
    echo "Error updating record: " . $conn->error;
}
if($conn->query($sql1) === TRUE) {
    echo '';
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
</strong></p></div>
</body>
</html>