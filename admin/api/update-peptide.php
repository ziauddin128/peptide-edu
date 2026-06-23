<?php
require "../config.php";
require "function.php";

$id = $_POST['id'] ?? '';

if ($id == "") {
    echo json_encode(["success" => false, "message" => "Invalid ID"]);
    exit;
}

// =====================
// BASIC FIELDS
// =====================
$name1 = $_POST['name1'] ?? "";
$name2 = $_POST['name2'] ?? "";
$category1 = $_POST['category1'] ?? "";
$category2 = $_POST['category2'] ?? "";
$short_desc1 = $_POST['short_desc1'] ?? "";
$short_desc2 = $_POST['short_desc2'] ?? "";
$long_desc1 = $_POST['long_desc1'] ?? "";
$long_desc2 = $_POST['long_desc2'] ?? "";
$appearance1 = $_POST['appearance1'] ?? "";
$appearance2 = $_POST['appearance2'] ?? "";
$storage1 = $_POST['storage1'] ?? "";
$storage2 = $_POST['storage2'] ?? "";

$sequence = $_POST['sequence'] ?? "";
$formula = $_POST['formula'] ?? "";
$mole_wight = $_POST['mole_wight'] ?? "";
$pubchem_id = $_POST['pubchem_id'] ?? "";
$cas_number = $_POST['cas_number'] ?? "";

$current_batch = $_POST['current_batch'] ?? "";
$test_date = $_POST['test_date'] ?? "";
$purity = $_POST['purity'] ?? "";
$avg_weight = $_POST['avg_weight'] ?? "";

// =====================
// FILE HANDLING
// =====================

// Thumbnail
$thumbnail = $_POST['old-thumbnail'] ?? "";
if (!empty($_FILES['thumbnail']['name'])) {
    $thumbnail = uploadFile($_FILES['thumbnail']);
}

// CoA
$coa = $_POST['old-coa'] ?? "";
if (!empty($_FILES['coa']['name'])) {
    $coa = uploadFile($_FILES['coa']);
}

// Chemical Structure
$chemical_structure = $_POST['old-chemical_structure'] ?? "";
if (!empty($_FILES['chemical_structure']['name'])) {
    $chemical_structure = uploadFile($_FILES['chemical_structure']);
}

// Endotoxins
$endotoxins = $_POST['old-endotoxins'] ?? "";
if (!empty($_FILES['endotoxins']['name'])) {
    $endotoxins = uploadFile($_FILES['endotoxins']);
}

// Sterility
$sterility = $_POST['old-sterility'] ?? "";
if (!empty($_FILES['sterility']['name'])) {
    $sterility = uploadFile($_FILES['sterility']);
}

// =====================
// MEDIA (OLD + NEW MERGE)
// =====================
$final_media = [];

// keep old
if (!empty($_POST['old_media'])) {
    foreach ($_POST['old_media'] as $file) {
        $final_media[] = $file;
    }
}

// add new
if (isset($_FILES['new_media']) && !empty($_FILES['new_media']['name'][0])) {
    foreach ($_FILES['new_media']['name'] as $key => $val) {

        if ($_FILES['new_media']['error'][$key] == 0) {
            $file = [
                'name' => $_FILES['new_media']['name'][$key],
                'tmp_name' => $_FILES['new_media']['tmp_name'][$key],
                'error' => $_FILES['new_media']['error'][$key]
            ];

            $uploaded = uploadFile($file);

            if ($uploaded) {
                $final_media[] = $uploaded;
            }
        }
    }
}

$media_json = json_encode($final_media);

// =====================
// PREVIOUS BATCH (REPLACE)
// =====================
$prev_batches = [];

if (!empty($_POST['prev_batch'])) {
    foreach ($_POST['prev_batch'] as $i => $batch) {

        if (!empty($batch)) {
            $prev_batches[] = [
                'batch' => $batch,
                'date'  => $_POST['prev_batch_date'][$i] ?? ""
            ];
        }
    }
}

$prev_batch_json = json_encode($prev_batches);

// =====================
// UPDATE QUERY
// =====================
$sql = "UPDATE peptides SET
    name1=?, name2=?,
    category1=?, category2=?,
    short_desc1=?, short_desc2=?,
    long_desc1=?, long_desc2=?,
    appearance1=?, appearance2=?,
    storage1=?, storage2=?,
    thumbnail=?, coa=?,
    sequence=?, formula=?, mole_wight=?,
    pubchem_id=?, cas_number=?,
    chemical_structure=?,
    current_batch=?, test_date=?,
    purity=?, avg_weight=?,
    endotoxins=?, sterility=?,
    prev_batch=?,
    media_files=?
WHERE id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssssssssssssssssssssssssssi",
    $name1,
    $name2,
    $category1,
    $category2,
    $short_desc1,
    $short_desc2,
    $long_desc1,
    $long_desc2,
    $appearance1,
    $appearance2,
    $storage1,
    $storage2,
    $thumbnail,
    $coa,
    $sequence,
    $formula,
    $mole_wight,
    $pubchem_id,
    $cas_number,
    $chemical_structure,
    $current_batch,
    $test_date,
    $purity,
    $avg_weight,
    $endotoxins,
    $sterility,
    $prev_batch_json,
    $media_json,
    $id
);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Peptide updated successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No changes has been made!"
    ]);
}