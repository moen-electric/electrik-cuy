<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Akses Ditolak! | Kucing Penjaga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/403.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <div class="container">
        {{-- Judul 403 --}}
        <h1>403</h1> 
        <h2>Meong! Akses Ditolak.</h2>

        <lottie-player
            src="{{ asset('lottie/403.json') }}" {{-- **PASTIKAN JALUR INI BENAR untuk animasi 403 Anda** --}}
            background="transparent"
            speed="1"
            loop
            autoplay
            class="lottie-animation" {{-- Gunakan class untuk styling dan JS --}}
            aria-label="Animasi kucing penjaga"
        ></lottie-player>
        
        <p class="message">Sepertinya Anda tidak memiliki izin untuk melihat halaman ini.</p>
        <p class="message">Kucing penjaga kami sedang berpatroli dan menghalangi jalan Anda.</p>
        
        <a href="{{ url('/') }}" class="button-home">
            <span class="button-icon" aria-hidden="true">🐾</span> Kembali ke Beranda
        </a>
    </div>
    <script src="{{ asset('js/403.js') }}"></script>
</body>
</html>