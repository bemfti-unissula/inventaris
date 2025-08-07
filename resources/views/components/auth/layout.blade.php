<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Auth Pages' }}</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
    <div class="bg-black text-white flex min-h-screen flex-col items-center pt-16 sm:justify-center sm:pt-0">
        <x-auth.logo />

        <!-- Alert Container -->
        <div id="alert-container"></div>

        <div class="relative mt-12 w-full max-w-lg sm:mt-10">
            <div class="relative mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
                bis_skin_checked="1"></div>
            <div
                class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
                <div class="flex flex-col p-6">
                    <h3 class="text-xl font-semibold leading-6 tracking-tighter">{{ $header }}</h3>
                    <p class="mt-1.5 text-sm font-medium text-white/50">{{ $subheader }}</p>
                </div>
                <div class="p-6 pt-0">
                    {{ $slot }}
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
