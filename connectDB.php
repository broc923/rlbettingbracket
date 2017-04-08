<?php
$servername = "localhost";
$username = "broc923_rlb";
$password = "HRR_b0[@e(pB";
$dbname = "broc923_db";
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>