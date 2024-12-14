<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellType</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body {
        background-color: #f4f4ed;
    }
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000; /* Pastikan navbar berada di atas elemen lainnya */
    }
    .navbar {
        background-color: #2d3e50;
    }
    .navbar-brand, .nav-link {
        color: white !important;
    }
    .btn-light {
    padding: 2px 9px; 
    border-radius: 4px; 
    font-size: 0.9rem; 
    color: #212529; 
}

.btn-light:hover {
    background-color: #c5c6c7; 
    color: #212529; 
    text-decoration: none; 
}


</style>
</head>
<body>
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
                    <a class="nav-link" href="<?= base_url('userprofile')?>"><strong><?= $this->session->userdata('username');?></strong></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light btn-sm fw-bold mt-2 ms-3" href="<?= base_url('listgame') ?>">Back</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="">
    <div class="typing-container">
            <div class="mb-5">
                <h1><?php echo $target->judul_game?></h1>
                <p><?php echo $target->deskripsi_game?></p>
            </div>
            <div class="text-display">
                <p id="target-text">
                    <?php foreach (str_split($target->text_game) as $char): ?>
                        <span class="char" data-key="<?= strtolower($char) ?>">
                            <?= $char === ' ' ? '&nbsp;' : $char ?>
                        </span>
                    <?php endforeach; ?>
                </p>
            </div>
            <div class="keyboard">
                <h5>Click the button :</h5>
                <span class="key" id="current-key">_</span>
            </div>
            <p>your last input :</p>
            <div class="user-inputs"></div>
        </div>
        <script src="<?= base_url('assets/js/script.js') ?>"></script>
</div>
    
</body>
</html>
