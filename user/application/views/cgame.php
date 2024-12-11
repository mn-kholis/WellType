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
        <div id="bestWpmDisplay">
            <p>Best WPM : <span id="bestWpmValue"><?php echo $bestWpm; ?></span></p>
        </div>
        <div id="saveWpmSection" style="display:none;">
            <p>WPM Result : <span id="currentWpm"></span></p>
            <button id="saveWpmBtn">Save Best WPM</button>
        </div>
        <div id="buttonss">
            <a href="<?= base_url()?>"><button id="backBtn">Back Home</button></a>
        </div>
    </main>
    <script src="<?= base_url('assets/js/wpm.js') ?>"></script>
    <script>
        let bestWpm = parseFloat(<?php echo json_encode($bestWpm); ?>) || 0;

        function gameOver() {
            clearInterval(window.timer);
            addClass(document.getElementById('game'), 'over');
            const result = getWpm();
            document.getElementById('info').innerHTML = `WPM Result : ${result}`;
            document.getElementById('currentWpm').innerText = result;
            document.getElementById('saveWpmSection').style.display = 'block';
        }

        document.getElementById('saveWpmBtn').addEventListener('click', () => {
            const currentWpm = parseFloat(document.getElementById('currentWpm').innerText);
            if (currentWpm > bestWpm) {
                fetch('<?= base_url("Cgame/saveBestWpm") ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ bestWpm: currentWpm }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Best WPM berhasil disimpan!');
                        bestWpm = currentWpm; // Update nilai bestWpm secara lokal
                        document.getElementById('bestWpmValue').innerText = bestWpm;
                    } else {
                        alert('Gagal menyimpan Best WPM. Silakan coba lagi.');
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat menyimpan Best WPM:', error);
                    alert('Gagal menyimpan Best WPM. Periksa koneksi Anda.');
                });
            } else {
                alert('WPM tidak lebih baik dari Best WPM saat ini.');
            }
        });

        newGame();
    </script>
</body>
</html>
