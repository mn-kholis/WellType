document.addEventListener('DOMContentLoaded', () => {
    const targetText = document.querySelectorAll('#target-text .char');
    const currentKey = document.getElementById('current-key');
    const userInputsContainer = document.querySelector('.user-inputs');
    const gameDataElement = document.getElementById('gameData');
    const baseUrl = gameDataElement.dataset.baseUrl;
    const targetGameId = parseInt(gameDataElement.dataset.gameId);
    let currentIndex = 0;
    let startTime = null; // Waktu mulai

    // Inisialisasi: tampilkan huruf pertama di kotak keyboard
    currentKey.textContent = targetText[currentIndex]?.dataset.key.toUpperCase();

    document.addEventListener('keydown', (event) => {
        if (!startTime) {
            startTime = Date.now(); // Set waktu mulai ketika tombol pertama ditekan
        }

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
        console.log("currentIndex:", currentIndex, "targetText.length:", targetText.length);
        // Jika semua huruf selesai
        if (currentIndex === targetText.length) {
            console.log("Mengirim data ke server...");
            const data = {
                id_game: targetGameId, // Menggunakan variabel global
                score: calculateScore(),
                waktu_penyelesaian: calculateTime(startTime),
            };
    
            console.log("Data yang dikirim ke server:", data);

            fetch(`${baseUrl}Typing/saveGameResult`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            })
            .then(response => {
                console.log("Respons HTTP:", response.status);
                return response.json();
            })
            .then(result => {
                console.log("Respons dari server:", result);
                if (result.status === 'success') {
                    alert('Permainan selesai! Data berhasil disimpan!');
                    window.location.href = `${baseUrl}Typing/setflash`;
                } else {
                    alert('Gagal menyimpan data: ' + result.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        }
        
    });

    // Fungsi untuk menghitung skor
    function calculateScore() {
        const correctChars = document.querySelectorAll('.char.correct').length;
        return correctChars * 10; // Setiap karakter benar bernilai 10 poin
    }

    // Fungsi untuk menghitung waktu penyelesaian
    function calculateTime(startTime) {
        const endTime = Date.now(); // Waktu selesai
        const totalTime = Math.floor((endTime - startTime) / 1000); // Dalam detik
        return new Date(totalTime * 1000).toISOString().substr(11, 8); // Format hh:mm:ss
    }
});
