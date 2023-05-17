<!DOCTYPE html>
<html>
<head>
    <title>Formulário PHP</title>
</head>
<body>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $dataNascimento = $_POST["data_nascimento"];
    $favorito = $_POST["favorito"];

    // Verifica se já existe uma lista de itens
    $itensAnteriores = [];
    if (isset($_POST["itens_anteriores"])) {
        $itensAnteriores = $_POST["itens_anteriores"];
    }

    // Adiciona o novo item à lista de itens
    $novoItem = array($nome, $telefone, $email, $dataNascimento, $favorito);
    $array_push = array($itensAnteriores, $novoItem);
}
?>

<h1>Formulário</h1>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" required><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" required><br><br>

    <label for="favorito">favorito:</label><br>
    <input type="checkbox" name="favorito[]" value="sim"> sim<br>
    <input type="checkbox" name="favorito[]" value="não"> não<br>

    <input type="hidden" name="itens_anteriores" value="<?php echo htmlentities(serialize($itensAnteriores)); ?>">

    <input type="submit" value="Enviar">
</form>

<?php
// Exibe a tabela com os itens anteriores
if (!empty($itensAnteriores)) {
    echo "<h2>Itens anteriores:</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Telefone</th><th>E-mail</th><th>Data de Nascimento</th><th>Pergunta</th></tr>";

    foreach ($itensAnteriores as $item) {
        echo "<tr>";
        echo "<td>" . $item[0] . "</td>";
        echo "<td>" . $item[1] . "</td>";
        echo "<td>" . $item[2] . "</td>";
        echo "<td>" . $item[3] . "</td>";
        echo "<td>" . implode(", ", $item[4]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
