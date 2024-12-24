<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Performance Analysis - Well Type</title>
    <style>
        body {
            background-color: #f4f4ed;
        }
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .progress-bar {
            background-color: #2d3e50;
        }
        /* Lingkaran waktu latihan */
        .circle {
            width: 150px;
            height: 150px;
            border: 10px solid #2d3e50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #2d3e50;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if($this->session->userdata("username")&& $this->session->userdata("status_user")=='free'):?>
                    <li class="nav-item">
                    <a class="btn btn-warning btn-sm fw-bold mt-2 me-3" href="<?= base_url('Getprem') ?>">Get Plus!</a>
                    </li>
                    <?php endif ?>
                    <!-- Link navigasi Home -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>"><strong>Home</strong></a>
                    </li>
                    <!-- Menampilkan username -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('userprofile')?>"><strong><?= $this->session->userdata('username'); ?></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <div class="container mt-4">
        <h2 class="text-center mb-4"><strong>Performance Analysis</strong></h2>
        <div class="row">
            <!-- Bagian Speed -->
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h5>Speed</h5>
                    <!-- Kecepatan secara keseluruhan -->
                    <div class="mb-2">Overall <span class="float-end">20 WPM</span></div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%;"></div>
                    </div>
                    <!-- Kecepatan untuk simbol -->
                    <div class="mb-2">Symbols <span class="float-end">12 WPM</span></div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;"></div>
                    </div>
                    <!-- Kecepatan untuk huruf kecil -->
                    <div>Lowercase Alphabet <span class="float-end">20 WPM</span></div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
            <!-- Bagian Practice Time -->
            <div class="col-md-4 mb-3 text-center">
                <div class="card p-4">
                    <h5>Practice Time</h5>
                    <!-- Lingkaran waktu latihan -->
                    <div class="circle mx-auto mb-3">
                        00:06:18
                    </div>
                    <!-- Tombol navigasi waktu latihan -->
                    <div>
                        <button class="btn btn-outline-primary btn-sm">Today</button>
                        <button class="btn btn-outline-primary btn-sm">This Week</button>
                        <button class="btn btn-outline-primary btn-sm">Overall</button>
                    </div>
                </div>
            </div>
            <!-- Bagian Practice Attempts -->
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h5>Practice Attempts</h5>
                    <!-- Jumlah percobaan latihan hari ini -->
                    <div>Today <span class="float-end">0 Attempts</span></div>
                    <hr>
                    <!-- Jumlah percobaan latihan minggu ini -->
                    <div>This Week <span class="float-end">0 Attempts</span></div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Bagian Progress Overview -->
            <div class="col-md-12">
                <div class="card p-3">
                    <h5>Progress Overview</h5>
                    <!-- Penjelasan singkat tentang grafik -->
                    <p>Use this graph to monitor speed and coverage improvement over time.</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <!-- Informasi angka statistik -->
                            <p>Accuracy: <strong>98%</strong></p>
                            <p>Coverage: <strong>17%</strong></p>
                            <p>Speed (WPM): <strong>20</strong></p>
                        </div>
                        <!-- Grafik progress -->
                        <div style="width: 80%;">
                            <canvas id="progressChart"></canvas>
                        </div>
                    </div>
                    <!-- Tombol navigasi grafik -->
                    <div class="mt-3">
                        <button class="btn btn-outline-secondary btn-sm">Daily</button>
                        <button class="btn btn-outline-secondary btn-sm">Week</button>
                        <button class="btn btn-outline-secondary btn-sm">Monthly</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js untuk membuat grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Inisialisasi data untuk grafik
        const ctx = document.getElementById('progressChart').getContext('2d');
        const progressChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Oct'], // Label bulan
                datasets: [
                    {
                        label: 'Practice Time',
                        data: [6], // Data waktu latihan
                        backgroundColor: '#007bff'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Sembunyikan legenda
                    }
                }
            }
        });
    </script>
</body>
</html>
