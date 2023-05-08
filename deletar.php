<?php 
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Deletar Cadastro</title>
</head>
<body>
    <h1>Deletar Cadastro</h1>
    <p>Tem certeza que deseja deletar o cadrastro de 
        <?php echo $appointment['nome']; ?>
        em <?php echo date('d/m/y' , strtotime($appointment['data'])); ?>
        <form method="post">
            <button type="submit">Sim</button>
            <button href="listar.php">Não</button>
</form></body></html>