<?php
require "../config.php";
require "function.php";


$question = $_POST['question'];
$answer = $_POST['answer'];

$sql = "INSERT INTO faq (question, answer) VALUES (?,?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $question, $answer);

if ($stmt->execute()) {
    $response = [
        "success" => true,
        "message" => "Faq added successfully",
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Faq added failed!",
    ];
}

echo json_encode($response);
