@extends('layouts.main')

@section('container')

    <section class="contact-sq-section" style="padding-top: 80px">
        <div class="contact-sq-card">
        <div class="contact-sq-left">
            <h2>Contact <span>Us</span></h2>
            <div class="sq-info-list">
            <div class="sq-info-item">
                <span class="sq-icon"><i class="fas fa-phone-alt"></i></span>
                <div>
                <span class="sq-label">Telepon:</span>
                <div class="sq-row-copy">
                    <p>+62 123-456-789 <button class="copy-btn" onclick="copyToClipboard('+62123456789')"><i class="fa fa-copy"></i></button></p>
                    <p>+62 987-654-321 <button class="copy-btn" onclick="copyToClipboard('+62987654321')"><i class="fa fa-copy"></i></button></p>
                </div>
                </div>
            </div>
            <div class="sq-info-item">
                <span class="sq-icon"><i class="fas fa-envelope"></i></span>
                <div>
                <span class="sq-label">Email:</span>
                <div class="sq-row-copy">
                    <p>demo@example.com <button class="copy-btn" onclick="copyToClipboard('rambe5g@gmail.com')"><i class="fa fa-copy"></i></button></p>
                    <p>support@example.com <button class="copy-btn" onclick="copyToClipboard('kostrambe@gmail.com')"><i class="fa fa-copy"></i></button></p>
                </div>
                </div>
            </div>
            <div class="sq-info-item">
                <span class="sq-icon"><i class="fas fa-globe"></i></span>
                <div>
                <span class="sq-label">Website:</span>
                <p><a href="https://www.example.com" target="_blank">www.rambe5g.com</a></p>
                </div>
            </div>
            <div class="sq-info-item">
                <span class="sq-icon"><i class="fas fa-map-marker-alt"></i></span>
                <div>
                <span class="sq-label">Alamat:</span>
                <p>Jalan Mawar No. 123, Jakarta, Indonesia</p>
                </div>
            </div>
            <div class="sq-info-item">
                <span class="sq-icon"><i class="fas fa-clock"></i></span>
                <div>
                <span class="sq-label">Jam Operasional:</span>
                <p>Senin - Jumat: 09.00 - 17.00 WIB<br>Sabtu - Minggu: Tutup</p>
                </div>
            </div>
            </div>
            <div class="sq-social-section">
            <p>Social Media</p>
            <div class="sq-social-icons">
                <a href="#" class="fb" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="tw" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="yt" title="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" class="ig" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="wa" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="li" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="tg" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
            </div>
            </div>
            <div class="sq-qrwa">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://wa.me/62123456789&size=80x80" alt="QR WhatsApp">
            <span>Scan WhatsApp</span>
            </div>
            <div class="sq-faq">
            <details>
                <summary><i class="fa fa-question-circle"></i> FAQ: Cara Menghubungi Kami?</summary>
                <div>Silakan klik ikon WhatsApp atau email, atau langsung scan QR di atas untuk chat instan.</div>
            </details>
            <details>
                <summary><i class="fa fa-question-circle"></i> FAQ: Apakah bisa kunjungan langsung?</summary>
                <div>Silakan hubungi kami dulu untuk booking jadwal pertemuan.</div>
            </details>
            </div>
        </div>
        <div class="contact-sq-right">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.333441297273!2d106.81666641476937!3d-6.20000009551198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3ef7ef4e1ed%3A0x1ab3f457cd4db1a7!2sJakarta!5e0!3m2!1sen!2sid!4v1685647890123!5m2!1sen!2sid"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        </div>
    </section>
    <script>
        function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        alert("Disalin: " + text);
        }
    </script>

@endsection
