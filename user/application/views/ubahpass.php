<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Change Password - Well Type</title>
    <style>
        body {
            background-color: #f4f4ed;
        }
        .content-wrapper {
            padding: 20px;
        }
        .change-password-card {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
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
        .side-menu li a {
            color: #212529;
            padding: 10px;
            display: block;
            text-decoration: none;
            border-radius: 4px;
        }
        .side-menu li a.active {
            background-color: #2d3e50;
            color: white;
        }
        .side-menu li a:hover {
            background-color: #c5c6c7;
        }
        .navbar {
            background-color: #2d3e50;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .btn-save {
            background-color: #2d3e50;
            color: white;
            border: none;
        }
        .btn-save:hover {
            background-color: #435564;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2d3e50;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>">WELL TYPE</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if($this->session->userdata("username")&& $this->session->userdata("status_user")=='free'):?>
                    <li class="nav-item">
                    <a class="btn btn-warning btn-sm fw-bold mt-2 me-3" href="#">Get Plus!</a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>"><strong>Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('userprofile')?>"><strong><?= $this->session->userdata('username'); ?></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <!-- Change Password Form -->
            <div class="col-md-9">
                <div class="change-password-card shadow">
                    <h4 class="mb-4"><strong>Change Password</strong></h4>
                    <form action="<?= site_url('user/change_password') ?>" method="post">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password" required>
                        </div>
                        <button type="submit" class="btn btn-save">Save Changes</button>
                    </form>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <div class="col-md-3">
                <div class="side-menu shadow">
                    <ul class="list-unstyled">
                        <li><a href="<?= site_url('userprofile') ?>">Profile</a></li>
                        <li><a href="<?= site_url('ubahpass') ?>" class="active">Change Password</a></li>
                        <li><a href="<?= site_url('edituserprofile') ?>">Change Profile</a></li>
                        <?php if($this->session->userdata("status_user")=='premium'):?>
                        <li><a href="<?= site_url('performanceanalysis') ?>" class="text-decoration-none">Performance Analysis</a></li>
                        <?php endif; ?>
                        <li><a href="<?= site_url('logout') ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
