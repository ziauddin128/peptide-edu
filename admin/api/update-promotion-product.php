<?php
require "../config.php";
require "function.php";

$productId = $_POST['product-id'];
$title = $_POST['title'];
$description = $_POST['description'];
$deliveryFee = $_POST['delivery-fee'];
$refLink = $_POST['ref-link'];

$image = $_POST['old-image'] ?? "";
if (!empty($_FILES['image']['name'])) {
    $image = uploadFile($_FILES['image']);
}

$sql = "UPDATE `promo-product` SET `title`=?, `description`=?, `deliveryFee`=?, `refLink`=?, `image`=? WHERE `id`=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssissi",
    $title,
    $description,
    $deliveryFee,
    $refLink,
    $image,
    $productId
);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Product updated successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No changes has been made!!"
    ]);
}