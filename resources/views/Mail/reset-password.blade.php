<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - Inventaris BEM FTI</title>
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
            background-color: #dc2626;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #b91c1c;
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

        .security-note {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Reset Password - Inventaris BEM FTI</h1>
        </div>

        <p>Halo,</p>

        <p>Kami menerima permintaan untuk mereset password akun Anda di sistem Inventaris BEM FTI. Jika Anda yang
            melakukan permintaan ini, silakan klik tombol di bawah ini:</p>

        <div style="text-align: center;">
            <a href="{{ $url }}" class="btn">Reset Password</a>
        </div>

        <div class="warning">
            <strong>⚠️ Penting:</strong> Link reset password ini hanya berlaku selama <strong>30 menit</strong> dari
            waktu pengiriman email ini.
        </div>

        <div class="security-note">
            <strong>🔒 Keamanan:</strong> Jika Anda tidak meminta reset password, abaikan email ini. Password Anda tidak
            akan berubah dan akun Anda tetap aman.
        </div>

        <p>Jika tombol di atas tidak bekerja, Anda dapat menyalin dan menempelkan URL berikut ke browser Anda:</p>
        <p style="word-break: break-all; background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
            {{ $url }}
        </p>

        <p><strong>Tips keamanan:</strong></p>
        <ul>
            <li>Gunakan password yang kuat dan unik</li>
            <li>Kombinasikan huruf besar, kecil, angka, dan simbol</li>
            <li>Jangan bagikan password kepada siapa pun</li>
            <li>Gunakan password yang berbeda untuk setiap akun</li>
        </ul>

        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Inventaris BEM FTI.</p>
            <p>Jangan balas email ini.</p>
            <p>Jika Anda memiliki pertanyaan, hubungi administrator sistem.</p>
        </div>
    </div>
</body>

</html>
