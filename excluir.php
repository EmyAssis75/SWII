<?php
require('conexao.php');
$id = $_GET['id'];

/* $stmt = $pdo->prepare("UPDATE contato SET flag = 0 WHERE id = $id"); */

$stmt = $pdo->prepare("UPDATE contato SET flag = :flag WHERE id = :id");
$stmt->execute(array(
    ':id' => $id,
    ':flag' => 0
));

echo "<p>Dados excluídos com sucesso!</p>";
echo '<button onclick="window.location.href=
\'formulario.php\'">Voltar</button>';


?>