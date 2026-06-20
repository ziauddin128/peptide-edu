<?php
require "../config.php";
require "function.php";


$id = $_POST['id'];
$question = $_POST['question'];
$answer = $_POST['answer'];

$sql = "UPDATE `faq` SET `question` = ?, `answer` = ? WHERE `id` = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssi", $question, $answer, $id);

if ($stmt->execute()) {
    $response = [
        "success" => true,
        "message" => "Faq updated successfully",
    ];
} else {
    $response = [
        "success" => false,
        "message" => "No changes has been made!",
    ];
}

echo json_encode($response);
