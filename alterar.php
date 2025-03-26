<?php
require('conexao.php');
$id = $_GET['id'];

$consulta = $pdo->query("SELECT * FROM contato WHERE id = '$id'");
$row = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Alteração</title>
</head>

<body>
    <form method="POST" action="gravar.php">
        <div>
            <label>ID:</label>
            <input type="text" value="<?php echo $row['id']; ?>" name="id" readonly />
        </div>
        <div>
            <label>Nome:</label>
            <input type="text" value="<?php echo $row['nome']; ?>" name="nome" />
        </div>
        <div>
            <label>Telefone:</label>
            <input type="text" value="<?php echo $row['telefone']; ?>" name="telefone" />
        </div>
        <div>
            <label>E-mail:</label>
            <input type="text" value="<?php echo $row['email']; ?>" name="email" />
        </div>
        <div>
            <label for="flag">Situação:</label>

            <select name="flag" id="flag">
                <?php 
                if($row['flag'] == 0){
                    echo '<option value="1">Ativo</option>
                            <option value="0" selected>Inativo</option>';
                }
                else {
                    echo '<option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>';
                }
                ?>
            </select>
        </div>
        <input type="submit" value="Alterar" />
    </form>
</body>

</html>