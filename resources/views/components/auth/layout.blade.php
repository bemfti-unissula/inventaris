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
        /* Import Superline Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
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
            font-family: 'Superline-Regular', 'Inter', sans-serif;
        }
        
        .font-superline-line {
            font-family: 'Superline-Line', 'Inter', sans-serif;
        }
        
        .red-glow {
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.15);
        }
        
        .bg-red-gradient {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
        }
        
        .bg-red-gradient-soft {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 50%, #fecaca 100%);
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
            font-family: 'Superline-Regular', 'Inter', sans-serif;
        }

        .alert.show {
            top: 1rem;
        }

        .alert.hide {
            top: -100px;
        }
    </style>
</head>

<body>
    <!-- Red Dominant Background -->
    <div class="min-h-screen bg-red-gradient-soft relative">
        <!-- Red Pattern -->
        <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.05] hue-rotate-[350deg]"></div>
        
        <!-- Floating Red Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-red-200/30 rounded-full blur-xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-red-300/20 rounded-full blur-2xl"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-red-400/20 rounded-full blur-lg"></div>

        <div class="relative flex min-h-screen flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <!-- Logo Section -->
            <div class="mb-8">
                <x-auth.logo />
            </div>

            <!-- Alert Container -->
            <div id="alert-container"></div>

            <!-- Red Themed Professional Card -->
            <div class="w-full max-w-md">
                <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl border border-red-200 overflow-hidden red-glow">
                    <!-- Red Themed Header -->
                    <div class="bg-red-gradient px-8 py-6 border-b border-red-300">
                        <h3 class="text-2xl font-semibold text-white font-superline drop-shadow-lg">{{ $header }}</h3>
                        <p class="mt-2 text-red-100 text-sm font-superline-line">{{ $subheader }}</p>
                    </div>

                    <!-- Form Content -->
                    <div class="px-8 py-6 bg-white/90">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAlert(message) {
            const alert = document.createElement('div');
            alert.className = 'alert';
            alert.textContent = message;

            document.getElementById('alert-container').appendChild(alert);

            alert.offsetHeight;

            alert.classList.add('show');

            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('hide');

                setTimeout(() => {
                    alert.remove();
                }, 500);
            }, 3000);
        }

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                showAlert('{{ $error }}');
            @endforeach
        @endif
    </script>
</body>

</html>
