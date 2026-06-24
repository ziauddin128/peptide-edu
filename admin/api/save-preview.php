<?php
session_start();

$_SESSION['preview'] = $_POST;

/*
|--------------------------------------------------------------------------
| Single File Upload / Copy
|--------------------------------------------------------------------------
*/
function saveTempFile($field, $oldField = null)
{
    // New file uploaded
    if (
        isset($_FILES[$field]) &&
        isset($_FILES[$field]['tmp_name']) &&
        $_FILES[$field]['tmp_name'] != ""
    ) {

        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $ext;

        move_uploaded_file(
            $_FILES[$field]['tmp_name'],
            "../storage/temp/" . $filename
        );

        $_SESSION['preview'][$field] = $filename;
    }

    // Old file (Edit page)
    elseif (
        $oldField &&
        !empty($_POST[$oldField])
    ) {

        $oldFile = $_POST[$oldField];

        if (file_exists("../storage/" . $oldFile)) {

            $ext = pathinfo($oldFile, PATHINFO_EXTENSION);
            $tempName = uniqid() . "." . $ext;

            copy(
                "../storage/" . $oldFile,
                "../storage/temp/" . $tempName
            );

            $_SESSION['preview'][$field] = $tempName;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Single Files
|--------------------------------------------------------------------------
*/

saveTempFile("thumbnail", "old-thumbnail");
saveTempFile("coa", "old-coa");
saveTempFile("chemical_structure", "old-chemical_structure");
saveTempFile("endotoxins", "old-endotoxins");
saveTempFile("sterility", "old-sterility");

/*
|--------------------------------------------------------------------------
| Media Files
|--------------------------------------------------------------------------
*/

$_SESSION['preview']['media_files'] = [];

/*
|-------------------------------
| Existing media (Edit page)
|-------------------------------
*/
if (!empty($_POST['old_media'])) {

    foreach ($_POST['old_media'] as $media) {

        if (
            $media != "" &&
            file_exists("../storage/" . $media)
        ) {

            $ext = pathinfo($media, PATHINFO_EXTENSION);
            $tempName = uniqid() . "." . $ext;

            copy(
                "../storage/" . $media,
                "../storage/temp/" . $tempName
            );

            $_SESSION['preview']['media_files'][] = $tempName;
        }
    }
}

/*
|-------------------------------
| Add page => media[]
|-------------------------------
*/
if (isset($_FILES['media'])) {

    foreach ($_FILES['media']['tmp_name'] as $i => $tmp) {

        if ($tmp == "") {
            continue;
        }

        $ext = pathinfo($_FILES['media']['name'][$i], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $ext;

        move_uploaded_file(
            $tmp,
            "../storage/temp/" . $filename
        );

        $_SESSION['preview']['media_files'][] = $filename;
    }
}

/*
|-------------------------------
| Edit page => new_media[]
|-------------------------------
*/
if (isset($_FILES['new_media'])) {

    foreach ($_FILES['new_media']['tmp_name'] as $i => $tmp) {

        if ($tmp == "") {
            continue;
        }

        $ext = pathinfo($_FILES['new_media']['name'][$i], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $ext;

        move_uploaded_file(
            $tmp,
            "../storage/temp/" . $filename
        );

        $_SESSION['preview']['media_files'][] = $filename;
    }
}

/*
|--------------------------------------------------------------------------
| Previous Batch
|--------------------------------------------------------------------------
*/

$prev = [];

if (!empty($_POST['prev_batch'])) {

    foreach ($_POST['prev_batch'] as $i => $batch) {

        $prev[] = [
            "batch" => $batch,
            "date" => $_POST['prev_batch_date'][$i] ?? ""
        ];
    }
}

$_SESSION['preview']['prev_batch'] = $prev;

/*
|--------------------------------------------------------------------------
| Response
|--------------------------------------------------------------------------
*/

echo json_encode([
    "success" => true
]);