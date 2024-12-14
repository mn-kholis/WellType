<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
<style>
        body {
            background-color: white;
            margin-top: 50px;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .navbar {
            position: fixed;
            padding: 0px;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            height: 50px;
        }
        .navbar {
            background-color: #1C3F60;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        footer {
            background-color: #2c3e50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        footer a {
            color: #ffffff;
            text-decoration: underline;
        }

        footer a:hover {
            color: #1C3F60; /* Warna ketika di-hover */
            text-decoration: none;
        }
        .cover-container {
            background-color: #080927;
        }
        .tex{
            color : #ffffff;
        }
        .button {
            margin-top: 20px;
        }

        .button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button button:hover {
            background-color: #ddd;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .card-content {
            padding: 15px;
        }
        .background-container {
            background-image: url('assets/image/well.jpg'); /* Path ke gambar */
            background-size: cover; /* Menyesuaikan gambar dengan ukuran container */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            background-position: center; /* Memusatkan gambar */
            width: 100%; /* Atur lebar sesuai kebutuhan */
            height: 120vh; /* Atur tinggi sesuai kebutuhan, misalnya full viewport */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white; /* Warna teks */
            text-align: center; /* Pusatkan teks */
        }
        .background-container button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            max-width: 1200px;
            width: 90%;
            gap: 20px; /* Jarak antara robot dan teks */
        }

        .robot-logo {
            width: 50%; /* Robot mengambil 20% lebar container */
            height: auto;
        }

        @media (max-width: 768px) { /* Untuk layar kecil */
            .robot-logo {
                width: 100px; /* Ukuran lebih kecil untuk perangkat mobile */
            }
        }

        .welcome-text {
            position: relative; /* Jika ingin menggunakan top */
            top: -250px; /* Geser elemen ke atas */
            margin-top: -20px; /* Alternatif jika tidak menggunakan posisi relatif */
            text-align: left;
        }
    </style>
</head>
<body>
<main>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if($this->session->userdata("username")&& $this->session->userdata("status_user")=='free'):?>
                    <li class="nav-item">
                    <a class="btn btn-warning btn-sm fw-bold mt-2 me-3" href="<?= base_url('Getprem') ?>">Get Plus!</a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Game</strong></a>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cgame">Test WPM</a></li>
                            <li><a class="dropdown-item" href="listgame">Adventure Game</a></li>
                        </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="leaderboard"><strong>Leaderboard</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userprofile"><strong>Profile</strong></a>
                    </li>
                    <?php if(!$this->session->userdata("username")):?>
                    <li class="nav-item">
                    <a class="btn btn-light btn-sm fw-bold mt-2 ms-3" href="auth">Sign In</a>
                    </li>
                    <?php endif ?>
                    <?php if($this->session->userdata("username")):?>
                    <li class="nav-item">
                    <a class="nav-link" href="userprofile"><strong><?= $this->session->userdata('username'); ?></strong></a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="background-container">
    <div class="content mb-5">
                    <img src="<?= base_url('assets/image/logo.png') ?>" alt="logo" width="400" class="mb-3">
                </div>
                <div class="welcome-text">
                    <h3 class=" ms-5 fw-bold" style="font: ">Hallo... <br>Good Morning</h3>
                    <p class="ms-5 fw-bold">Track your typing progress and improve your skills.</p>
    </div>
    </div>
<section>
    <div class="container mt-5">
        <div class="row justify-content-lg-between">
        <div class="col-lg-6">
            <h2>About Us</h2>
            <hr class="my-4 mb-3" />
            <p>
            WellType is a website designed to help users learn to type with ten fingers efficiently. The website provides various exercises and tips to improve typing speed and accuracy, so users can master typing skills in no time. With a user-friendly interface, WellType provides a fun and effective learning experience for all skill levels.
            </p>
            <br /><br />
        </div>
        <div class="col-lg-4">
            <img src="<?= base_url('assets/image/keyboarduser.jpeg');?>" height="70%" width="100%" class="rounded" alt="barista" />
        </div>
        </div>
    </div>
</section>

<body>
    <div class="container">
        <h1 class="text-center">Artikel Terbaru</h1>
        <div class="grid">
            <div class="card">
                <img src="<?= base_url('assets/image/artikel1.jpg') ?>" alt="Sweater Oversized Crewneck">
                <div class="card-content">
                    <p class="card-title">Mengapa Belajar Mengetik Penting untuk Masa Depan?
                    </p>
                    <p class="card-description">Di era digital saat ini, mengetik adalah salah satu keterampilan dasar yang wajib dimiliki.
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url('assets/image/artikel2.jpeg') ?>" alt="Gamis Adeline Maxi Shakila">
                <div class="card-content">
                    <p class="card-title">Apa Itu Metode Mengetik dengan 10 Jari?
                    </p>
                    <p class="card-description">Metode mengetik dengan 10 jari adalah teknik mengetik yang melibatkan semua jari tangan untuk
                        mengetik di keyboard tanpa melihat tombol. 
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url('assets/image/artikel3.jpeg') ?>" alt="Pashmina Kaos">
                <div class="card-content">
                    <p class="card-title">Manfaat Mengetik dengan 10 Jari
                    </p>
                    <p class="card-description">Meningkatkan Kecepatan dan Akurasi Dengan metode ini,dapat mengetik lebih cepat dan akurat dibandingkan mengetik
                        dengan cara melihat keyboard. 
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="<?= base_url('assets/image/artikel4.jpg') ?>" alt="Jilbab Bahan Paris">
                <div class="card-content">
                    <p class="card-title">Tips Belajar Mengetik dengan 10 Jari
                    </p>
                    <p class="card-description">Kenali Posisi Dasar Tempatkan jari-jari Anda pada tombol "home row" (ASDF untuk tangan kiri dan JKL; untuk tangan kanan). 
                        Ibu jari Anda berada di tombol spasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</main>
<!-- Footer -->
<footer>
    <p>Contact Us : 303-222-667-988</p>
    <p>If you have any questions about</p> 
    <p>this program you can contact us at welltype@gmail.com</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>