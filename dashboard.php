<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

$sql = "SELECT COUNT(*) as total FROM employees";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda SI Kepegawaian</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Kepegawaian</h1>
    </header>
    <div class="container">
        <p>Jumlah Pegawai: <?php echo $data['total']; ?></p>
        <nav>
            <a href="add_employee.php">Tambah</a>
            <a href="view_employee.php">Lihat</a>
            <a href="search_employee.php"> Cari</a>
            <a href="logout.php">Keluar</a>
        </nav>
    </div>
    <footer>
        <p>Kelompok 1 Kelas R63</p>
    </footer>
</body>
</html>
