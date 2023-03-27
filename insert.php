<?php
// establish database connection
$host = "localhost";
$dbname = "webapp";
$username = "admin";
$pass = '123';

try {
    $conn = new PDO(
        'mysql:host=localhost;dbname=webapp;charset=utf8',
        $username,
        $pass
    );
   // echo "Connection succedded<br>";
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Get the card ID from the GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	
    $CNE = $_GET['CNE'];
	if($CNE=="B3 2E 95 04"){
    $stmt = $conn->prepare("INSERT INTO student(CNE,firstName,lastName) VALUES (?,'mohammed said ','boukhyryss')");
    $stmt->execute(array($CNE));
       echo "mohammed said";

        }
     elseif($CNE=="DC 80 61 49"){
    $stmt = $conn->prepare("INSERT INTO student(CNE,firstName,lastName) VALUES (?,'zakaria ','ouazzani')");
    $stmt->execute(array($CNE));
echo "zakaria ouazzani";

        }

    else {
       echo "student not found";}
       
} else {
    // Handle other request methods here
}
