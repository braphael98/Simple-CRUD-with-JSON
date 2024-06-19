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
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Visualizar Usuário: <?php echo ($user['name']); ?><b></b></h3>
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nome:</th>
                    <td><?php echo ($user['name']); ?></td>
                </tr>
                <tr>
                    <th>Usuário:</th>
                    <td><?php echo ($user['username']); ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo ($user['email']); ?></td>
                </tr>
                <tr>
                    <th>Telefone:</th>
                    <td><?php echo ($user['phone']); ?></td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td><a target="_blank" href="https://<?php echo ($user['website']); ?>">
                            <?php echo $user['website'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include 'partials/footer.php'; ?>