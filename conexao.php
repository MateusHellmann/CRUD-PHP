<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testecrud";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Não foi possível conectar. " . $e->getMessage());
}
?>