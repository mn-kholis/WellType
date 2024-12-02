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
            background-color: #f4f4ed;
            margin-top: 50px; 
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
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
            color: #ffcc00; /* Warna ketika di-hover */
            text-decoration: none;
        }
        .jumbotron {
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
    </style>
</head>
<body>
<main>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><strong>Game</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><strong>Leaderboard</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><strong>Profile</strong></a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-light btn-sm fw-bold mt-2 ms-3" href="index.html">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   <section>
    <div class="jumbotron">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <div class="row m-5">
                <div class="text-center col-md-4">
                    <img src="<?= base_url('assets/image/logo.png') ?>" alt="logo" width="450">
                </div>
                <div class="tex align-self-center col-md-8">
                    <h3 class="ms-5 fw-bold">Hallo...</h3>
                    <h3 class="ms-5 fw-bold">Good Morning</h3>
                    <div class="ms-5 button center col-md-8">
                        <button class="fw-bold">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>


</main>
<!-- Footer -->
<footer>
    <p>Contact Us : 303-222-667-988</p>
    <p>If you have any questions about</p> 
    <p>this program you can contact us at welltype@gmail.com</p>
</footer>
</body>
</html>