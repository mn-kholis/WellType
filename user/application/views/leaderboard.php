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
        .leaderboard-header {
            position: relative; 
            margin-bottom: 30px;
        }
        .leaderboard-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%; 
            object-fit: cover;
            border: 3px solid #ffffff;
        }
        .x {
            position: absolute; 
            top: -30px; 
            left: 50%;
            transform: translateX(-50%); 
        }
        .col-4 {
            text-align: center;
        }
        .col-4 p {
            margin: 5px 0 0;
            font-weight: bold;
        }
        .x p {
            margin: 5px 0 0;
            font-weight: bold;
        }
        .row {
            display: flex; /* Pastikan elemen menggunakan Flexbox */
            justify-content: center; /* Sejajarkan konten di tengah secara horizontal */
            gap: 10px; /* Berikan jarak antar elemen */
        }
        .table th:first-child, .table td:first-child {
            width: 50px; 
            text-align: center;
        }
        .table th:last-child, .table td:last-child {
            width: 100px; 
            text-align: center;
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
        <div class="leaderboard-header text-center">
            <!-- Ranking 1 (Class x) -->
            <div class="x">
                <img src="<?= base_url('assets/image/gree.jpg') ?>" alt="1st Place">
                <p class="mb-0">Username</p>
                <p>Score</p>
            </div>
            <div class="row align-items-center justify-content-center">
                <!-- Ranking 2 -->
                <div class="col-4">
                    <img src="<?= base_url('assets/image/gree.jpg') ?>" alt="2nd Place">
                    <p class="mb-0">Username</p>
                    <p>Score</p>
                </div>
                <!-- Ranking 3 -->
                <div class="col-4">
                    <img src="<?= base_url('assets/image/gree.jpg') ?>" alt="3rd Place">
                    <p class="mb-0">Username</p>
                    <p>Score</p>
                </div>
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
                    <tr>
                        <td>1</td>
                        <td>User One</td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>User Two</td>
                        <td>1400</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>User Three</td>
                        <td>1300</td>
                    </tr>
                    <!-- Tambahkan baris lainnya -->
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
