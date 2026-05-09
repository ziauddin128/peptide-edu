<?php
require "../config.php";
require "function.php";

$id = $_POST['id'] ?? '';

if ($id == "") {
    echo json_encode(["success" => false, "message" => "Invalid ID"]);
    exit;
}

if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE `admin` SET `email` =?, `password` = ? WHERE `id` = ?");
    $stmt->bind_param("ssi", $email, $password, $id);
} else if (isset($_POST['email']) && $_POST['email'] != "") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE `admin` SET `email` =? WHERE `id` = ?");
    $stmt->bind_param("si", $email, $id);
} else {
    // Only Password
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE `admin` SET `password` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $password, $id);
}

$success = $stmt->execute();

if ($success) {
    echo json_encode([
        "success" => true,
        "message" => "Profile updated successfully",
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No change has been made!"
    ]);
}
