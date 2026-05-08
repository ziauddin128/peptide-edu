<?php
require "../config.php";
require "function.php";

header('Content-Type: application/json');

$id = $_POST['id'] ?? '';

if ($id == "") {
    echo json_encode(["success" => false, "message" => "Invalid ID"]);
    exit;
}

$sds = [
    "section_1" => $_POST['section_1'] ?? "",
    "section_2" => $_POST['section_2'] ?? "",
    "section_3" => $_POST['section_3'] ?? "",
    "section_4" => $_POST['section_4'] ?? "",
    "section_5" => $_POST['section_5'] ?? "",
    "section_6" => $_POST['section_6'] ?? "",
    "section_7" => $_POST['section_7'] ?? "",
    "section_8" => $_POST['section_8'] ?? "",
    "section_9" => $_POST['section_9'] ?? "",
    "section_10" => $_POST['section_10'] ?? "",
    "section_11" => $_POST['section_11'] ?? "",
    "section_12" => $_POST['section_12'] ?? "",
    "section_16" => $_POST['section_16'] ?? ""
];

$sds_json = json_encode($sds, JSON_UNESCAPED_UNICODE);

$pdf = $_POST['old-pdf'] ?? "";
if (!empty($_FILES['pdf']['name'])) {
    $pdf = uploadFile($_FILES['pdf']);
}

// check exists
$check = $conn->prepare("SELECT id FROM sds WHERE peptide_id = ?");
$check->bind_param("i", $id);
$check->execute();
$result = $check->get_result();

$exists = $result->num_rows > 0;

if (!$exists) {

    $stmt = $conn->prepare("INSERT INTO sds (peptide_id, sds_data, pdf) VALUES (?, ?, ?)");
    $stmt->bind_param("is", $id, $sds_json, $pdf);

    $action = "insert";
} else {

    $stmt = $conn->prepare("UPDATE sds SET sds_data = ?, pdf=? WHERE peptide_id = ?");
    $stmt->bind_param("ssi", $sds_json, $pdf, $id);

    $action = "update";
}

$success = $stmt->execute();

if ($success) {
    echo json_encode([
        "success" => true,
        "message" => $action == "insert"
            ? "SDS inserted successfully"
            : "SDS updated successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Database operation failed"
    ]);
}
