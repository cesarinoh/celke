<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = 3306;

try {
  $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
} catch (Exception $ex) {
  echo "Conexão não realizada<br>";
  die("Erro");
}
$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
