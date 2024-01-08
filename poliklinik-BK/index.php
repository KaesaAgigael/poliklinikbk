<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Poliklinik</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/71c2ab2c83.css" crossorigin="anonymous">
    <style>
        body {
            display: flex;
        }
        main {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa; /* Light background color for the main content area */
        }
        .sidebar {
            width: 250px;
            background-color: #343a40; /* Bootstrap dark background color */
            padding-top: 20px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            transition: all 0.3s;
            left: -250px; /* Start with the sidebar hidden */
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        h2 {
            color: #000; /* Change the color to make it visible */
        }
        hr {
            border-top: 2px solid #343a40; /* Match the color to the sidebar background */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a class="navbar-brand" href="#"><i class="fas fa-hospital"></i> Poliklinik</a>

    <?php
    if (isset($_SESSION['username'])) {
        // If the user is logged in, display sidebar items for logged-in users
        ?>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="index.php?page=dokter"><i class="fas fa-user-md"></i> Dokter</a>
        <a href="index.php?page=poli"><i class="fas fa-clinic-medical"></i> Poli</a>
        <a href="index.php?page=obat"><i class="fas fa-pills"></i> Obat</a>
        <a href="index.php?page=pasien"><i class="fas fa-user"></i> Pasien</a>
        <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout (<?php echo $_SESSION['fullname'] ?>)</a>
        <?php
    } else {
        // If the user is not logged in, display sidebar items for non-logged-in users
        ?>
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <a href="index.php?page=cekRM"><i class="fas fa-notes-medical"></i> Rawat Jalan</a>
        <a href="index.php?page=loginUser"><i class="fas fa-sign-in-alt"></i> Login</a>
        <?php
    }
    ?>
</div>

<main>
    <button class="btn btn-dark" id="toggleSidebar" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
    <?php
    if (isset($_GET['page'])) {
        include($_GET['page'] . ".php");
    } else {
        echo "<br><h2>Selamat Datang di Sistem Informasi Poliklinik";

        if (isset($_SESSION['username'])) {
            // If logged in, display username
            echo ", " . $_SESSION['fullname'] . "</h2><hr>";
        } else {
            echo "</h2><hr>Silakan Login untuk menggunakan sistem. Jika belum memiliki akun silakan Register terlebih dahulu.";
        }
    }
    ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/71c2ab2c83.js" crossorigin="anonymous"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const main = document.querySelector('main');

        if (sidebar.style.left === '-250px') {
            sidebar.style.left = '0';
            main.style.marginLeft = '250px';
        } else {
            sidebar.style.left = '-250px';
            main.style.marginLeft = '0';
        }
    }
</script>
</body>
</html>
