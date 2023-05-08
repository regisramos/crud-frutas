<?php
    include 'db.php';
    if (!isset($_GET['id'])) {
        header('Location: listarp.php');
        exit;
    }
    $id = $_GET['id'];

    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id =? ');
    $stmt->execute([$id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        header('Location: listarp.php');
        exit;
    }
    $nome = $appointment['nome'];
    $tamanho = $appointment['tamanho'];
    $peso = $appointment['peso'];
    $quantidade = $appointment['quantidade'];
    $preco = $appointment['preco'];
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>
        
        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho" value="<?php echo $tamanho; ?>" required><br>
        
        <label for="peso">Peso:</label>
        <input type="text" name="peso" value="<?php echo $peso; ?>" required><br>
        
        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="<?php echo $quantidade; ?>" required><br>
        
        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?php echo $preco; ?>" required><br>

        <button type="submit">Atualizar</button>
</form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $peso = $_POST['peso'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];


$stmt = $pdo->prepare('UPDATE clientes SET nome = ?, tamanho = ?, peso = ?, quantidade = ?, preco = ? WHERE id =? ');
$stmt->execute([$nome,$tamanho,$peso,$quantidade,$preco, $id]);
header('Location: listarp.php');
exit;
}
?>

        