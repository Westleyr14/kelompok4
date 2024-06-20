<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login_user'] = $username;
        header("location: dashboard.php");
    } else {
        $error = "Username atau Password Salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Masuk</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Halaman Login</h1>
    </header>
    <div class="container">
        <form action="" method="post">
            <label>Username :</label>
            <input type="text" name="username" required><br><br>
            <label>Password :</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Masuk">
        </form>
        <?php if (isset($error)) { echo "<p style='color:red; text-align: center;'>$error</p>"; } ?>
    </div>
</body>
</html>
