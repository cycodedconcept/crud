<?php
include 'partials/header.php';
require __DIR__.'/Users/users.php';

if (!isset($_GET['id'])){
   include "partials/not_found.php";
   exit;
}

$userid = $_GET['id'];

$user = getUserById($userid);
if(!$user){
   include "partials/not_found.php";
   exit;
}

$errors = [
   'name' => "",
   'username' => "",
   'email' => "",
   'phone' => "",
   'website' => ""
];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   $user = array_merge($user, $_POST);
   $isvalid = validateUser($user, $errors);
     
   if ($isvalid) {
      $user = updateUser($_POST, $userid);
      uploadImage($_FILES['picture'], $user);
      header("Location: index.php");
   }
}

?>

<?php include '_form.php' ?>
      