<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Daftar Pegawai</h1>
    </header>
    <div class="container">
        <nav>
            <a href="dashboard.php">Beranda</a>
            <a href="add_employee.php">Tambah</a>
            <a href="search_employee.php">Cari</a>
            <a href="logout.php">Keluar</a>
        </nav>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Departmen</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['position']."</td>
                        <td>".$row['department']."</td>
                        <td>".$row['email']."</td>
                        <td><a href='edit_employee.php?id=".$row['id']."'>Edit</a></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Belum ada data pegawai.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html
