<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);
    $employee = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    $sql = "UPDATE employees SET name='$name', position='$position', department='$department', email='$email' WHERE id=$id";
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
    <title>Edit Pegawai</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Pegawai</h1>
    </header>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <label>Nama :</label>
            <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br><br>
            <label>Posisi :</label>
            <input type="text" name="position" value="<?php echo $employee['position']; ?>"><br><br>
            <label>Departemen :</label>
            <input type="text" name="department" value="<?php echo $employee['department']; ?>"><br><br>
            <label>Email :</label>
            <input type="email" name="email" value="<?php echo $employee['email']; ?>"><br><br>
            <div class="form-actions">
                <input type="submit" value="Perbarui" class="button">
                <a href="view_employee.php" class="button back-button">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
