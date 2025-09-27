@props(['type' => 'success'])

@php
    $alertClasses = match ($type) {
        'success' => 'bg-green-600 border-green-500 text-green-100',
        'error' => 'bg-red-600 border-red-500 text-red-100',
        'warning' => 'bg-yellow-600 border-yellow-500 text-yellow-100',
        'info' => 'bg-blue-600 border-blue-500 text-blue-100',
        default => 'bg-gray-600 border-gray-500 text-gray-100',
    };

    $iconSvg = match ($type) {
        'success'
            => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
        'error'
            => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
        'warning'
            => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
        'info'
            => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        default
            => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
    };
@endphp

<div id="globalAlert" class="app-alert {{ $alertClasses }}">
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-3">
            {!! $iconSvg !!}
        </div>
        <div class="flex-1">
            <p class="font-medium">{{ $slot }}</p>
        </div>
        <button type="button"
            class="ml-4 inline-flex text-current hover:text-white/80 focus:outline-none focus:text-white/80 transition-colors duration-200"
            onclick="closeAlert()">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

<style>
    .app-alert {
        position: fixed;
        top: -100px;
        right: 1rem;
        z-index: 9999;
        min-width: 300px;
        max-width: 400px;
        padding: 1rem;
        border-radius: 0.5rem;
        border-width: 1px;
        box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateY(-20px);
        opacity: 0;
    }

    .app-alert.show {
        top: 2rem;
        transform: translateY(0);
        opacity: 1;
    }

    .app-alert.hide {
        top: -100px;
        transform: translateY(-20px);
        opacity: 0;
    }

    /* Enhanced styling for better visibility */
    .app-alert {
        font-family: 'Poppins', sans-serif;
    }

    /* Mobile responsive */
    @media (max-width: 640px) {
        .app-alert {
            left: 1rem;
            right: 1rem;
            min-width: auto;
        }
    }
</style>

<script>
    function closeAlert() {
        const alert = document.getElementById('globalAlert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('hide');

            setTimeout(() => {
                alert.remove();
            }, 400);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('globalAlert');
        if (alert) {
            // Trigger reflow to ensure transition works
            alert.offsetHeight;

            // Show alert with animation
            setTimeout(() => {
                alert.classList.add('show');
            }, 100);

            // Auto-hide after 5 seconds
            setTimeout(() => {
                closeAlert();
            }, 5000);
        }
    });

    // Close alert when clicking outside (optional)
    document.addEventListener('click', function(e) {
        const alert = document.getElementById('globalAlert');
        if (alert && !alert.contains(e.target)) {
            // Uncomment the line below if you want alerts to close when clicking outside
            // closeAlert();
        }
    });
</script>
