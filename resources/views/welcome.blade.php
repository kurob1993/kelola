<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penagihan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi untuk testimonial bergerak */
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .testimonials-wrapper {
            display: flex;
            flex-wrap: nowrap;
            animation: marquee 40s linear infinite;
        }

        .testimonials-wrapper .bg-white {
            min-width: 450px;
        }
    </style>
</head>
<body class="bg-gray-800">
<!-- Navigation -->
<nav class="bg-gray-80 bg-opacity-40 shadow-md sticky top-0 z-50 backdrop-blur-md" style="backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-blue-600">Okuru.id</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#features" class="text-blue-500 hover:text-blue-600">Fitur</a>
                <a href="/admin/login" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block">Kelola Iuran Warga</span>
                <span class="block text-blue-600">Dengan Mudah dan Transparan</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl">
                Sistem manajemen pembayaran iuran yang efisien untuk warga
            </p>
            <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center">
                <div class="rounded-md shadow">
                    <a href="#"
                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                        Info Tagihan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div id="features" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">Fitur Utama</h2>
            <p class="mt-4 text-xl text-gray-600">Solusi komprehensif untuk manajemen keuangan warga</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm4 5a.5.5 0 11-1 0 .5.5 0 011 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-2">Pencatatan Transparan</h3>
                <p class="text-gray-600">Catat setiap pembayaran iuran secara rinci dan transparan</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-2">Perhitungan Otomatis</h3>
                <p class="text-gray-600">Sistem perhitungan iuran otomatis dan akurat</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-2">Keamanan Terjamin</h3>
                <p class="text-gray-600">Keamanan data dan transaksi menggunakan enkripsi terkini</p>
            </div>
        </div>
    </div>
</div>

<!-- Keunggulan Sistem Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">Keunggulan Sistem Kami</h2>
            <p class="mt-4 text-xl text-gray-600">Solusi terbaik untuk pengelolaan pembayaran iuran</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 rounded-lg shadow-lg ring-1 ring-slate-50 text-center">
                <h3 class="text-xl font-semibold mb-2">Akses Mudah dan Cepat</h3>
                <p class="text-gray-600">Akses sistem kapan saja dan di mana saja melalui perangkat apapun</p>
            </div>
            <div class="p-6 rounded-lg shadow-lg ring-1 ring-slate-50 text-center">
                <h3 class="text-xl font-semibold mb-2">Laporan Real-Time</h3>
                <p class="text-gray-600">Lihat laporan transaksi dan pembayaran secara langsung</p>
            </div>
            <div class="p-6 rounded-lg shadow-lg ring-1 ring-slate-50 text-center">
                <h3 class="text-xl font-semibold mb-2">Peningkatan Efisiensi</h3>
                <p class="text-gray-600">Proses otomatis yang menghemat waktu dan mengurangi kesalahan manusia</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimoni Pengguna -->
<div class="bg-gray-100 py-16">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">Testimoni Pengguna</h2>
            <p class="mt-4 text-xl text-gray-600">Apa kata mereka tentang pengalaman menggunakan sistem kami</p>
        </div>
        <div class="relative overflow-hidden">
            <div class="testimonials-wrapper flex animate-marquee">
                <!-- Testimoni 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Sistem ini sangat membantu dalam manajemen pembayaran iuran.
                        Penggunaannya sangat mudah dan laporan yang tersedia sangat membantu kami dalam pengambilan
                        keputusan."</p>
                    <p class="font-semibold">Budi Santoso</p>
                    <p class="text-gray-500">Ketua RT</p>
                </div>
                <!-- Testimoni 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Kami dapat memonitor pembayaran dengan lebih transparan. Keamanannya
                        juga sangat terjaga."</p>
                    <p class="font-semibold">Andi Wijaya</p>
                    <p class="text-gray-500">Pengguna</p>
                </div>
                <!-- Testimoni 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Layanan sistem ini sangat cepat dan mudah diakses oleh semua anggota
                        komunitas."</p>
                    <p class="font-semibold">Rina Puspita</p>
                    <p class="text-gray-500">Pengguna</p>
                </div>
                <!-- Testimoni 4 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Sistem ini sangat intuitif dan membantu saya mengelola keuangan
                        dengan lebih efisien."</p>
                    <p class="font-semibold">Dian Novita</p>
                    <p class="text-gray-500">Pengguna</p>
                </div>
                <!-- Testimoni 5 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Fitur pelaporan yang lengkap memungkinkan kami untuk memantau seluruh
                        transaksi dengan mudah."</p>
                    <p class="font-semibold">Agus Satria</p>
                    <p class="text-gray-500">Ketua Organisasi</p>
                </div>
                <!-- Testimoni 6 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Proses pembayaran yang cepat dan mudah diikuti oleh setiap anggota
                        sangat membantu."</p>
                    <p class="font-semibold">Siti Mariah</p>
                    <p class="text-gray-500">Anggota</p>
                </div>
                <!-- Testimoni 7 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Sistem yang sangat efektif dan memudahkan kami dalam manajemen
                        pembayaran secara online."</p>
                    <p class="font-semibold">Joko Widodo</p>
                    <p class="text-gray-500">Pengguna</p>
                </div>
                <!-- Testimoni 8 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Layanan sistem yang profesional dan efisien, sangat memudahkan kami
                        dalam pengelolaan keuangan."</p>
                    <p class="font-semibold">Irwan Setiawan</p>
                    <p class="text-gray-500">Manager</p>
                </div>
                <!-- Testimoni 9 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Kemudahan akses dan antarmuka yang ramah pengguna membuat sistem ini
                        sangat berguna bagi kami."</p>
                    <p class="font-semibold">Tina Anggraini</p>
                    <p class="text-gray-500">Administrator</p>
                </div>
                <!-- Testimoni 10 -->
                <div class="bg-white p-6 rounded-lg shadow-md mr-8">
                    <p class="text-gray-600 mb-4">"Sistem ini memberikan kenyamanan dalam mengelola dan melacak iuran
                        dengan lebih transparan."</p>
                    <p class="font-semibold">Dedi Kurniawan</p>
                    <p class="text-gray-500">Ketua RT</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div id="faq" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900">FAQ - Pertanyaan yang Sering Diajukan</h2>
            <p class="mt-4 text-xl text-gray-600">Kami jawab pertanyaan umum tentang penggunaan sistem ini</p>
        </div>
        <div class="space-y-6">
            <div class="border-b pb-4">
                <h3 class="font-semibold text-lg text-gray-900">Bagaimana cara mendaftar?</h3>
                <p class="text-gray-600">Proses pendaftaran cukup mudah, Anda hanya perlu memasukkan data pribadi dan
                    melengkapi beberapa informasi terkait pembayaran iuran.</p>
            </div>
            <div class="border-b pb-4">
                <h3 class="font-semibold text-lg text-gray-900">Apakah data saya aman?</h3>
                <p class="text-gray-600">Ya, data Anda dilindungi dengan sistem keamanan enkripsi yang modern dan kami
                    menjaga kerahasiaannya dengan sangat serius.</p>
            </div>
            <div class="border-b pb-4">
                <h3 class="font-semibold text-lg text-gray-900">Bisakah saya mengakses sistem dari perangkat lain?</h3>
                <p class="text-gray-600">Tentu, sistem ini dapat diakses dari perangkat apapun yang memiliki koneksi
                    internet dan browser.</p>
            </div>
        </div>
    </div>
</div>


<!-- CTA Section -->
<div class="bg-blue-700 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            <span class="block">Siap Mengoptimalkan Pengelolaan Iuran?</span>
            <span class="block text-blue-200 mt-2">Hubungi Kami Sekarang</span>
        </h2>
        <div class="mt-8 flex justify-center">
            <a href="#"
               class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Okuru.id</h3>
                <p class="text-gray-400">Sistem manajemen iuran modern untuk warga anda</p>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-300 mb-4">Layanan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Pencatatan Iuran</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Laporan Keuangan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-300 mb-4">Perusahaan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                    <!-- Previous content remains the same, continuing with the footer -->
                    <li><a href="#" class="text-gray-400 hover:text-white">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-gray-300 mb-4">Hubungi Kami</h4>
                <ul class="space-y-2">
                    <li class="flex items-center text-gray-400">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        (0254) 123-4567
                    </li>
                    <li class="flex items-center text-gray-400">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        info@okuru.id
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8 text-center">
            <p class="text-gray-400">&copy; 2024 Okuru.id Hak Cipta Dilindungi.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>


