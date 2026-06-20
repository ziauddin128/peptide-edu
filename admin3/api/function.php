<?php
function redirect($url)
{
   echo "<script>window.location.assign('$url')</script>";
   exit();
}

function uploadFile($file, $folder = "storage")
{
   if (!isset($file) || $file['error'] != 0) {
      return null;
   }

   $filename = time() . "_" . basename($file['name']);
   $target = "../$folder/" . $filename;

   if (move_uploaded_file($file['tmp_name'], $target)) {
      return $filename;
   }

   return null;
}
