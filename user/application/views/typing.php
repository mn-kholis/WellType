<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Trainer</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="typing-container">
        <div class="mb-5">
            <h1><?php echo strtoupper($judul_text)?></h1>
        </div>
        <div class="text-display">
            <p id="target-text">
                <?php foreach (str_split($target_text) as $char): ?>
                    <span class="char" data-key="<?= strtolower($char) ?>">
                        <?= $char === ' ' ? '&nbsp;' : $char ?>
                    </span>
                <?php endforeach; ?>
            </p>
        </div>
        <div class="keyboard">
            <span class="key" id="current-key">_</span>
        </div>
        <div class="user-inputs"></div>
    </div>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
