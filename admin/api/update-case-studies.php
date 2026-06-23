<?php
require "../config.php";
require "function.php";

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($title));
$researchDate = $_POST['research-date'] ?? '';
$summary = $_POST['summary'] ?? '';

// Thumbnail
$thumbnail = $_POST['old-thumbnail'] ?? "";
if (!empty($_FILES['thumbnail']['name'])) {
    $thumbnail = uploadFile($_FILES['thumbnail']);
}


// Contents
$titles = $_POST['content_title'] ?? [];
$contents = $_POST['content'] ?? [];
$sections = [];

if (is_array($titles) && is_array($contents)) {

    foreach ($titles as $index => $itemTitle) {

        $itemTitle = trim($itemTitle);
        $itemContent = $contents[$index] ?? '';

        if ($itemTitle === '' && trim(strip_tags($itemContent)) === '') {
            continue;
        }

        $sections['section_' . (count($sections) + 1)] = [
            'title'   => $itemTitle,
            'content' => $itemContent
        ];
    }
}

$contentJson = json_encode($sections, JSON_UNESCAPED_UNICODE);


$sql = "UPDATE `case-studies` SET `thumbnail` = ?, `title` = ?, `slug` = ?, `summary` = ?, `content` = ?, `research-date` = ? WHERE `id` = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssssi",
    $thumbnail,
    $title,
    $slug,
    $summary,
    $contentJson,
    $researchDate,
    $id
);

$stmt->execute();

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Case study updated successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No changes has been made!"
    ]);
}
