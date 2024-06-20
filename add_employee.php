<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "INSERT INTO employees (name, position, department, email) VALUES ('$name', '$position', '$department', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("location: view_employee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Tambah Pegawai</h1>
    </header>
    <div class="container">
        <form action="" method="post">
            <label>Nama :</label>
            <input type="text" name="name" required><br><br>
            <label>Posisi :</label>
            <input type="text" name="position"><br><br>
            <label>Departemen :</label>
            <input type="text" name="department"><br><br>
            <label>Email :</label>
            <input type="email" name="email"><br><br>
            <div class="form-actions">
                <input type="submit" value="Tambah" class="button">
                <a href="view_employee.php" class="button back-button">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
