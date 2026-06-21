<?php
require "../config.php";
require "function.php";

header('Content-Type: application/json');


// =========================
// MAIN DATA
// =========================
$main_title = $_POST['title'] ?? '';
$slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($main_title));

$thumbnail = uploadFile($_FILES['thumbnail'] ?? null);
$researchDate = $_POST['research-date'] ?? '';
$summary = $_POST['summary'] ?? '';


// =========================
// CONTENT TITLE ARRAY
// =========================
$dynamic_titles = $_POST['content-title'] ?? [];


// =========================
// BUILD CONTENT JSON
// =========================
$content = [];

/* -------- static section -------- */
$section_1 = $_POST['section_1'] ?? '';

$content['section_1'] = [
    "title"   => $main_title,
    "content" => $section_1
];


/* -------- dynamic sections -------- */
$i = 0;

foreach ($_POST as $key => $value) {

    if (strpos($key, 'section_') === 0 && $key != 'section_1') {

        $title = $dynamic_titles[$i] ?? '';

        if (trim($title) == '') {
            $title = 'Untitled Section';
        }

        $content[$key] = [
            "title"   => $title,
            "content" => $value
        ];

        $i++;
    }
}


// convert to json
$content_json = json_encode($content, JSON_UNESCAPED_UNICODE);


// =========================
// INSERT QUERY
// =========================
$sql = "INSERT INTO `case-studies`
(`title`, `slug`, `thumbnail`, `research-date`, `summary`, `content`)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssss",
    $main_title,
    $slug,
    $thumbnail,
    $researchDate,
    $summary,
    $content_json
);


// =========================
// RESPONSE
// =========================
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