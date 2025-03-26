<?php
require('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$botao = $_POST['botao'];

switch ($botao) {
    case 'Enviar':
        $stmt = $pdo->prepare('INSERT INTO contato 
        (nome, telefone, email, flag)
        VALUES (:nome, :telefone, :email, :flag)');
        $stmt->execute(array(
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':email' => $email,
            ':flag' => 1
        ));
        echo '<p>Dados inseridos com sucesso!</p>';
        echo '<button onclick="window.location.href=
            \'formulario.php\'">Voltar</button>';
        break;

    case 'Exibir':
        echo '<h1>Dados dos Usuários</h1>';
        $consulta = $pdo->query('SELECT * FROM contato');
        echo '<table border=1>';
        echo '<tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Situação</th>
            </tr>';
        while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $dados['nome'] . '</td>';
            echo '<td>' . $dados['telefone'] . '</td>';
            echo '<td>' . $dados['email'] . '</td>';
            if ($dados['flag'] == 0) {
                echo '<td>Inativo</td>';
            } else {
                echo '<td>Ativo</td>';
            }
            echo '<td><button onclick="window.location.href=\'alterar.php?id=' . $dados['id'] . '\'">ALTERAR</button></td>';
            echo '<td><button onclick="window.location.href=\'excluir.php?id=' . $dados['id'] . '\'">EXCLUIR/ALT</button></td>';
            echo '<td><button onclick="window.location.href=\'excluirdef.php?id=' . $dados['id'] . '\'">EXCLUIR</button></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<button onclick="window.location.href=
            \'formulario.php\'">Voltar</button>';
        break;
}
