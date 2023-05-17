<?php
session_start();

// Verifica se a variável de sessão existe e cria uma se não existir
if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = array();
}

// Adiciona os dados enviados ao array de itens
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $tel = $_POST["telefone"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];
    $perguntas = isset($_POST["pergunta"]) ? $_POST["pergunta"] : array();

    $contatos = array(
        "nome" => $nome,
        "telefone" => $tel,
        "email" => $email,
        "data_nascimento" => $data_nascimento,
        'favorito' => isset($_GET['favorito']) ? true : false,
    );

    $_SESSION['contato'][] = $contato;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contatos</title>
</head>
<body>
    <h1>Lista de Contatos</h1>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="tel" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required><br><br>

        <label>Favoritar:</label>
        <input type="checkbox" name="favorito" value="sim"><br><br>

        <input type="submit" value="Adicionar">
    </form>

    <h2>Contatos Salvos:</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Contato Favorito</th>
        </tr>

        <?php
        // Exibe os itens armazenados na variável de sessão
        foreach ($_SESSION['contato'] as $contato) {
            echo "<tr>";
            echo "<td>" . $contato['nome'] . "</td>";
            echo "<td>" . $contato['telefone'] . "</td>";
            echo "<td>" . $contato['email'] . "</td>";
            echo "<td>" . $contato['data_nascimento'] . "</td>";
            echo "<td>" . $contato['favorito'] ? 'sim' : 'não' . "</td>;
            echo "</tr>";
        }
        ?>

        }
        ?>
    </table>
</body>
</html>
