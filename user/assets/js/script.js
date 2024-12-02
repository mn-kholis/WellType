document.addEventListener('DOMContentLoaded', () => {
    const targetText = document.querySelectorAll('#target-text .char');
    const currentKey = document.getElementById('current-key');
    const userInputsContainer = document.querySelector('.user-inputs');
    let currentIndex = 0;

    // Inisialisasi: tampilkan huruf pertama di kotak keyboard
    currentKey.textContent = targetText[currentIndex]?.dataset.key.toUpperCase();

    document.addEventListener('keydown', (event) => {
        const pressedKey = event.key.toLowerCase(); // Input dari user
        const currentCharElement = targetText[currentIndex];
        const currentChar = currentCharElement?.dataset.key;

        // Reset status kotak keyboard
        currentKey.classList.remove('correct', 'wrong');

        const inputBox = document.createElement('span'); // Buat elemen kotak baru
        inputBox.classList.add('key'); // Tambahkan kelas

        if (pressedKey === ' ') {
            inputBox.classList.add('space'); // Tambahkan kelas untuk spasi
            inputBox.textContent = 'Space';
        } else {
            inputBox.textContent = pressedKey.toUpperCase();
        }

        if (currentCharElement) {
            if (pressedKey === currentChar) {
                // Input benar
                currentCharElement.classList.add('correct');
                currentKey.classList.add('correct');
                inputBox.classList.add('correct');
                currentIndex++;

                if (currentIndex < targetText.length) {
                    currentKey.textContent = targetText[currentIndex]?.dataset.key.toUpperCase();
                } else {
                    currentKey.textContent = '_'; // Selesai
                }
            } else {
                // Input salah
                currentCharElement.classList.add('wrong');
                currentKey.classList.add('wrong');
                inputBox.classList.add('wrong');
            }
        }

        // Batasi hanya 5 kotak di bawah
        if (userInputsContainer.children.length === 5) {
            userInputsContainer.removeChild(userInputsContainer.firstChild); // Hapus kotak pertama
        }
        userInputsContainer.appendChild(inputBox); // Tambahkan kotak baru

        // Sorot karakter berikutnya
        targetText.forEach((char, index) => {
            char.classList.toggle('active', index === currentIndex);
        });

        if (currentIndex === targetText.length) {
            alert('Well done!');
            window.location.href = "http://localhost/WellType/WellType/user/listgame/";
        }
    });
});
