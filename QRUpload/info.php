<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Final Registration</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
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
    <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "userdb";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $db, 3306);
		
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pw = mysqli_real_escape_string($conn, $_POST['password']);
		$pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$dist = mysqli_real_escape_string($conn, $_POST['dist']);
		$state = mysqli_real_escape_string($conn, $_POST['state']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$yob = mysqli_real_escape_string($conn, $_POST['yob']);
		$gen = mysqli_real_escape_string($conn, $_POST['gen']);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$res = null;
		$regquery = "SELECT uid FROM user1 WHERE uid='$uid'";
		$res = mysqli_query($conn, $regquery);
		
		if($res && $res->num_rows != 0)
		{
			echo "<h1 align=\"center\">You are already registered as a voter!</h1>";
		}
		else
		{
			echo "<h3><table align=\"center\" style=\"font-family:Calibri\">";
			echo "<tr><td><strong>UID </strong></td>" . "<td>: " . $uid . "</td></tr>";
			echo "<tr><td><strong>Name </strong></td>" . "<td>: " . $name . "</td></tr>";
			echo "<tr><td><strong>Gender </strong> </td>" . "<td>: " . $gen . "</td></tr>";
			echo "<tr><td><strong>Date of birth </strong></td>" . "<td>: " . $dob . "</td></tr>";
			echo "<tr><td><strong>Year of birth </strong></td>" . "<td>: " . $yob . "</td></tr>";
			echo "<tr><td><strong>District </strong> </td>" . "<td>: " . $dist . "</td></tr>";
			echo "<tr><td><strong>State </strong> </td>" . "<td>: " .  $state . "</td></tr>";
			echo "<tr><td><strong>Pincode </strong> </td>" . "<td>: " . $pincode . "</td></tr>";
			echo "</table></h3>";
			
			$query = "INSERT INTO user1 VALUES ('$uid', '$name', '$gen', '$dob', '$yob', '$dist', '$state', '$pincode', '$pw', NULL)";
			$result = mysqli_query($conn, $query);
			
			if(!$result) echo "<br><h2 align=\"center\" >Error in registering, please again!</h2>";
			else echo "<h1 align=\"center\">You are registered as a voter!</h1>";
			
		}
		mysqli_free_result($res);
		mysqli_close($conn);
	?>

</body>
</html>