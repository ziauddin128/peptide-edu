<?php
require "../config.php";
require "function.php";

$productId = $_POST['product-id'];
$title = $_POST['title'];
$description = $_POST['description'];
$deliveryFee = $_POST['delivery-fee'];
$refLink = $_POST['ref-link'];
$image = uploadFile($_FILES['image'] ?? null);
 
$sql = "INSERT INTO `promo-product`
(`productId`, `title`, `description`, `deliveryFee`, `refLink`, `image`)
VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ississ",
    $productId,
    $title,
    $description,
    $deliveryFee,
    $refLink,
    $image
);
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Case study added successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Case study insert failed"
    ]);
}