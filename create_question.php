<?php
include 'config.php';
include 'Stemwijzer.php';

$stemwijzer = new Stemwijzer();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vraag = $_POST['vraag'];

    $stmt = $stemwijzer->pdo->prepare("INSERT INTO vragen (vraag) VALUES (:vraag)");
    $stmt->bindParam(':vraag', $vraag);

    if ($stmt->execute()) {
        header("Location: manage_questions.php");
    } else {
        echo "Error: " . $stmt->errorInfo();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe Vraag Toevoegen</title>
</head>
<body>
    <h1>Nieuwe Vraag Toevoegen</h1>
    <form method="post" action="">
        Vraag: <input type="text" name="vraag"><br>
        <input type="submit" value="Toevoegen">
    </form>
    <a href="manage_questions.php">Terug</a>
</body>
</html>

