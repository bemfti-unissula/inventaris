<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - Inventaris BEM FTI</title>
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
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
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

        .logo {
            max-width: 50px;
            height: auto;
            filter: brightness(0) invert(1);
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
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 
                0 10px 25px -3px rgba(220, 38, 38, 0.4),
                0 4px 6px -2px rgba(220, 38, 38, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(220, 38, 38, 0.3);
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

        .security-note {
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

        .tips-section {
            background: linear-gradient(135deg, #1e3a8a 10%, #1d4ed8 100%);
            padding: 24px;
            border-radius: 12px;
            margin: 32px 0;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .tips-header {
            color: white;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
        }

        .tips-icon {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }



        .tips-list {
            list-style: none;
            padding: 0;
        }

        .tips-list li {
            color: rgba(255, 255, 255, 0.9);
            padding: 8px 0;
            padding-left: 24px;
            position: relative;
            font-size: 14px;
        }

        .tips-list li::before {
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
                    <i class="fas fa-lock" style="font-size: 32px; color: white;"></i>
                </div>
                <h1>Reset Password</h1>
                <p>Inventaris BEM FTI</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="greeting">Halo!</div>

            <div class="message">
                Kami menerima permintaan untuk mereset password akun Anda di sistem <strong>Inventaris BEM FTI</strong>. 
                Jika Anda yang melakukan permintaan ini, silakan klik tombol di bawah untuk melanjutkan proses reset password.
            </div>

            <!-- CTA Button -->
            <div class="btn-container">
                <a href="{{ $url }}" class="btn">
                    <i class="fas fa-key" style="margin-right: 8px;"></i>
                    Reset Password Sekarang
                </a>
            </div>

            <!-- Warning Alert -->
            <div class="alert-box warning">
                <i class="fas fa-exclamation-triangle" style="margin-right: 8px;"></i>
                <strong>Penting:</strong> Link reset password ini hanya berlaku selama <strong>30 menit</strong> dari waktu pengiriman email ini. Pastikan Anda menggunakannya sebelum expired.
            </div>

            <!-- Security Note -->
            <div class="alert-box security-note">
                <i class="fas fa-shield-alt" style="margin-right: 8px;"></i>
                <strong>Catatan Keamanan:</strong> Jika Anda tidak meminta reset password ini, abaikan email ini dengan aman. Password Anda tidak akan berubah dan akun tetap terlindungi.
            </div>

            <div class="divider"></div>

            <!-- Alternative URL -->
            <div class="message">
                <strong>Tombol tidak berfungsi?</strong><br>
                Salin dan tempelkan URL berikut ke browser Anda:
            </div>
            <div class="url-box">{{ $url }}</div>

            <!-- Security Tips Section -->
            <div class="tips-section">
                <div class="tips-header">
                    <div class="tips-icon">
                        <i class="fas fa-shield-alt" style="color: white; font-size: 14px;"></i>
                    </div>
                    Tips Keamanan Password
                </div>
                <ul class="tips-list">
                    <li>Gunakan minimal 8 karakter dengan kombinasi huruf, angka, dan simbol</li>
                    <li>Hindari penggunaan informasi pribadi seperti nama atau tanggal lahir</li>
                    <li>Jangan bagikan password kepada siapa pun, termasuk tim support</li>
                    <li>Gunakan password yang unik dan berbeda untuk setiap akun</li>
                    <li>Pertimbangkan menggunakan password manager untuk keamanan optimal</li>
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Inventaris BEM FTI</strong></p>
            <p>Email ini dikirim secara otomatis oleh sistem keamanan kami.</p>
            <p>Jangan membalas email ini. Untuk bantuan, hubungi administrator sistem.</p>
            <p style="margin-top: 16px; color: #6b7280;">© 2024 BEM FTI. Semua hak dilindungi.</p>
        </div>
    </div>
</body>

</html>
