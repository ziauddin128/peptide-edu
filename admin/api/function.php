<?php
function redirect($url)
{
   echo "<script>window.location.assign('$url')</script>";
   exit();
}
