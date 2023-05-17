<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contatos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php
        // Inicializar a lista de contatos
        $contatos = array(
            array(
                'nome' => 'João',
                'telefone' => '123456789',
                'email' => 'joao@example.com',
                'descricao' => 'Amigo de infância',
                'data_nascimento' => '1990-05-01',
                'favorito' => true
            ),
            array(
                'nome' => 'Maria',
                'telefone' => '987654321',
                'email' => 'maria@example.com',
                'descricao' => 'Colega de trabalho',
                'data_nascimento' => '1985-10-15',
                'favorito' => false
            ),
            // Adicione mais contatos aqui
        );
    ?>

    <h2>Lista de Contatos</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Descrição</th>
            <th>Data de Nascimento</th>
            <th>Favorito</th>
        </tr>

        <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?php echo $contato['nome']; ?></td>
            <td><?php echo $contato['telefone']; ?></td>
            <td><?php echo $contato['email']; ?></td>
            <td><?php echo $contato['descricao']; ?></td>
            <td><?php echo $contato['data_nascimento']; ?></td>
            <td><?php echo $contato['favorito'] ? 'Sim' : 'Não'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
