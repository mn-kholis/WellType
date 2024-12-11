<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Well Type</title>
    <style>
        body {
            background-color: #f4f4ed;
        }
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
    </style>

<script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-FDWkoci2_UHYFFOG"></script>
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

    <!-- Main view -->
    <div class="container py-5 mt-5">
        <div class="row shadow rounded bg-white p-0">
            <!-- Left Section -->
            <div class="col-md-6 p-5">
                <h1 class="fw-bold mb-4">Upgrade Your Typing Skills With <span class="text-warning">PLUS</span></h1>
                <? if(!empty($snapToken)) : ?>
                <button id="pay-button" class="btn btn-lg btn-warning text-white fw-bold px-4 py-2 mb-3">Upgrade to PLUS</button>
                <? endif; ?>
                <pre><div id="result-json"><br></div></pre>
                <p class="text-muted mb-4">Rp25.000,00 per month</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><span class="text-warning">👑</span> Remove All Ads</li>
                    <li class="mb-3"><span class="text-warning">👑</span> Computer Basics Curriculum</li>
                    <li class="mb-3"><span class="text-warning">👑</span> Online Behavior & Safety Curriculum</li>
                    <li class="mb-3"><span class="text-warning">👑</span> Coding Fundamentals Curriculum</li>
                    <li><span class="text-warning">👑</span> Priority Support</li>
                </ul>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 text-center p-5 align-content-center" style="background-color: #208DC5;">
                <blockquote class="blockquote">
                    <p class="fst-italic">"Great program! Engaging and very easy to use. My students love it!"</p>
                    <footer class="blockquote-footer text-white">Azucena T.</footer>
                </blockquote>
                <h1 class="text-white fw-bold mt-4">#1 Worldwide Keyboarding Curriculum</h1>
                <p class="text-white mt-3">80 million+ Global Users</p>
                <p class="text-white">20+ Years Trusted Experience</p>
                <small class="text-white">As seen in Inc., The Wall Street Journal, New York Post, The Times</small>
            </div>
        </div>
    </div>

    <? if(!empty($snapToken)) : ?>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FDWkoci2_UHYFFOG"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            window.location.href = "<?= base_url('Getprem/succes') ?>";
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
    <? endif;?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
