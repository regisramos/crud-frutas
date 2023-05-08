<?php 
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listarp.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listarp.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listarp.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Produtinho</title>
</head>
<body>
    <h1>Deletar Produtinho</h1>
    <p>Tem certeza que deseja deletar a comprinha de 
        <?php echo $appointment['nome']; ?>
        <form method="post">
            <button type="submit">Sim</button>
            <button href="listarp.php">Não</button>
</form></body></html>