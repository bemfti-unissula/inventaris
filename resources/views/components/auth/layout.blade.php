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
        .alert {
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            transition: top 0.5s ease-in-out;
            background-color: #ef4444;
            color: white;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
    <!-- Simple Professional Background -->
    <div class="min-h-screen bg-gray-50 relative">
        <!-- Subtle Pattern -->
        <div class="absolute inset-0 bg-[url('/grid.svg')] bg-center opacity-[0.02]"></div>
        
        <div class="relative flex min-h-screen flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <!-- Logo Section -->
            <div class="mb-8">
                <x-auth.logo />
            </div>

            <!-- Alert Container -->
            <div id="alert-container"></div>

            <!-- Simple Professional Card -->
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                    <!-- Simple Header -->
                    <div class="bg-white px-8 py-6 border-b border-gray-100">
                        <h3 class="text-2xl font-semibold text-gray-900">{{ $header }}</h3>
                        <p class="mt-2 text-gray-600 text-sm">{{ $subheader }}</p>
                    </div>
                    
                    <!-- Form Content -->
                    <div class="px-8 py-6">
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
