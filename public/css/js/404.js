// public/js/404.js

document.addEventListener('DOMContentLoaded', () => {
    // Pastikan DOM sudah sepenuhnya dimuat sebelum mencoba mengakses elemen
    const lottiePlayer = document.querySelector('lottie-player');

    if (lottiePlayer) {
        lottiePlayer.addEventListener('click', () => {
            lottiePlayer.seek(0); // Kembali ke awal animasi
            lottiePlayer.play(); // Putar ulang animasi
        });
    }
});