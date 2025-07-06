<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Internal Server Error - Ups!</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/500.css') }}" rel="stylesheet">
    
    {{-- Lottie Web Player dari CDN --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <div class="container">
        <h1>500</h1> 
        <h2>Ups! Server Kami Bermasalah.</h2>

        <lottie-player
            src="{{ asset('lottie/500.json') }}" {{-- **PENTING: GANTI DENGAN JALUR LOTTIE ANIMASI KUCING UNTUK EROR SERVER ANDA** --}}
            background="transparent"
            speed="1"
            loop
            autoplay
            class="lottie-animation" {{-- Gunakan class untuk styling dan JS --}}
            aria-label="Animasi kucing memperbaiki server yang rusak"
        ></lottie-player>
        
        <p class="message">Maaf, ada masalah teknis di server kami.</p>
        <p class="message">Kucing-kucing teknisi kami sedang bekerja keras untuk memperbaikinya!</p>
        
        <a href="{{ url('/') }}" class="button-home">
            <span class="button-icon" aria-hidden="true">🐾</span> Kembali ke Beranda
        </a>
    </div>

    {{-- Script 500.js mungkin tidak diperlukan jika hanya untuk interaksi Lottie --}}
    <script src="{{ asset('js/500.js') }}"></script>
</body>
</html>