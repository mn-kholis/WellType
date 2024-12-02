<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <title>WellType</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/gamecss.css') ?>">
</head>
<body>
    <main>
        <h1 class="text-center">
        <img src="<?= base_url('assets/image/logo.png') ?>" alt="Logo" width="60">    
        WellType
        </h1>
        <div id="header">
            <div id="info"></div>
            <div id="buttons">
                <button id="newGameBtn">New game</button>
                <button id="endGameBtn">End game</button>
            </div>
        </div>
        <div id="game" tabindex="0">
            <div id="words"></div>
            <div id="cursor"></div>
            <div id="focus-error">Click here to focus</div>
        </div>
    </main>
    <script src="<?= base_url('assets/js/gamejs.js') ?>"></script>
</body>
</html>