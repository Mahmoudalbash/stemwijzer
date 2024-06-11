<?php
session_start();
include 'Stemwijzer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stemwijzer = new Stemwijzer();
    $stmt = $stemwijzer->pdo->prepare("SELECT * FROM gebruikers WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && hash('0000', $password) == $user['0000']) {
        $_SESSION['loggedin'] = true;
        header("Location: manage_questions.php");
    } else {
        $error = "Ongeldige gebruikersnaam of wachtwoord";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        Gebruikersnaam: <input type="text" name="username"><br>
        Wachtwoord: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
