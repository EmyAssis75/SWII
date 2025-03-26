<?php
require('conexao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$flag = $_POST['flag'];

$stmt = $pdo->prepare('UPDATE contato
        SET nome = :nome, telefone = :telefone, email = :email,
        flag = :flag
        WHERE id =:id');
$stmt->execute(array(
    ':id' => $id,
    ':nome' => $nome,
    ':telefone' => $telefone,
    ':email' => $email,
    ':flag' => $flag
));
echo '<p>Dados foram alterados com sucesso!</p>';
echo '<button onclick="window.location.href=
            \'formulario.php\'">Voltar</button>';
?>