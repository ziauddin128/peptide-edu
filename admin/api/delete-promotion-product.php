<?php

require "../config.php";

$pId = $_POST['pId'];

$sql = "DELETE FROM `promo-product` WHERE `id` = '$pId'";
$res = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    $response = [
        "success" => true,
        "message" => "Data deleted successfully!",
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Data deleted failed!",
    ];
}

echo json_encode($response);
