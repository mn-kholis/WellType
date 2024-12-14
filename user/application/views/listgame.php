<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Well Type</title>
    <style>
        body {
            background-color: #f4f4ed;
            margin-top: 70px
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
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
                    <a class="nav-link" href="<?= base_url('userprofile')?>"><strong><?= $this->session->userdata('username');?></strong> <?php //echo htmlspecialchars($username); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main Content -->
<section class="container mt-5 mb-5">
    <h4 class="fw-bold mt-5">Home Row</h4>
    <div class="row g-3">
    <!-- Card Template -->
    <?php foreach ($homerow as $v): ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
            <a href="<?php if ($v->id_game == 1): echo base_url('Typing/video'); else: echo base_url('Typing/game/' . $v->id_game); endif; ?>" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3"><?= $v->id_game ?></h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/keyboard.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2 mt-4">
                    <p class="title text-center"><?= $v->judul_game ?></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    <?php for ($i = $this->session->userdata('level_user')+1; $i <= 16; $i++): ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
            <a href="<?= base_url('Typing/erhomerow')?>" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3"><?= $i?></h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/gembok.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2 mt-4">
                    <p class="title text-center">locked</p>
                </div>
            </a>
        </div>
    <?php endfor?>

    <!-- Top Row Section -->
    <h4 class="mt-5 fw-bold">Top Row</h4><footer class="mb-5">Get PLUS to see the top row!</footer>
    <div class="row g-3">
        <!-- Card Template -->
        <?php for ($i = 1; $i <= 20; $i++): ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
            <a href="<?= base_url('Typing/erpremrow')?>" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3"><?= $i?></h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/gembok.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2 mt-4">
                    <p class="title text-center">locked</p>
                </div>
            </a>
        </div>
        <?php endfor?>
    </div>
</section>
    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<?php if($this->session->flashdata("success")): ?>
    <script>
        swal("Successful!", "<?php echo $this->session->flashdata("success");?>", "success");
    </script>
<?php endif ?>
<?php if($this->session->flashdata("error")): ?>
    <script>
        swal("Error!", "<?php echo $this->session->flashdata("error");?>", "error");
    </script>
<?php endif ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>