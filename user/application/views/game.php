<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Game</title>
    <style>
        .keyboard-button {
            font-size: 16px;
            padding: 8px 12px;
            margin: 4px;
        }

        .keyboard-button.green {
            background-color: green;
            color: white;
        }

        .keyboard-button.red {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Well Type</h1>
    <p id="level-text"><?= isset($current_level) ? $current_level->text_to_type : 'No level available' ?></p>
    <div id="keyboard">
        <!-- Keyboard buttons will be dynamically generated here -->
    </div>

    <script>
    // Get the current level text
    const levelText = '<?= $current_level->text_to_type ?>';

    // Create keyboard buttons
    const keyboard = document.getElementById('keyboard');
    levelText.split('').forEach(letter => {
        const button = document.createElement('button');
        button.textContent = letter;
        button.classList.add('keyboard-button');
        button.addEventListener('click', () => validateInput(letter));
        keyboard.appendChild(button);
    });

    // Validate user input and update button colors
    function validateInput(letter) {
        const currentIndex = levelText.length - levelText.replace(letter, '').length; // Menentukan posisi huruf yang diklik

        // Jika huruf yang diklik sesuai dengan huruf yang seharusnya
        if (letter === levelText[currentIndex]) {
            changeButtonColor(letter, 'green'); // Ubah warna tombol menjadi hijau
            if (currentIndex + 1 < levelText.length) {
                changeButtonColor(levelText[currentIndex + 1], 'green'); // Ubah warna huruf berikutnya menjadi hijau jika ada
            }
        } else {
            changeButtonColor(letter, 'red'); // Jika tidak sesuai, ubah warna tombol menjadi merah
        }
    }

    function changeButtonColor(letter, color) {
        const buttons = document.querySelectorAll('.keyboard-button');
        buttons.forEach(button => {
            if (button.textContent === letter) {
                button.style.backgroundColor = color;
            }
        });
    }
</script>
</body>
</html>