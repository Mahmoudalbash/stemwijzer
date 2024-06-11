<?php
include 'config.php';
include 'Stemwijzer.php';

$stemwijzer = new Stemwijzer();

$id = $_GET['id'];

$stmt = $stemwijzer->pdo->prepare("DELETE FROM politieke_partijen WHERE id=:id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: manage_parties.php");
} else {
    echo "Error: " . $stmt->errorInfo();
}
?>
