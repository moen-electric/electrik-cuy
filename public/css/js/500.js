document.addEventListener('DOMContentLoaded', () => {
    // Mengambil elemen Lottie player berdasarkan class-nya
    const catLottiePlayer = document.querySelector('.lottie-animation'); 

    // Contoh interaktivitas Lottie saat diklik (opsional)
    if (catLottiePlayer) { // Pastikan elemen Lottie ada di halaman
        catLottiePlayer.addEventListener('click', () => {
            console.log('Lottie kucing 500 diklik!');
            // Anda bisa memutar ulang animasi atau memicu segmen tertentu
            catLottiePlayer.play(); 
            // Atau jika animasi Lottie Anda memiliki segmen untuk "reaksi" terhadap klik:
            // catLottiePlayer.playSegments([startFrame, endFrame], true);
        });
    }
});