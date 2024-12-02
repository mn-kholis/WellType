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
            z-index: 1000;
        }
        .navbar {
            background-color: #2d3e50;
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
        .cover-container {
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
            <a class="navbar-brand fw-bold" href="">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Game
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cgame">Test WPM</a></li>
                            <li><a class="dropdown-item" href="listgame">Adventure Game</a></li>
                        </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="leaderboard"><strong>Leaderboard</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userprofile"><strong>Profile</strong></a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-light btn-sm fw-bold mt-2 ms-3" href="auth">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<section class="mb-3">
        <div class="cover-container d-flex w-100 h-70 mx-auto flex-column">
            <div class="row mt-5 ms-5 me-5">
                <div class="text-center col-md-4">
                    <img src="<?= base_url('assets/image/logo.png') ?>" alt="logo" width="430">
                </div>
                <div class="tex align-self-center col-md-8">
                    <h3 class="ms-5 fw-bold">Hallo...</h3>
                    <h3 class="ms-5 fw-bold">Good Morning</h3>
                    <div class="ms-5 button center col-md-8">
                        <button class="fw-bold">Get Started</button>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f4f4ed" fill-opacity="1" d="M0,288L18.5,266.7C36.9,245,74,203,111,170.7C147.7,139,185,117,222,122.7C258.5,128,295,160,332,181.3C369.2,203,406,213,443,186.7C480,160,517,96,554,74.7C590.8,53,628,75,665,96C701.5,117,738,139,775,149.3C812.3,160,849,160,886,138.7C923.1,117,960,75,997,85.3C1033.8,96,1071,160,1108,181.3C1144.6,203,1182,181,1218,149.3C1255.4,117,1292,75,1329,58.7C1366.2,43,1403,53,1422,58.7L1440,64L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>
        </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row justify-content-lg-between">
        <div class="col-lg-6">
            <h2>About Us</h2>
            <hr class="my-4 mb-3" />
            <p>
            WellType adalah sebuah website yang dirancang untuk membantu pengguna belajar mengetik dengan sepuluh jari secara efisien. Website ini menyediakan berbagai latihan dan tips untuk meningkatkan kecepatan dan akurasi mengetik, sehingga pengguna dapat menguasai keterampilan mengetik dalam waktu singkat. Dengan antarmuka yang ramah pengguna, WellType memberikan pengalaman belajar yang menyenangkan dan efektif untuk semua level kemampuan.
            </p>
            <br /><br />
        </div>
        <div class="col-lg-4">
            <img src="<?= base_url('assets/image/keyboard.png');?>" height="70%" width="100%" class="rounded" alt="barista" />
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>