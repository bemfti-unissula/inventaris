<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Auth Pages' }}</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-BEM-FTI.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Import Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        
        @font-face {
            font-family: 'Superline-Regular';
            src: url('/fonts/Superline-Regular.woff2') format('woff2'),
                 url('/fonts/Superline-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Superline-Line';
            src: url('/fonts/Superline-Line.woff2') format('woff2'),
                 url('/fonts/Superline-Line.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        
        .font-superline {
            font-family: 'Superline-Regular', 'Poppins', 'Inter', sans-serif;
        }
        
        .font-superline-line {
            font-family: 'Superline-Line', 'Poppins', 'Inter', sans-serif;
        }
        
        .font-poppins {
            font-family: 'Poppins', 'Inter', sans-serif;
        }
        
        .dark-glow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6),
                        0 0 40px rgba(220, 38, 38, 0.15),
                        0 0 80px rgba(220, 38, 38, 0.08),
                        inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }
        
        .premium-input {
            background: linear-gradient(145deg, rgba(31, 41, 55, 0.95), rgba(17, 24, 39, 0.9));
            border: 1px solid rgba(75, 85, 99, 0.6);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }
        
        .premium-input:hover {
            border-color: rgba(107, 114, 128, 0.7);
            background: linear-gradient(145deg, rgba(17, 24, 39, 0.9), rgba(31, 41, 55, 0.95));
        }
        
        .premium-input:focus {
            background: linear-gradient(145deg, rgba(17, 24, 39, 0.95), rgba(31, 41, 55, 0.9));
            border-color: rgba(220, 38, 38, 0.7);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12), 
                        0 0 20px rgba(220, 38, 38, 0.15),
                        inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }
        
        .premium-button {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .premium-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .premium-button:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 50%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(220, 38, 38, 0.4), 
                        0 4px 8px rgba(220, 38, 38, 0.2),
                        inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .premium-button:hover::before {
            left: 100%;
        }
        
        .premium-button:active {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.3);
        }
        
        .alert {
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            transition: top 0.5s ease-in-out;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px -3px rgba(220, 38, 38, 0.3), 0 4px 6px -2px rgba(220, 38, 38, 0.05);
            font-family: 'Poppins', 'Inter', sans-serif;
        }

        .alert.show {
            top: 1rem;
        }

        .alert.hide {
            top: -100px;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen">
    <!-- Dark Premium Background -->
    <div class="min-h-screen relative overflow-hidden">
        <!-- Subtle Pattern Overlay -->
        <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.02]"></div>
        
        <!-- Floating Dark Elements with Red Accents -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-red-600/8 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-red-700/6 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-red-500/10 rounded-full blur-lg animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-28 h-28 bg-red-600/7 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-1/3 left-1/3 w-20 h-20 bg-red-700/9 rounded-full blur-lg animate-pulse"></div>
        
        <!-- Dark ambient lighting -->
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-red-900/3 via-transparent to-red-800/3"></div>

        <div class="relative flex min-h-screen flex-col items-center justify-center px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
            <!-- Logo Section -->
            <div class="mb-8 sm:mt-6">
                <x-auth.logo />
            </div>

            <!-- Alert Container -->
            <div id="alert-container"></div>

            <!-- Enhanced Premium Card -->
            <div class="w-full max-w-md">
                <div class="bg-gradient-to-br from-gray-800/98 via-gray-800/95 to-gray-900/98 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-600/40 overflow-hidden dark-glow relative">
                    <!-- Subtle inner glow -->
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-white/[0.02] via-transparent to-red-500/[0.01] pointer-events-none"></div>
                    
                    <!-- Premium Header with Enhanced Styling -->
                    <div class="bg-gradient-to-r from-gray-900/95 via-gray-800/90 to-gray-900/95 px-8 py-8 border-b border-gray-600/30 relative">
                        <!-- Refined accent line with gradient -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-red-600 to-transparent"></div>
                        
                        <!-- Subtle top border glow -->
                        <div class="absolute top-1 left-4 right-4 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
                        
                        <div class="text-center space-y-2">
                            <h3 class="text-2xl font-bold text-white font-poppins drop-shadow-lg tracking-tight">{{ $header }}</h3>
                            <p class="text-gray-300/90 text-sm font-poppins font-medium">{{ $subheader }}</p>
                        </div>
                    </div>

                    <!-- Enhanced Form Content Area -->
                    <div class="px-8 py-8 bg-gradient-to-br from-gray-800/90 via-gray-800/85 to-gray-900/90 backdrop-blur-sm relative">
                        <!-- Subtle content area glow -->
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/[0.02] via-transparent to-transparent pointer-events-none"></div>
                        
                        <div class="relative z-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAlert(message, type = 'error') {
            const alertConfig = {
                'success': {
                    bg: 'bg-gradient-to-r from-emerald-600 to-green-600',
                    border: 'border-emerald-400/30',
                    icon: 'fas fa-check-circle',
                    iconColor: 'text-emerald-200'
                },
                'error': {
                    bg: 'bg-gradient-to-r from-rose-600 to-red-600',
                    border: 'border-rose-400/30',
                    icon: 'fas fa-exclamation-circle',
                    iconColor: 'text-rose-200'
                }
            };

            const config = alertConfig[type] || alertConfig['error'];

            const alert = document.createElement('div');
            alert.className = `premium-alert ${config.bg} ${config.border}`;
            alert.style.cssText = `
                position: fixed !important;
                top: -120px !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                z-index: 9999 !important;
                padding: 1rem 1.5rem;
                border-radius: 0.75rem;
                border: 1px solid;
                backdrop-filter: blur(12px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.05);
                min-width: 320px;
                max-width: 480px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            `;

            alert.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="${config.icon} ${config.iconColor} text-lg flex-shrink-0"></i>
                    <div class="text-white font-poppins text-sm font-medium leading-relaxed">
                        ${message}
                    </div>
                    <button class="ml-auto text-white/70 hover:text-white transition-colors duration-200" onclick="this.closest('.premium-alert').remove()">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
            `;

            document.body.appendChild(alert);
            alert.offsetHeight;

            // Animate in
            setTimeout(() => {
                alert.style.top = '1.5rem';
                alert.style.opacity = '1';
            }, 10);

            // Auto-hide after 4 seconds
            setTimeout(() => {
                alert.style.top = '-120px';
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 400);
            }, 4000);
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                showAlert('{{ $error }}');
            @endforeach
        @endif

        @if (session('success'))
            showAlert('{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            showAlert('{{ session('error') }}', 'error');
        @endif
    </script>
</body>

</html>
