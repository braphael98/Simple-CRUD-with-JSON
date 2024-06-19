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
    // Cria o usuário com os dados do formulário
    $user = createUser($_POST);

    // Verifica se há uma imagem enviada
    if (isset($_FILES['imagem'])) {
        uploadImage($_FILES['imagem'], $user['id']);
    }

    // Redireciona para a página principal após a criação do usuário
    header("Location: index.php");
    exit();
}
?>

<?php include "_form.php"; ?>

<?php include 'partials/footer.php'; ?>
