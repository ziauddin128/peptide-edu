<?php

require "../config.php";

$id = $_POST['id'];

$sql = "DELETE FROM `peptides` WHERE `id` = '$id'";
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
