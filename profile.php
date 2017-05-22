<!DOCTYPE html>
<html lang="en">

<?php

function filterTable($query)
{
	$conn = new mysqli("localhost", "root", "evosys", "evosys", 3306);
	$filter_Result=$conn->query($query);
	echo "Connected successfully";
	return $filter_Result;
	
}

if(isset($_POST['search']))
{
   $valueToSearch = isset($_POST['valueToSearch']) ? 'default': $_POST['valueToSearch'];
   $query = "SELECT * FROM `candidate` WHERE CONCAT(`name`,`candidateinfo`) LIKE '%".$valueToSearch."%'";
   $search_result = filterTable($query);
}

else
{
   $query = "SELECT * from profile";
   $search_result=filterTable($query);
}

?>

  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Profiles</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/profilestyle.css" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
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
    </div>
    <?php
$conn = new mysqli("localhost", "root", "evosys", "evosys", 3306);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sqlo = "SELECT `name`, `candidateinfo`, `party`, `election1` FROM candidate WHERE 1";
$result = $conn->query($sqlo);
?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js">
          
        </script>
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
    <form action="http://localhost/evosys/profile.php" method="post">
          <input type="text" name="valueToSearch" placeholder="Value to Search">
          <input type="submit" name="search" value="Filter Search">

        <table>
          <?php while($row=$search_result->fetch_assoc()):?>
             <tr>
               <td><?php echo "Name: " . $row['name'];?><br></td>
                <td><?php echo "Candidate Information: " . $row['info'];?></td>
              </tr>
         <?php endwhile;?>
         </table>
    <div class="container" align="center">
    <p style="font-size:18px"><strong>Here is the list of candidates for the elections</strong></p>
    <table border="2" align="center" style="font-family:Cambria">
	  <thead align="center">
			<tr align="center">
			  <th>Name</th>
              <th>Party</th>
			  <th>Information</th>
			</tr>
	  </thead><tbody>


<?php
if ( mysqli_num_rows( $result )==0 ) {
	echo '<tr><td colspan="4">No Rows Returned</td></tr>';
}
else {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['name']}</td><td>{$row['party']}</td><td>{$row['candidateinfo']}</td><\n";
    }
} 


?>
</tbody>
</table>
</body>
</html>