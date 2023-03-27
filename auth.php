<?php
session_start();
$mysqli = new mysqli("localhost", "admin", "123", "webapp");
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
$login = $_POST['login'];
$password = $_POST['password'];
$stmt = $mysqli->prepare("SELECT * FROM professors WHERE login = ? AND password = ?");
$stmt->bind_param("ss", $login, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $_SESSION['authenticated'] = true;
    header("Location: presence.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>
