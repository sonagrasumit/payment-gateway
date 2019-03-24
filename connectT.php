 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mysql";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo nl2br("\nConnected successfully to the DB.\n");
?> 