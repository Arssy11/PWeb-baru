<?php
// F_POST.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form POST dengan Validasi & Sanitasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --bg: #f3f4f6;
            --card-bg: #ffffff;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
            --error: #b91c1c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 480px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            padding: 24px 20px;
        }

        .card-header {
            margin-bottom: 16px;
            text-align: center;
        }

        .card-title {
            margin: 0;
            font-size: 1.3rem;
            color: var(--text);
            font-weight: 600;
        }

        .card-subtitle {
            margin: 6px 0 0;
            font-size: 0.9rem;
            color: var(--muted);
        }

        form {
            margin-top: 12px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.25);
        }

        .hint {
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: 4px;
        }

        .actions {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        button,
        input[type="submit"],
        input[type="reset"] {
            border-radius: 999px;
            border: none;
            padding: 9px 16px;
            font-size: 0.9rem;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 4px;
            display: none;
        }

        @media (max-width: 480px) {
            .card {
                padding: 20px 16px;
            }

            .card-title {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Form Input Data (POST)</h1>
            <p class="card-subtitle">Latihan validasi & sanitasi data</p>
        </div>

        <form id="formPost" action="proses_post_sanitasi.php" method="post" novalidate>
            <!-- NAMA -->
            <div class="form-group">
                <label for="nama">Nama<span style="color:#ef4444">*</span></label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                <div id="namaError" class="error-message"></div>
                <p class="hint">Tidak boleh kosong dan tidak boleh mengandung angka.</p>
            </div>

            <!-- UMUR -->
            <div class="form-group">
                <label for="umur">Umur<span style="color:#ef4444">*</span></label>
                <input type="text" id="umur" name="umur" placeholder="Contoh: 20">
                <div id="umurError" class="error-message"></div>
                <p class="hint">Tidak boleh kosong dan hanya boleh angka (tanpa huruf).</p>
            </div>

            <!-- (opsional) FIELD TAMBAHAN -->
            <div class="form-group">
                <label for="alamat">Alamat (opsional)</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat">
            </div>

            <div class="actions">
                <input type="submit" name="submit" value="Kirim" class="btn-primary">
                <input type="reset" value="Reset" class="btn-secondary">
            </div>
        </form>
    </div>
</div>

<script>
    // VALIDASI FORM DI CLIENT SIDE (JavaScript)
    document.getElementById('formPost').addEventListener('submit', function (e) {
        const namaInput = document.getElementById('nama');
        const umurInput = document.getElementById('umur');
        const namaError = document.getElementById('namaError');
        const umurError = document.getElementById('umurError');

        let isValid = true;

        // Reset pesan error
        namaError.style.display = 'none';
        umurError.style.display = 'none';
        namaError.textContent = '';
        umurError.textContent = '';

        const nama = namaInput.value.trim();
        const umur = umurInput.value.trim();

        // Validasi Nama: tidak boleh kosong
        if (nama === '') {
            alert('Isian Nama kosong. Silakan isi terlebih dahulu.');
            namaError.textContent = 'Isian Nama tidak boleh kosong.';
            namaError.style.display = 'block';
            namaInput.focus();
            isValid = false;
        }
        // Validasi Nama: tidak boleh mengandung angka
        else if (/\d/.test(nama)) {
            alert('Isian tidak boleh mengandung angka.');
            namaError.textContent = 'Isian tidak boleh mengandung angka.';
            namaError.style.display = 'block';
            namaInput.focus();
            isValid = false;
        }

        // Validasi Umur: tidak boleh kosong
        if (isValid) { // hanya lanjut jika nama sudah valid
            if (umur === '') {
                alert('Isian Umur kosong.');
                umurError.textContent = 'Isian Umur tidak boleh kosong.';
                umurError.style.display = 'block';
                umurInput.focus();
                isValid = false;
            }
            // Validasi Umur: tidak boleh mengandung huruf
            else if (/[a-zA-Z]/.test(umur)) {
                alert('Isian tidak boleh mengandung huruf.');
                umurError.textContent = 'Isian tidak boleh mengandung huruf.';
                umurError.style.display = 'block';
                umurInput.focus();
                isValid = false;
            }
        }

        if (!isValid) {
            e.preventDefault(); // stop submit ke server
        }
    });
</script>
</body>
</html>
