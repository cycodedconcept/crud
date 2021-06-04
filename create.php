<?php
include 'partials/header.php';
require __DIR__.'/Users/users.php';

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => ''
];

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => ""
];

$isvalid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isvalid = validateUser($user, $errors);

    if ($isvalid) {
        
      $user = createUser($_POST);


       if (isset($_FILES['picture'])) {
           uploadImage($_FILES['picture'], $user);
        }

     header("Location: index.php");
    }
}
?>

<?php include '_form.php' ?>
