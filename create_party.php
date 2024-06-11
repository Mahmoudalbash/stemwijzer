<?php
include 'config.php';
include 'Stemwijzer.php';

$stemwijzer = new Stemwijzer();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $standpunten = $_POST['standpunten'];

    $stmt = $stemwijzer->pdo->prepare("INSERT INTO politieke_partijen (naam, standpunten) VALUES (:naam, :standpunten)");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':standpunten', $standpunten);

    if ($stmt->execute()) {
        header("Location: manage_parties.php");
    } else {
        echo "Error: " . $stmt->errorInfo();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe Partij Toevoegen</title>
</head>
<body>
    <h1>Nieuwe Partij Toevoegen</h1>
    <form method="post" action="">
        Naam: <input type="text" name="naam"><br>
        Standpunten (gescheiden door komma's): <input type="text" name="standpunten"><br>
        <input type="submit" value="Toevoegen">
    </form>
    <a href="manage_parties.php">Terug</a>
</body>
</html>

