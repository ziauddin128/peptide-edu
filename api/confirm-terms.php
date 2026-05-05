<?php
session_start();

$terms = $_POST['terms'];

if ($terms == "Yes") {
    $_SESSION['CONFIRM_TERMS'] = "Yes";
}
