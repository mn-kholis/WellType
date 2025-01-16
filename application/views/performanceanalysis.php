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
                    <h5 class="text-center"><strong>Best Speed</strong></h5>
                    <!-- Kecepatan secara keseluruhan -->
                    <div class="mb-2">Overall <span class="float-end"><?php echo $bestWpm; ?> WPM</span></div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $bestWpm; ?>%;"></div>
                    </div>
                </div>
            </div>
            <!-- Bagian Practice Time -->
            <div class="col-md-4 mb-3 text-center">
                <div class="card p-3">
                    <h3>Practice Time</h3>
                    <div class="circle mb-3" id="practice-time">
                        <?= gmdate("H:i:s", $overall_time); ?> <!-- Default to overall time -->
                    </div>
                    <div class="buttons">
                        <button class="filter-btn btn btn-outline-primary active" data-filter="overall">Overall</button>
                        <button class="filter-btn btn btn-outline-primary" data-filter="today">Today</button>
                        <button class="filter-btn btn btn-outline-primary" data-filter="this_week">This Week</button>
                    </div>
                </div>
            </div>
            <!-- Bagian Practice Attempts -->
            <div class="col-md-4 mb-3">
                <div class="card p-2 ">
                    <h5 class="text-center"><strong>Practice Attempts</strong></h5>
                    <p>Practice Attempts Today : <span class="float-end"><?= $attempts_today ?> Attempts</span></p>
                    <p>Practice Attempts Overall : <span class="float-end"><?= $attempts_overall ?> Attempts</span></p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Bagian Progress Overview -->
            <div class="col-md-12">
                <div class="card p-3">
                    <h5>Progress Overview</h5>
                    <!-- Penjelasan singkat tentang grafik -->
                    <p>Use this chart to monitor the increase in activity over time.</p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <!-- Informasi angka statistik -->
                            <p>Best Speed (WPM): <strong><?php echo $bestWpm; ?></strong></p>
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
    <script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Hapus kelas "active" pada semua tombol
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active'); // Tambahkan kelas "active" pada tombol yang diklik

            const filter = this.getAttribute('data-filter');
            fetch(`<?= base_url('Performanceanalysis/filter_time') ?>/${filter}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('practice-time').textContent = data.time;
                });
        });
    });
</script>
</body>
</html>
