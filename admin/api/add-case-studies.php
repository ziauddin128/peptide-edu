<?php
require "../config.php";
require "function.php";


$title = $_POST['title'];

$slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($title)); 

$thumbnail = uploadFile($_FILES['thumbnail']);
$researchDate = $_POST['research-date'];
$summary = $_POST['summary'];

$sql = "INSERT INTO `case-studies` (`title`, `slug`, `thumbnail`, `research-date`, `summary`) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssss",
    $title,
    $slug,
    $thumbnail,
    $researchDate,
    $summary,
);

if ($stmt->execute()) {
    $response = [
        "success" => true,
        "message" => "Case study added successfully",
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Case study added failed!",
    ];
}

echo json_encode($response);
