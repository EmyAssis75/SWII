<?php
$servidor = "localhost";
$banco = "banco3AGB";
$usuario = "root";
$senha = "";
try{
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",
    $usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erro de conexão: " . $e->getMessage();
}
?>