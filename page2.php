<?php
include('config.php'); // Menghubungkan dengan file config.php

$sql = "SELECT * FROM team_members"; // Mengambil semua data dari tabel team_members
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemweb Kel 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-fade-in">
    <header>
        <div class="container">
            <h1>Pemweb Kel 11</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Halaman Utama</a></li>
                    <li><a href="page2.php">Tentang Kami</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="about-us">
            <h2>Biodata Kami</h2>

            <?php
            // Memastikan ada data yang ditemukan
            if ($result->num_rows > 0) {
                // Menampilkan data setiap baris
                while($row = $result->fetch_assoc()) {
                    echo '<div class="team-member">';
                    echo '<img src="assets/person'.$row['id'].'.jpg" alt="Foto '.$row['name'].'">';
                    echo '<h3>'.$row['name'].'</h3>';
                    echo '<p><strong>Umur:</strong> '.$row['age'].' tahun</p>';
                    echo '<p><strong>Alamat:</strong> '.$row['address'].'</p>';
                    echo '<p><strong>No. Telepon:</strong> '.$row['phone'].'</p>';
                    echo '<a href="mailto:'.$row['email'].'" class="contact-button">Hubungi Saya</a>';
                    echo '</div>';
                }
            } else {
                echo "Tidak ada data anggota tim.";
            }
            ?>

        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Pemweb Kel 11</p>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close(); // Menutup koneksi
?>
