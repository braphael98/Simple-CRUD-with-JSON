<?php
include 'partials/header.php';
require 'users/users.php';
$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$user = createUser($_POST);

if (isset($_FILES['imagem'])) {
    uploadImage($_FILES['imagem'], $user);
}
header("Location: index.php");
}
 
?>
<?php include "_form.php"; ?>