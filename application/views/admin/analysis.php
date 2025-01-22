<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>User Activities</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="chart-container">
                <!-- Include grafik yang Anda buat sebelumnya -->
                <canvas id="userChart"></canvas>
            </div>

            <h2>Generate Report</h2>
            <button class="btn btn-outline-primary" onclick="window.location.href='<?= base_url('Analysis_admin/generateGameReport') ?>'">Game</button>
            <button class="btn btn-outline-primary" onclick="window.location.href='<?= base_url('Analysis_admin/generateUserReport') ?>'">User</button>
            <button class="btn btn-outline-primary" onclick="window.location.href='<?= base_url('Analysis_admin/generateContentReport') ?>'">Content</button>
            <button class="btn btn-outline-primary" onclick="window.location.href='<?= base_url('Analysis_admin/generateLeaderboardReport') ?>'">Leaderboard</button>
            <!-- Tambahkan tombol lain untuk Content atau Leaderboard -->
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('userChart').getContext('2d');
    
    const dates = <?= json_encode($dates); ?>;
    const freeGames = <?= json_encode($freeGames); ?>;
    const premiumGames = <?= json_encode($premiumGames); ?>;

    const userChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [
                {
                    label: 'Free Users',
                    data: freeGames,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Premium Users',
                    data: premiumGames,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Games Played'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>