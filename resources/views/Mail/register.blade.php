<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aktivasi Akun - Inventaris BEM FTI</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }

        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Selamat Datang di Inventaris BEM FTI!</h1>
        </div>

        <p>Halo,</p>

        <p>Terima kasih telah mendaftar di sistem Inventaris BEM FTI. Untuk mengaktifkan akun Anda, silakan klik tombol
            di bawah ini:</p>

        <div style="text-align: center;">
            <a href="{{ $url }}" class="btn">Aktivasi Akun</a>
        </div>

        <div class="warning">
            <strong>⚠️ Penting:</strong> Link aktivasi ini hanya berlaku selama <strong>30 menit</strong> dari waktu
            pengiriman email ini.
        </div>

        <p>Jika tombol di atas tidak bekerja, Anda dapat menyalin dan menempelkan URL berikut ke browser Anda:</p>
        <p style="word-break: break-all; background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
            {{ $url }}
        </p>

        <p>Jika Anda tidak mendaftar untuk akun ini, silakan abaikan email ini.</p>

        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Inventaris BEM FTI.</p>
            <p>Jangan balas email ini.</p>
        </div>
    </div>
</body>

</html>
