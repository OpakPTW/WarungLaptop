<?php
session_start();
include("db_config.php");
?>

<!DOCTYPE html>

<head>
    <title>Warung Laptop</title>
    <link rel="icon" href="../img/1.0/Icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font Awesome Icon Src -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <!-- Navbar Section -->
    <header id="header">
        <a href="#" class="logo">Warung<span>Laptop</span>.</a>
        <section id="navbar">
            <a href="admin_account.php">Account</a>
            <a class="active" href="admin_saran.php">Message</a>
            <a href="admin_product.php">Product</a>
        </section>

        <section id="icons">
            <a href="#" id="lg-search" class="fa-solid fa-magnifying-glass"></a>
            <a href="admin_welcome.php" id="lg-profile" class="fa-solid fa-user"></a>
            <a id="bar" class="fa-solid fa-bars"></a>
        </section>

        <!-- Search Form start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="Search Here...">
            <label for="search-box"><i class="fa-solid fa-magnifying-glass"></i></label>
        </div>
        <!-- Search Form end -->
    </header>
    <div class="login admin">
        <div class="login-header">
            <table border="1">
                <br>
                <h2>Data Message</h2><br>
                <h3>Kotak Saran dan Kritik</h3><br>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Subjek</td>
                    <td>Pesan</td>
                    <td>Aksi</td>
                </tr>

                <?php
            include "db_config.php";
            $no = 1;
            $query = "SELECT * FROM saran";
            $sql = mysqli_query($conn, $query);
            while ($h = mysqli_fetch_array($sql)) {?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $h['nama'] ?></td>
                    <td><?php echo $h['email'] ?></td>
                    <td><?php echo $h['subjek'] ?></td>
                    <td><?php echo $h['pesan'] ?></td>
                    <?php
                    echo "<td> <a href='?hapus=$h[No]' class='button'><i class='fa-solid fa-trash'> </a></td>";
                    ?>
                </tr>
                <?php $no++; 
                if(isset($_GET['hapus'])){
                    $hapus_id = $_GET['hapus'];
                    $hapus_query = "DELETE FROM saran WHERE No = $hapus_id";
                    mysqli_query($conn, $hapus_query);
                    header("Location: admin_product.php"); 
                    //Bagian ini memeriksa apakah ada parameter hapus dalam URL. 
                    //Jika ada, maka dilakukan penghapusan data kotak saran dari tabel saran berdasarkan No yang diberikan. 
                    //Setelah penghapusan, pengguna akan diarahkan kembali ke halaman db_admin.php menggunakan fungsi header().
                }
            }
                ?>
        </div>
    </div>
</body>

</html>
<script src="../js/script.js"></script>