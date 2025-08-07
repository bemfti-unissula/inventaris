@props(['type' => 'success'])

@php
    $bgColor = match ($type) {
        'success' => 'bg-green-700',
        'error' => 'bg-red-700',
        'warning' => 'bg-yellow-700',
        default => 'bg-blue-700',
    };
@endphp

<div class="alert {{ $bgColor }}">
    {{ $slot }}
</div>

<style>
    .alert {
        position: fixed;
        top: -100px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        transition: top 0.5s ease-in-out;
        color: white;
        padding: 1rem 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .bg-green-700 {
        background-color: #15803d !important;
    }

    .alert.show {
        top: 1rem;
    }

    .alert.hide {
        top: -100px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert');
        alert.offsetHeight;
        alert.classList.add('show');

        setTimeout(() => {
            alert.classList.remove('show');
            alert.classList.add('hide');

            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 3000);
    });
</script>
