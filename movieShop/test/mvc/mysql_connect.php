<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbName = "movie-shop";

// Create connection
$dbc = new mysqli($servername, $username, $password,$dbName);
// Check connection
if ($dbc->connect_error) {
  die("Connection failed: " . $dbc->connect_error);
}
?>