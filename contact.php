<?php
include 'connect.php';
// Now this page can talk to the toy box!
?>


<?php
$host = "sqlXXX.epizy.com"; 
$user = "epiz_XXXXXXX";
$pass = "your_password";
$db = "epiz_XXXXXXX_dbname";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
