<?php
require "../config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `admin` WHERE `email` = ? AND `password` = ?";
$res = $conn->prepare($sql);
$res->bind_param('ss', $email, $password);
$res->execute();
$result = $res->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['USER_ID'] = $row['id'];

    $response = [
        "success" => true,
        "message" => "Logged in successfully"
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Invalid credentials"
    ];
}

echo json_encode($response);
