<?php

function getUsers()
{
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    return $users;
}
function getUsersById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers(); // Obtém todos os usuários existentes
    $newUser = [
        'id' => rand(1000000, 2000000),
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'website' => $data['website'],
    ];
    $users[] = $newUser; // Adiciona o novo usuário ao array de usuários
    putJson($users); // Salva os usuários atualizados no arquivo JSON
    return $newUser; // Retorna o novo usuário criado
}


function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $updateUser =
                $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
   putJson($users);
    return $updateUser;
}
function deleteUser($id)
{
}
function uploadImage($file, $userId)
{
    // Diretório de destino
    $uploadDir = 'users/images/';

    // Verifica se o diretório de destino existe e cria se não existir
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Obtém a extensão do arquivo
    $fileName = $file['name'];
    $dotPosition = strrpos($fileName, '.');
    $extension = strtolower(substr($fileName, $dotPosition + 1));

    // Verifica se a extensão é permitida (adicionar outras extensões conforme necessário)
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extension, $allowedExtensions)) {
        die('Extensão de arquivo não permitida.');
    }

    // Gera o caminho completo do arquivo
    $uploadFile = $uploadDir . $userId . '.' . $extension;

    // Move o arquivo enviado para o diretório de destino
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        echo 'Arquivo carregado com sucesso.';

        // Atualiza a informação do usuário com a extensão do arquivo
        $users = getUsers(); // Obtém todos os usuários
        foreach ($users as &$user) {
            if ($user['id'] === $userId) {
                $user['extension'] = $extension; // Atualiza a extensão da imagem do usuário
                break;
            }
        }
        putJson($users); // Salva os usuários atualizados no arquivo JSON
    } else {
        echo 'Erro ao mover o arquivo.';
    }
}


function putJson($users){
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}
