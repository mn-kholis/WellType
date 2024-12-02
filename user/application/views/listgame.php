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
        <a class="navbar-brand fw-bold" href="">WELL TYPE</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-sm btn-warning mt-1 me-2" href=""><strong>Get PLUS!</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><strong>Home</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><strong>Username</strong> <?php //echo htmlspecialchars($username); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Main Content -->
<section class="container mt-5">
    <h4 class="fw-bold mt-5">Home Row</h4>
    <div class="row g-3">
    <!-- Card Template -->
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="<?= base_url('typing/')?>" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3">1</h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/keyboard.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2">
                    <p class="title text-center">f and j</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3">1</h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/gembok.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2">
                    <p class="title text-center">title</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Top Row Section -->
    <h4 class="mt-5 mb-4 fw-bold">Top Row</h4>
    <div class="row g-3">
        <!-- Card Template -->
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="" class="text-decoration-none text-dark">
                <div class="card">
                    <h4 class="fw-bold m-3">1</h4>
                    <div class="text-center">
                    <img src="<?= base_url('assets/image/gembok.png') ?>" alt="Icon" width="70"></div>
                    <hr class="my-2">
                    <p class="title text-center">title</p>
                </div>
            </a>
        </div>
    </div>
</section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
