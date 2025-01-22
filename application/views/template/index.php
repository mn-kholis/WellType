<!-- page content -->
<div class="">
  <div class="row">
      <div class="animated flipInY col-lg-3 col-md-4 col-sm-6">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user mb-2"></i></div>
          <div class="count"><?php echo $premium_count; ?></div>
          <h5 class="ml-3 mt-3">Premium User</h5>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user mb-2"></i></div>
            <div class="count"><?php echo $free_count; ?></div>
            <h5 class="ml-3 mt-3">Free User</h5>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user mb-2"></i></div>
            <div class="count"><?php echo $total_count; ?></div>
            <h5 class="ml-3 mt-3">Active User</h5>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Graphics of user activities</h2>
          <div class="pull-right">
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-9 col-sm-12 ">
            <div class="demo-container">
              <div>
                <canvas id="userTypeChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 ">
            <div>
              <ul class="list-unstyled top_profiles scroll-view">
                <h2>Leaderboard</h2>
                <?php if (!empty($topUsers)): ?>
                    <?php foreach ($topUsers as $index => $user): ?>
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user aero"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?= $user['username_user']; ?></a>
                        <p> <?= $user['email_user']; ?></p>
                        <p> <small>Top <?= $index + 1; ?></small>
                        </p>
                      </div>
                    </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>
                        <p colspan="4">No data available.</p>
                    </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content --> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('userTypeChart').getContext('2d');
    
    const dates = <?= json_encode($dates); ?>;
    const freeGames = <?= json_encode($freeGames); ?>;
    const premiumGames = <?= json_encode($premiumGames); ?>;

    const userTypeChart = new Chart(ctx, {
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