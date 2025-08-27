<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sistem Iuran Warga - Kelola Iuran Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative bg-white text-[#404041] font-inter min-h-screen overflow-x-hidden">
<!-- Motif background SVG grid pattern -->
<div aria-hidden="true" class="pointer-events-none fixed inset-0 z-0">
    <svg width="100%" height="100%" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#6366f1" stroke-opacity="0.07" stroke-width="1"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#grid)"/>
    </svg>
</div>
<div id="app" class="relative z-10">
    <!-- Header -->
    <header id="page-header"
        class="sticky top-0 z-50 bg-white/20 backdrop-blur border-b border-gray-200 h-16 flex items-center px-4 shadow-sm transition-colors duration-300 ease-in-out">
        <nav class="flex items-center justify-between w-full max-w-7xl mx-auto">
            <div id="page-logo" class="text-2xl font-bold text-[#6366f1] select-none flex items-center gap-2 transition-colors duration-300 ease-in-out" tabindex="0" aria-label="Sistem Iuran Warga logo">
                Iuran Warga
            </div>
            <div id="header-nav-links" class="hidden md:flex gap-8 items-center">
                <a href="#home" class="px-4 py-2 rounded-full bg-[#ffffff]/30 shadow-md border border-gray-200 font-semibold text-[#404041] hover:text-[#6366f1] transition-colors duration-300 ease-in-out"
                   tabindex="0">Beranda</a>
                <a href="#features" class="px-4 py-2 rounded-full bg-[#ffffff]/30 shadow-md border border-gray-200 font-semibold text-[#404041] hover:text-[#6366f1] transition-colors duration-300 ease-in-out"
                   tabindex="0">Fitur</a>
                <a href="#benefits" class="px-4 py-2 rounded-full bg-[#ffffff]/30 shadow-md border border-gray-200 font-semibold text-[#404041] hover:text-[#6366f1] transition-colors duration-300 ease-in-out"
                   tabindex="0">Keunggulan</a>
                <a href="#contact" class="px-4 py-2 rounded-full bg-[#ffffff]/30 shadow-md border border-gray-200 font-semibold text-[#404041] hover:text-[#6366f1] transition-colors duration-300 ease-in-out"
                   tabindex="0">Kontak</a>
            </div>
            <a href="/admin/login"
                class="ml-4 px-5 py-2 rounded-full bg-[#6366f1] shadow font-semibold text-white hover:bg-[#5856eb] transition">
                Login Admin
            </a>
        </nav>
    </header>
    <main tabindex="-1">
        <!-- Hero Section -->
        <section
            class="relative flex items-center justify-center min-h-[calc(100vh-4rem)] px-4 text-center overflow-hidden"
            id="home" aria-label="Hero banner">
            <div class="relative z-10 max-w-3xl mx-auto">
                <h1 class="mb-4 text-4xl md:text-6xl font-extrabold text-gray-900 animate-fadeInUp"
                    tabindex="0">
                    <span class="block">Kelola Iuran Warga</span>
                    <span class="block text-[#6366f1]">Dengan Mudah dan Transparan</span>
                </h1>
                <p class="mb-8 text-lg md:text-xl text-gray-600 animate-fadeInUp" tabindex="0">
                    Sistem manajemen pembayaran iuran yang efisien untuk warga. Catat, kelola, dan monitor pembayaran iuran RT/RW secara digital dengan fitur lengkap dan mudah digunakan.
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-fadeInUp">
                    <a href="#features"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#6366f1] shadow font-semibold text-white hover:bg-[#5856eb] transition">
                        <span class="material-icons">explore</span> Jelajahi Fitur
                    </a>
                    <a href="https://wa.me/628999702143?text=info-iuran"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-transparent border border-[#6366f1] shadow font-semibold text-[#6366f1] hover:bg-[#6366f1] hover:text-white transition">
                        <span class="material-icons">chat</span> Info Tagihan
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="max-w-7xl mx-auto py-16 px-4" id="features" aria-label="Features offered">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-center text-gray-900" tabindex="0">Fitur Utama</h2>
            <p class="text-lg text-gray-600 mb-10 text-center" tabindex="0">Solusi komprehensif untuk manajemen keuangan warga</p>
            <div class="grid gap-8 md:grid-cols-3">
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="feature1-title">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-xl bg-indigo-100 mb-4 shadow-lg">
                        <span class="material-icons text-[#6366f1] text-3xl">receipt_long</span>
                    </div>
                    <h3 id="feature1-title" class="text-xl font-semibold mb-2 text-gray-900">Pencatatan Transparan</h3>
                    <p class="text-gray-600 mb-4">Catat setiap pembayaran iuran secara rinci dan transparan. Histori lengkap dengan bukti pembayaran digital.</p>
                </article>
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="feature2-title">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-xl bg-green-100 mb-4 shadow-lg">
                        <span class="material-icons text-green-600 text-3xl">calculate</span>
                    </div>
                    <h3 id="feature2-title" class="text-xl font-semibold mb-2 text-gray-900">Perhitungan Otomatis</h3>
                    <p class="text-gray-600 mb-4">Sistem perhitungan iuran otomatis dan akurat. Kelola tagihan bulanan, denda, dan cicilan dengan mudah.</p>
                </article>
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="feature3-title">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-xl bg-purple-100 mb-4 shadow-lg">
                        <span class="material-icons text-purple-600 text-3xl">security</span>
                    </div>
                    <h3 id="feature3-title" class="text-xl font-semibold mb-2 text-gray-900">Keamanan Terjamin</h3>
                    <p class="text-gray-600 mb-4">Keamanan data dan transaksi menggunakan enkripsi terkini. Data warga dan keuangan terlindungi dengan baik.</p>
                </article>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="max-w-7xl mx-auto py-16 px-4" id="benefits" aria-label="Platform benefits highlight">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-center text-gray-900" tabindex="0">Keunggulan Sistem Kami</h2>
            <p class="text-lg text-gray-600 mb-10 text-center" tabindex="0">Mengapa memilih sistem iuran warga digital</p>
            <div class="grid gap-8 md:grid-cols-4">
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="benefit1-title">
                    <div
                        class="flex items-center justify-center w-20 h-20 rounded-full bg-indigo-100 mb-4 shadow-lg">
                        <span class="material-icons text-[#6366f1] text-4xl">speed</span>
                    </div>
                    <h4 id="benefit1-title" class="text-lg font-semibold mb-1 text-gray-900">Akses Mudah dan Cepat</h4>
                    <p class="text-gray-600 mb-4">Akses sistem kapan saja dan di mana saja melalui perangkat apapun dengan koneksi internet</p>
                </article>
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="benefit2-title">
                    <div
                        class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100 mb-4 shadow-lg">
                        <span class="material-icons text-green-600 text-4xl">assessment</span>
                    </div>
                    <h4 id="benefit2-title" class="text-lg font-semibold mb-1 text-gray-900">Laporan Real-Time</h4>
                    <p class="text-gray-600 mb-4">Lihat laporan transaksi and pembayaran secara langsung dengan dashboard yang informatif</p>
                </article>
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="benefit3-title">
                    <div
                        class="flex items-center justify-center w-20 h-20 rounded-full bg-purple-100 mb-4 shadow-lg">
                        <span class="material-icons text-purple-600 text-4xl">trending_up</span>
                    </div>
                    <h4 id="benefit3-title" class="text-lg font-semibold mb-1 text-gray-900">Peningkatan Efisiensi</h4>
                    <p class="text-gray-600 mb-4">Proses otomatis yang menghemat waktu dan mengurangi kesalahan manusia dalam pengelolaan</p>
                </article>
                <article
                    class="bg-white border border-gray-200/80 rounded-3xl p-8 shadow-lg flex flex-col items-center text-center hover:-translate-y-2 transition"
                    role="listitem" tabindex="0" aria-labelledby="benefit4-title">
                    <div
                        class="flex items-center justify-center w-20 h-20 rounded-full bg-orange-100 mb-4 shadow-lg">
                        <span class="material-icons text-orange-600 text-4xl">group</span>
                    </div>
                    <h4 id="benefit4-title" class="text-lg font-semibold mb-1 text-gray-900">Transparansi Penuh</h4>
                    <p class="text-gray-600 mb-4">Semua warga dapat melihat riwayat pembayaran dan penggunaan dana iuran secara transparan</p>
                </article>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="relative bg-[#6366f1] py-16 px-4 text-center overflow-hidden" id="cta"
                 aria-label="Call to action">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0">
                <svg width="100%" height="100%" class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="wavy-lines" patternUnits="userSpaceOnUse" width="100" height="20" patternTransform="rotate(45)">
                            <path d="M 0 10 C 25 0, 75 20, 100 10" stroke="#ffffff" stroke-width="1" fill="none" stroke-opacity="0.05"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#wavy-lines)"/>
                </svg>
            </div>
            <div class="relative z-10 max-w-xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-white" tabindex="0">Siap Mengoptimalkan Pengelolaan Iuran?</h2>
                <p class="text-lg text-indigo-200 mb-8" tabindex="0">Hubungi kami sekarang untuk konsultasi gratis dan demo sistem iuran warga digital</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/628999702143?text=Konsultasi%20Sistem%20Iuran%20Warga"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white shadow font-semibold text-[#6366f1] hover:bg-gray-100 transition">
                        <span class="material-icons">chat</span> Konsultasi Gratis
                    </a>
                    <a href="/admin/login"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-transparent border border-white shadow font-semibold text-white hover:bg-white hover:text-[#6366f1] transition">
                        <span class="material-icons">login</span> Demo Sistem
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer / Kontak -->
        <footer
            class="bg-gray-800 py-12 px-4 mt-12"
            id="contact" role="contentinfo" aria-label="Footer information">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <section aria-label="About Sistem Iuran Warga">
                    <h3 class="text-lg font-bold mb-2 text-[#6366f1]">Sistem Iuran Warga</h3>
                    <p class="text-gray-300">Solusi digital untuk pengelolaan iuran RT/RW yang transparan, efisien, dan mudah digunakan.</p>
                </section>
                <section aria-label="Features links">
                    <h3 class="text-lg font-bold mb-2 text-[#6366f1]">Fitur</h3>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Pencatatan Iuran</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Laporan Keuangan</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Manajemen Warga</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Notifikasi WhatsApp</a>
                </section>
                <section aria-label="Support links">
                    <h3 class="text-lg font-bold mb-2 text-[#6366f1]">Dukungan</h3>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Bantuan</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">FAQ</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Hubungi Kami</a>
                    <a href="#" class="block text-gray-300 hover:text-[#6366f1] mb-1">Syarat &amp; Ketentuan</a>
                </section>
                <section aria-label="Contact information">
                    <h3 class="text-lg font-bold mb-2 text-[#6366f1]">Kontak</h3>
                    <p class="text-gray-300 mb-1">
                        Email: <a href="mailto:info@markasdev.my.id" class="hover:text-[#6366f1]">info@markasdev.my.id</a>
                    </p>
                    <p class="text-gray-300 mb-1">
                        WhatsApp: <a href="https://wa.me/628999702143" class="hover:text-[#6366f1]">+62 899-9702-143</a>
                    </p>
                    <p class="text-gray-300 mb-1">Lokasi: Indonesia</p>
                </section>
            </div>
            <div class="text-center text-gray-500 text-sm opacity-60">&copy; 2025 Sistem Iuran Warga. Hak Cipta Dilindungi.
            </div>
        </footer>
    </main>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Header scroll effect removed - static header design
        console.log('Static header loaded');
    });
</script>
</body>
</html>
