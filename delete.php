<?php
include 'partials/header.php';
require __DIR__.'/Users/users.php';


if (!isset($_POST['id'])){
   include "partials/not_found.php";
   exit;
}

$userid = $_POST['id'];
deleteUser($userid);

header("Location: index.php");