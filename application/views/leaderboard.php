<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Leaderboard - Well Type</title>
    <style>
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .table th:first-child, .table td:first-child {
            width: 50px; 
            text-align: center;
        }
        .table th:last-child, .table td:last-child {
            width: 100px; 
            text-align: center;
        }
        /* Container utama untuk center layout */
        .top-players {
            display: flex;
            justify-content: center;
            gap: 150px;
            margin-top: 20px;
        }

        /* Card setiap pemain */
        .player-card {
            position: relative;
            text-align: center;/* Warna latar belakang */
            padding: 10px;
            border-radius: 10px;
            width: 120px;
        }

        /* Gambar pemain */
        .player-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Membuat gambar melingkar */
            border: 5px solid #4CAF50; /* Bingkai hijau default */
        }

        /* Top 1 dengan bingkai emas */
        .top-1 img {
            border-color: gold;
        }

        /* Top 2 dengan bingkai perak */
        .top-2 img {
            border-color: silver;
        }

        /* Top 3 dengan bingkai perunggu */
        .top-3 img {
            border-color: #CD7F32;
        }

        /* Angka Rank (1, 2, 3) */
        .rank-number {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ffcc00; /* Warna kuning */
            color: #000; /* Warna teks */
            font-size: 16px;
            font-weight: bold;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        /* Khusus untuk Top 1 dengan icon mahkota */
        .rank-number.crown {
            background-color: gold;
            color: black;
        }

        /* Style teks skor */
        .score {
            
            font-size: 18px;
            font-weight: bold;
            color: #ffa500; /* Warna oranye */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url()?>">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if($this->session->userdata("username")&& $this->session->userdata("status_user")=='free'):?>
                    <li class="nav-item">
                    <a class="btn btn-warning btn-sm fw-bold mt-2 me-3" href="<?= base_url('Getprem') ?>">Get Plus!</a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url()?>"><strong>Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('userprofile')?>"><strong>Username</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Leaderboard -->
    <div class="container my-5">
        <div class="top-players">
            <!-- Top 2 -->
            <div class="player-card top-2">
                <div class="rank-number">2</div>
                <img src="<?= base_url('assets/image/Gree.jpg') ?>" alt="2nd Place">
                <p class="fw-bold"><?= htmlspecialchars($lead[1]->username_user); ?></p>
                <p class="score"><?= number_format($lead[1]->total_reward); ?></p>
            </div>

            <!-- Top 1 -->
            <div class="player-card top-1">
                <div class="rank-number crown">1</div>
                <img src="<?= base_url('assets/image/gree.jpeg') ?>" alt="1st Place">
                <p class="fw-bold"><?= htmlspecialchars($lead[0]->username_user); ?></p>
                <p class="score"><?= number_format($lead[0]->total_reward); ?></p>
            </div>

            <!-- Top 3 -->
            <div class="player-card top-3">
                <div class="rank-number">3</div>
                <img src="<?= base_url('assets/image/Gree.jpg') ?>" alt="3rd Place">
                <p class="fw-bold"><?= htmlspecialchars($lead[2]->username_user); ?></p>
                <p class="score"><?= number_format($lead[2]->total_reward); ?></p>
            </div>
        </div>

        <!-- Leaderboard Table -->
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <!-- Data leaderboard -->
                    <?php $rank =1;?>
                    <?php foreach ($lead as $k) : ?>
                    <tr>
                        <td><?= $rank++;?></td>
                        <td><?= $k->username_user?></td>
                        <td><?= $k->total_reward?></td>
                    </tr>
                    <?php endforeach?>
                    <!-- Tambahkan baris lainnya -->
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
