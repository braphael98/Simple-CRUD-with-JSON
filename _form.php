<?php
?>
<div class="container mt-5">
    <div class="card">
        <div class=card-header>
            <?php if($user['id']): ?>
            <h3>Atualizar Usuario <b><?php echo $user['name'] ?></b></h3>
            <?php else: ?>
                <h3>Criar novo usuario</h3>
            <?php endif ?>
        </div>
        <div class="card-body">

            <form method='POST' enctype="multipart/form-data" action ">
 <div class = " form-group">
                <label>Nome</label>
                <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Usuario</label>
            <input name="username" value="<?php echo $user['username'] ?>" class="form-control">

            <div class="form-group">
                <label>Email</label>
                <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Website</label>
                <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label >
                <input name="imagem" type="file" class="form-control-file" required>
            </div>
            <button class="btn btn-sucess">Enviar</button>
            </form>
        </div>
    </div>
</div>