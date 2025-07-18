<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Halaman Error - IAS Hospitality</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #182659;
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 22px 22px;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .navigation {
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .nav-btn {
            background-color: #04b0c0;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.3s ease;
            opacity: 0.8;
        }

        .nav-btn:hover,
        .nav-btn.active {
            opacity: 1;
            box-shadow: 0 4px 12px rgba(4, 176, 192, 0.4);
        }

        .error-container {
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            max-width: 600px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .error-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .error-code {
            font-size: 6rem;
            font-weight: 800;
            color: #04b0c0;
        }

        .error-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .error-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.85;
        }

        .btn-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 28px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-primary {
            background-color: #04b0c0;
            color: #ffffff;
        }

        .btn-secondary {
            background-color: #ffffff;
            color: #182659;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(4, 176, 192, 0.3);
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 4rem;
            }

            .error-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div id="error-content" class="error-container">
    <!-- Isi error akan dimuat di sini -->
</div>

<script>
    const errorPages = {
        '404': {
            code: '404',
            title: 'Halaman Tidak Ditemukan',
            description: 'Maaf, kami tidak dapat menemukan halaman yang Anda cari. Staf kami siap membantu.',
            icon: '🛎️'
        },
        '400': {
            code: '400',
            title: 'Permintaan Tidak Valid',
            description: 'Terdapat kesalahan dalam permintaan Anda. Silakan periksa kembali atau hubungi layanan tamu.',
            icon: '📋'
        },
        '401': {
            code: '401',
            title: 'Akses Tidak Sah',
            description: 'Silakan login terlebih dahulu untuk mengakses halaman ini.',
            icon: '🔐'
        },
        '403': {
            code: '403',
            title: 'Akses Ditolak',
            description: 'Anda tidak memiliki izin untuk melihat halaman ini. Mohon hubungi staf kami.',
            icon: '🚫'
        },
        '500': {
            code: '500',
            title: 'Kesalahan Server',
            description: 'Sistem kami sedang mengalami gangguan. Kami akan segera memperbaikinya.',
            icon: '🛠️'
        },
        '502': {
            code: '502',
            title: 'Gangguan Jaringan',
            description: 'Server tidak merespons dengan benar. Silakan coba beberapa saat lagi.',
            icon: '📡'
        },
        '503': {
            code: '503',
            title: 'Sedang Pemeliharaan',
            description: 'Layanan sedang dalam pemeliharaan. Kami akan segera kembali melayani Anda.',
            icon: '☕'
        }
    };

    function showError(code, targetElement = null) {
        const error = errorPages[code];
        const content = document.getElementById('error-content');

        content.innerHTML = `
        <div class="error-icon">${error.icon}</div>
        <div class="error-code">${error.code}</div>
        <div class="error-title">${error.title}</div>
        <div class="error-description">${error.description}</div>
        <div class="btn-container">
          <a href="#" class="btn btn-primary" onclick="goHome()">🏠 Beranda</a>
          <a href="#" class="btn btn-secondary" onclick="goBack()">↩️ Kembali</a>
        </div>
      `;

        document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));
        if (targetElement) {
            targetElement.classList.add('active');
        }
    }

    function goHome() {
        window.location.href = '/admin';
    }

    function goBack() {
        window.history.back();
    }

    showError('404');
</script>
</body>
</html>
