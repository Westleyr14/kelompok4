<?php
include 'config.php';
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

$results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = $_POST['search'];

    $sql = "SELECT * FROM employees WHERE name LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } else {
        $error = "Pegawai dengan nama '$search_term' tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cari Pegawai</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Cari Pegawai</h1>
    </header>
    <div class="container">
        <nav>
            <a href="dashboard.php">Beranda</a>
            <a href="add_employee.php">Tambah</a>
            <a href="view_employee.php">Lihat</a>
            <a href="logout.php">Keluar</a>
        </nav>
        <form action="" method="post">
            <label>Cari :</label>
            <input type="search" name="search" required>
            <input type="submit" value="Cari">
        </form>
        <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if (!empty($results)) { ?>
            <h2>Hasil Pencarian:</h2>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Departemen</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($results as $employee) { ?>
                    <tr>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['position']; ?></td>
                        <td><?php echo $employee['department']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>