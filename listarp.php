<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
    <title>produtos</title>
</head>
<body>
<div class="container">
    <h1>produtos</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM produtos');
    $produtos = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($produtos)==0) {
        echo '<p>Nenhum produtinho :(</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr>
    <th>Nome
    </th>
    <th>tamanho
    </th>
    <th>peso
    </th>
    <th>quantidade
    </th>
    <th>preco
    </th>
    <th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($produtos as $produto) {
        echo '<tr>';
        echo '<td>' . $produto['nome'] . '</td>';
        echo '<td>' . $produto['tamanho'] . '</td>';
        echo '<td>' . $produto['peso'] . '</td>';
        echo '<td>' . $produto['quantidade'] . '</td>';
        echo '<td>' . $produto['preco'] . '</td>';
        
        echo '<td><a style="color:black;" href="atualizarp.php?id=' .
        $produto['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletarp.php?id=' .
        $produto['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    </div>

</body>
</html>