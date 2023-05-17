<!DOCTYPE html>
Camilly e Leticia
<html>
<head>
    <title>Lista de Contatos</title>
</head>
<body>
    <h1>Lista de contatos</h1>

    <?php
    session_start();
    $contatos = isset($_COOKIE['contatos']) ? $_COOKIE['contatos'] : array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $descricao = $_POST['descricao'];
        $data_nascimento = $_POST['data_nascimento'];
        $favorito = isset($_POST['favorito']) ? true : false;

        $novoContato = array(
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'descricao' => $descricao,
            'data_nascimento' => $data_nascimento,
            'favorito' => $favorito
        );

        $contatos[] = $novoContato;
        $_COOKIE['contatos'] = $contatos;
    }
    ?>

    <form method="POST">
        <fieldset>
            <legend>Novo contato</legend>

            <label>Nome:</label>
            <input type="text" name="nome" required><br>

            <label>Telefone:</label>
            <input type="text" name="telefone"><br>

            <label>E-mail:</label>
            <input type="email" name="email"><br>

            <label>Descrição:</label>
            <input type="text" name="descricao"><br>

            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento"><br>

            <label>Favorito:</label>
            <input type="checkbox" name="favorito"><br>

            <input type="submit" value="Salvar">
        </fieldset>
    </form>

    <h2>Contatos Salvos</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Descrição</th>
            <th>Data de Nascimento</th>
            <th>Favorito</th>
        </tr>

    <?php
        foreach ($contatos as $contato) {
            if (is_array($contato)) {
                ?>
                <tr>
                <td><?php echo $contato['nome']; ?></td>
                <td><?php echo $contato['telefone']; ?></td>
                <td><?php echo $contato['email']; ?></td>
                <td><?php echo $contato['descricao']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($contato['data_nascimento'])); ?></td>
                <td><?php echo $contato['favorito'] ? 'Sim' : 'Não'; ?></td>
            </tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>
