<?php
require('conexao.php');
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM contato WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

echo "<p>Dados excluidos permanentemente do sistema!</p>";
echo '<button onclick="window.location.href=
\'formulario.php\'">Voltar</button>';
?>