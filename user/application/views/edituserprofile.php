<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Change Profile - Well Type</title>
    <style>
        body {
            background-color: #f4f4ed;
        }
        .profile-card {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            position: relative;
            padding-bottom: 40px; 
        }
        .profile-card .member-since {
            position: absolute; 
            left: 20px; 
            font-size: 0.9rem; 
            color: #6c757d; 
        }
        .side-menu {
            background-color: #dee2e6;
            padding: 20px;
            border-radius: 8px;
        }
        .side-menu ul {
            padding-left: 0;
        }
        .side-menu li {
            margin: 10px 0;
        }
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .text-center img {
            width: 125px; 
            height: 125px; 
            object-fit: cover;
        }
        .side-menu ul li a {
            color: #212529; /* Warna teks default */
            padding: 10px;
            display: block;
            text-decoration: none;
            border-radius: 4px;
        }
        .side-menu ul li a:hover {
            background-color: #c5c6c7; /* Warna latar belakang biru navbar */
        }
        #x {
            background-color: #2d3e50; /* Warna latar belakang biru navbar */
            color: white; /* Warna teks menjadi putih */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><strong>Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userprofile.php"><strong>Username</strong> <?php //echo htmlspecialchars($username); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-4">
            <!-- Profil -->
            <div class="col-md-9">
                <div class="profile-card shadow">
                    <h4 class="mb-4"><Strong>Change Profile</Strong></h4>
                    <div class="row align-items center">
                        <div class="col-md-3 text-center">
                            <img src="<?= base_url('assets/image/gree.jpg') ?>" alt="Profile Picture" class="img-fluid rounded-circle" width="100">
                            <!-- Upload Profile Picture -->
                            <form action="upload.php" method="POST" enctype="multipart/form-data">
                                <div class="mt-2">
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Upload</button>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <form action="update_profile.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label "><strong>Username</strong></label>
                                    <input type="text" class="form-control" id="username" name="username" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label"><strong>Email</strong></label>
                                    <input type="email" class="form-control" id="email" name="email" value="" >
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                            <!-- Member Since -->
                            <div class="member-since">
                                Member since: 02/12/2024 <?php //echo $member_since; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu samping -->
            <div class="col-md-3">
                <div class="side-menu shadow">
                    <h5 class="mb-3"></h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('userprofile') ?>" class="text-decoration-none">Profile</a></li>
                        <li><a href="<?= site_url('ubahpass') ?>" class="text-decoration-none">Change Password</a></li>
                        <li><a href="<?= site_url('edituserprofile') ?>" class="text-decoration-none" id="x">Change Profile</a></li>
                        <li><a href="<?= site_url('performanceanalysis') ?>" class="text-decoration-none">Performance Analysis</a></li>
                        <li><a href="<?= site_url('Logout') ?>" class="text-decoration-none">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
