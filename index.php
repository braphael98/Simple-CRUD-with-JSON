<?php
require 'users/users.php';
$users = getUsers();
include 'partials/header.php';
?>
<div class="container mt-5">
    <p>
        <a class = "btn btn-outline-success"href="create.php">Criar novo usuario </a>
    </p>
    <h2 class="mb-4">Lista de Usuários</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nome</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Website</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
    <tr>
        <td>
            <?php if (isset($user['extension'])): ?>
                <?php $img = "users/images/{$user['id']}.{$user['extension']}"; ?>
                <img style="width: 80px;" src="<?php echo $img ?>" alt="User Image">
            <?php else: ?>
                <p>Imagem não disponível</p>
            <?php endif; ?>
        </td>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td>
            <a target="_blank" href="https://<?php echo $user['website']; ?>">
                <?php echo $user['website']; ?>
            </a>
        </td>
        <td>
            <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-info">Vizualizar</a>
            <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-secondary">Atualizar</a>
            <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-danger">Deletar</a>
        </td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'partials/footer.php'; ?>
