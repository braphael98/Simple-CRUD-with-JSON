<?php
include 'partials/header.php';
require "users/users.php";

if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];
$user = getUsersById($userId);
if (!$user) {
    include 'partials/not_found.php';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualiza o usuário e obtém os dados atualizados do usuário
    $user = updateUser($_POST, $userId);

    // Verifica se um arquivo foi enviado com a chave 'imagem'
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        uploadImage($_FILES['imagem'], $user['id']);
    }

    // Redireciona para index.php
    header("Location: index.php");
    exit();
}


?>


        <?php include '_form.php'; ?>
           

<?php include 'partials/footer.php'; ?>