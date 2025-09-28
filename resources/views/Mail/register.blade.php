<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aktivasi Akun - Inventaris BEM FTI</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.7;
            color: #e5e7eb;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            min-height: 100vh;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(145deg, #374151 0%, #1f2937 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(229, 231, 235, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
            pointer-events: none;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            font-weight: 400;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #f9fafb;
            margin-bottom: 24px;
        }

        .message {
            font-size: 15px;
            color: #d1d5db;
            margin-bottom: 32px;
            line-height: 1.8;
        }

        .btn-container {
            text-align: center;
            margin: 32px 0;
        }

        .btn {
            display: inline-block;
            padding: 16px 32px;
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            box-shadow:
                0 10px 25px -3px rgba(5, 150, 105, 0.4),
                0 4px 6px -2px rgba(5, 150, 105, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(5, 150, 105, 0.3);
        }

        .alert-box {
            padding: 20px;
            border-radius: 12px;
            margin: 24px 0;
            border-left: 4px solid;
        }

        .warning {
            background: linear-gradient(135deg, #fbbf24 10%, #f59e0b 100%);
            border-left-color: #fbbf24;
            color: #92400e;
        }

        .welcome-note {
            background: linear-gradient(135deg, #3b82f6 10%, #2563eb 100%);
            border-left-color: #3b82f6;
            color: white;
        }

        .url-box {
            background: #1f2937;
            border: 1px solid #374151;
            padding: 16px;
            border-radius: 8px;
            word-break: break-all;
            font-family: 'Monaco', 'Menlo', monospace;
            font-size: 13px;
            color: #9ca3af;
            margin: 16px 0;
        }

        .welcome-section {
            background: linear-gradient(135deg, #065f46 10%, #047857 100%);
            padding: 24px;
            border-radius: 12px;
            margin: 32px 0;
            border: 1px solid rgba(5, 150, 105, 0.3);
        }

        .welcome-header {
            color: white;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
        }

        .welcome-icon {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        .welcome-list {
            list-style: none;
            padding: 0;
        }

        .welcome-list li {
            color: rgba(255, 255, 255, 0.9);
            padding: 8px 0;
            padding-left: 24px;
            position: relative;
            font-size: 14px;
        }

        .welcome-list li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: #34d399;
            font-size: 12px;
        }

        .footer {
            background: #111827;
            padding: 30px;
            text-align: center;
            border-top: 1px solid rgba(229, 231, 235, 0.1);
        }

        .footer p {
            color: #9ca3af;
            font-size: 13px;
            margin: 8px 0;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(229, 231, 235, 0.1) 50%, transparent 100%);
            margin: 32px 0;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }

            .content {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <!-- Premium Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo-container">
                    <i class="fas fa-user-plus" style="font-size: 32px; color: white;"></i>
                </div>
                <h1>Selamat Datang!</h1>
                <p>Inventaris BEM FTI</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="greeting">Halo dan Selamat Datang!</div>

            <div class="message">
                Terima kasih telah bergabung dengan sistem <strong>Inventaris BEM FTI</strong>.
                Untuk menyelesaikan proses pendaftaran dan mengaktifkan akun Anda, silakan klik tombol aktivasi di bawah
                ini.
            </div>

            <!-- Welcome Benefits -->
            <div class="welcome-section">
                <div class="welcome-header">
                    <div class="welcome-icon">
                        <i class="fas fa-star" style="color: white; font-size: 14px;"></i>
                    </div>
                    Manfaat Bergabung dengan Inventaris BEM FTI
                </div>
                <ul class="welcome-list">
                    <li>Akses penuh ke sistem manajemen inventaris</li>
                    <li>Fitur peminjaman dan pengembalian barang yang mudah</li>
                    <li>Tracking real-time status inventaris</li>
                    <li>Notifikasi otomatis untuk deadline pengembalian</li>
                    <li>Dashboard yang user-friendly dan responsif</li>
                </ul>
            </div>

            <!-- CTA Button -->
            <div class="btn-container">
                <a href="{{ $url }}" class="btn">
                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                    Aktivasi Akun Sekarang
                </a>
            </div>

            <!-- Warning Alert -->
            <div class="alert-box warning">
                <i class="fas fa-clock" style="margin-right: 8px;"></i>
                <strong>Penting:</strong> Link aktivasi ini hanya berlaku selama <strong>30 menit</strong> dari waktu
                pengiriman email ini. Segera lakukan aktivasi untuk menggunakan akun Anda.
            </div>

            <!-- Welcome Note -->
            <div class="alert-box welcome-note">
                <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                <strong>Catatan:</strong> Setelah aktivasi berhasil, Anda dapat langsung login dan mulai menggunakan
                semua fitur yang tersedia dalam sistem inventaris.
            </div>

            <div class="divider"></div>

            <!-- Alternative URL -->
            <div class="message">
                <strong>Tombol tidak berfungsi?</strong><br>
                Salin dan tempelkan URL berikut ke browser Anda:
            </div>
            <div class="url-box">{{ $url }}</div>

            <!-- Additional Info -->
            <div class="message" style="font-size: 14px; color: #9ca3af; margin-top: 24px;">
                <strong>Tidak mendaftar untuk akun ini?</strong><br>
                Jika Anda tidak pernah mendaftar di sistem Inventaris BEM FTI, silakan abaikan email ini dengan aman.
                Tidak ada tindakan lebih lanjut yang diperlukan.
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Inventaris BEM FTI</strong></p>
            <p>Email aktivasi dikirim secara otomatis oleh sistem registrasi kami.</p>
            <p>Jangan membalas email ini. Untuk bantuan, hubungi administrator sistem.</p>
            <p style="margin-top: 16px; color: #6b7280;">© 2024 BEM FTI. Semua hak dilindungi.</p>
        </div>
    </div>
</body>

</html>
