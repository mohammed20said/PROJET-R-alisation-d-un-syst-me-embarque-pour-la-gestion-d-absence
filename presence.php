
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	
    <div >
  <img style="float:right" src="uae.png" alt="Your image">
  </div>
       <div>
       <img style="float:left"  src="fstt.jpg" alt="Picture 2">
       </div>
       <div style="display:flex; justify-content:center  " >
       <p style="margin-top : 40px ; font-size: 2em;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: underline;
  color: #333;" >Fiche De Presence</p>
        
       </div>



<?php
// Establish a connection to the database

session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {

    header("Location: login.php");

    exit();

}

$host = "localhost";
$username = "admin";
$password = "123";
$dbname = "webapp";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute a query to retrieve the data from the database
$sql = "SELECT CNE , firstName, lastName, presence_time  FROM student";
$result = mysqli_query($conn, $sql);
// Display the data in a table format
echo "<table>";
echo "<tr><th>Code Student </th><th>firstName</th><th>lastName</th><th> prence Time </th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["CNE"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td>  <td>" . $row["presence_time"] . "</td></tr>";
}
echo "</table>";
// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
<style>
table {
   
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: auto;
  font-family: Arial, sans-serif;
  font-size: 14px;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}
</style>

