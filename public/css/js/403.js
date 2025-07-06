document.addEventListener('DOMContentLoaded', () => {
    const catLottiePlayer = document.querySelector('.lottie-animation'); 
    if (catLottiePlayer) {
        catLottiePlayer.addEventListener('click', () => {
            console.log('Lottie kucing 403 diklik!');
            catLottiePlayer.play(); 
        });
    }
});