<?php
// proses_post_sanitasi.php

// Pastikan form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: F_POST.php');
    exit;
}

// Mengecek apakah tombol submit ada (pakai isset sesuai catatan tugas)
if (!isset($_POST['submit'])) {
    header('Location: F_POST.php');
    exit;
}

// Fungsi sanitasi dasar
function sanitize_input($data) {
    $data = trim($data);              // hapus spasi di awal/akhir
    $data = strip_tags($data);        // hilangkan tag HTML / PHP
    $data = stripslashes($data);      // hilangkan backslash
    $data = htmlspecialchars($data);  // encode karakter spesial
    return $data;
}

// Ambil & sanitasi data
$nama   = isset($_POST['nama'])   ? sanitize_input($_POST['nama'])   : '';
$umur   = isset($_POST['umur'])   ? sanitize_input($_POST['umur'])   : '';
$alamat = isset($_POST['alamat']) ? sanitize_input($_POST['alamat']) : '';

// Bisa juga diberi default jika kosong
if ($nama === '')  { $nama   = '-'; }
if ($umur === '')  { $umur   = '-'; }
if ($alamat === '') { $alamat = '-'; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil POST (Dengan Sanitasi)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --bg: #f3f4f6;
            --card-bg: #ffffff;
            --primary: #2563eb;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
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
            max-width: 520px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            padding: 24px 20px;
        }

        .card-header {
            margin-bottom: 16px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
            font-size: 0.95rem;
        }

        th, td {
            padding: 8px 10px;
            border-bottom: 1px solid var(--border);
            text-align: left;
        }

        th {
            width: 35%;
            font-weight: 600;
        }

        .actions {
            margin-top: 16px;
        }

        a.button-link {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 999px;
            text-decoration: none;
            background: var(--primary);
            color: #fff;
            font-size: 0.9rem;
            font-weight: 500;
        }

        a.button-link:hover {
            filter: brightness(0.95);
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
            <h1 class="card-title">Hasil Data dari Form POST</h1>
            <p class="card-subtitle">Data berikut sudah melalui proses sanitasi dasar di server.</p>
        </div>

        <table>
            <tr>
                <th>Nama</th>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?php echo $umur; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $alamat; ?></td>
            </tr>
        </table>

        <div class="actions">
            <a href="F_POST.php" class="button-link">Kembali ke Form</a>
        </div>
    </div>
</div>
</body>
</html>
