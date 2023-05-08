<?php 
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Produtinho</h1>
        <?php 
        if (isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $tamanho = $_POST['tamanho'];
            $peso = $_POST['peso'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            
            
                $stmt = $pdo->prepare('INSERT INTO produtos  (nome, tamanho, peso, quantidade, preco)
                VALUES ( :nome, :tamanho, :peso, :quantidade, :preco)');
                $stmt->execute(['nome' => $nome, 'tamanho' => $tamanho, 'peso' => $peso,
                'quantidade' => $quantidade, 'preco' => $preco]);

                if ($stmt->rowCount()){
                    echo '<span>Nice!</span>';
                }else{
                    echo '<span>Erro fi</span>';
                }

            }

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        
?>

<form method="post">

<label for="nome">Nome:</label>
<input type="text" name="nome" required><br>

<label for="tamanho">Tamanho:</label>
<input type="tamanho" name="tamanho" required><br>

<label for="peso">Peso:</label>
<input type="text" name="peso" maxlenght="11" required><br>

<label for="quantidade">Quantidade:</label>
<input type="text" name="quantidade" required><br>

<label for="preco">Preço:</label>
<input type="text" name="preco" required><br><br>

    <div>

    <button type="submit" name="submit" value="enviar">Enviar</button>
    <button><a href="listarp.php">Listar</a></button>
    <button><a href="cliente.php">⇠</a></button>

    </div>

    </form>
</body>
</html>