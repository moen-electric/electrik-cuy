<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Meow!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    
    <link href="{{ asset('css/404.css') }}" rel="stylesheet">
    
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <div class="container">
        <lottie-player
            src="{{ asset('lottie/cat-confused.json') }}" {{-- **PENTING: Ganti placeholder ini!** --}}
            background="transparent"
            speed="1"
            loop
            autoplay
            class="lottie-animation"
        ></lottie-player>
        <p>Sepertinya kucing kami telah menyembunyikan halaman yang Anda cari! Meong...</p>
        <p> tapi jangan khawatir, Anda bisa kembali ke rumah.</p>
        <a href="{{ url('/') }}" class="button-home">Kembali ke Beranda</a>
    </div>

    <script src="{{ asset('js/404.js') }}"></script>
</body>
</html>