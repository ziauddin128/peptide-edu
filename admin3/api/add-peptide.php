<?php
require "../config.php";
require "function.php";


$name1 = isset($_POST['name1']) ? $_POST['name1'] : "";
$name2 = isset($_POST['name2']) ? $_POST['name2'] : "";
$category1 = isset($_POST['category1']) ? $_POST['category1'] : "";
$category2 = isset($_POST['category2']) ? $_POST['category2'] : "";
$short_desc1 = isset($_POST['short_desc1']) ? $_POST['short_desc1'] : "";
$short_desc2 = isset($_POST['short_desc2']) ? $_POST['short_desc2'] : "";
$long_desc1 = isset($_POST['long_desc1']) ? $_POST['long_desc1'] : "";
$long_desc2 = isset($_POST['long_desc2']) ? $_POST['long_desc2'] : "";
$appearance1 = isset($_POST['appearance1']) ? $_POST['appearance1'] : "";
$appearance2 = isset($_POST['appearance2']) ? $_POST['appearance2'] : "";
$storage1 = isset($_POST['storage1']) ? $_POST['storage1'] : "";
$storage2 = isset($_POST['storage1']) ? $_POST['storage2'] : "";

$sequence = isset($_POST['sequence']) ? $_POST['sequence'] : "";
$formula = isset($_POST['formula']) ? $_POST['formula'] : "";
$mole_wight = isset($_POST['mole_wight']) ? $_POST['mole_wight'] : "";
$pubchem_id = isset($_POST['pubchem_id']) ? $_POST['pubchem_id'] : "";
$cas_number = isset($_POST['cas_number']) ? $_POST['cas_number'] : "";

$current_batch = isset($_POST['current_batch']) ? $_POST['current_batch'] : "";
$test_date = isset($_POST['test_date']) ? $_POST['test_date'] : "";
$purity = isset($_POST['purity']) ? $_POST['purity'] : "";
$avg_weight = isset($_POST['avg_weight']) ? $_POST['avg_weight'] : "";

$thumbnail = uploadFile($_FILES['thumbnail']);
$coa = uploadFile($_FILES['coa']);

$chemical_structure = isset($_FILES['chemical_structure']) ? uploadFile($_FILES['chemical_structure']) : "";
$endotoxins = isset($_FILES['endotoxins']) ? uploadFile($_FILES['endotoxins']) : "";
$sterility = isset($_FILES['sterility']) ? uploadFile($_FILES['sterility']) : "";

// media multiple upload
$mediaFiles = [];
if (isset($_FILES['media']) && !empty($_FILES['media']['name'][0])) {
    foreach ($_FILES['media']['name'] as $key => $val) {

        if ($_FILES['media']['error'][$key] == 0) {
            $file = [
                'name' => $_FILES['media']['name'][$key],
                'tmp_name' => $_FILES['media']['tmp_name'][$key],
                'error' => $_FILES['media']['error'][$key]
            ];

            $uploaded = uploadFile($file);

            if ($uploaded) {
                $mediaFiles[] = $uploaded;
            }
        }
    }
}

// =====================
// ARRAY DATA
// =====================
$prev_batches = [];
if (!empty($_POST['prev_batch'])) {
    foreach ($_POST['prev_batch'] as $i => $batch) {

        $prev_batches[] = [
            'batch' => $batch,
            'date'  => $_POST['prev_batch_date'][$i] ?? ""
        ];
    }
}
$prev_batch_json = json_encode($prev_batches);
$media_json = json_encode($mediaFiles);

// =====================
// SQL (PREPARED)
// =====================

$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO peptides (
    name1, name2,
    category1, category2,
    short_desc1, short_desc2,
    long_desc1, long_desc2,
    appearance1, appearance2,
    storage1, storage2,
    thumbnail, coa,
    sequence, formula, mole_wight,
    pubchem_id, cas_number,
    chemical_structure,
    current_batch, test_date,
    purity, avg_weight,
    endotoxins, sterility,
    prev_batch,
    media_files,
    created_at
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);


$stmt->bind_param(
    "sssssssssssssssssssssssssssss",
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
    $created_at
);

if ($stmt->execute()) {
    $response = [
        "success" => true,
        "message" => "Peptide added successfully",
    ];
} else {
    $response = [
        "success" => false,
        "message" => "Peptide added failed!",
    ];
}

echo json_encode($response);
