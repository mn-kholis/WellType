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
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M584.2 96.36c-28.88-1.701-54.71 17.02-79.74 26.49C490 88.22 455.9 64 416 64c-11.25 0-22 2.252-32 5.877V56C384 42.75 373.2 32 360 32h-16C330.8 32 320 42.75 320 56v49C285.1 79.62 241.2 64 192 64C85.1 64 0 135.6 0 224v232C0 469.3 10.75 480 24 480h48C85.25 480 96 469.3 96 456v-62.87C128.4 407.5 166.8 416 208 416s79.63-8.492 112-22.87V456c0 13.25 10.75 24 24 24h48c13.25 0 24-10.75 24-24V288h128v32c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16V288c17.62 0 32-14.38 32-32l-.0001-96.07C639.1 127.8 616.4 98.25 584.2 96.36zM447.1 176c-8.875 0-16-7.125-16-16S439.1 144 448 144s16 7.125 16 16S456.9 176 447.1 176z"/></svg>
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