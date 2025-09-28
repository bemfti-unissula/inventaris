@props(['type' => 'success'])

@php
    $alertConfig = match ($type) {
        'success' => [
            'bg' => 'bg-gradient-to-r from-emerald-600 to-green-600',
            'border' => 'border-emerald-400/30',
            'icon' => 'fas fa-check-circle',
            'iconColor' => 'text-emerald-200',
        ],
        'error' => [
            'bg' => 'bg-gradient-to-r from-rose-600 to-red-600',
            'border' => 'border-rose-400/30',
            'icon' => 'fas fa-exclamation-circle',
            'iconColor' => 'text-rose-200',
        ],
        'warning' => [
            'bg' => 'bg-gradient-to-r from-amber-600 to-yellow-600',
            'border' => 'border-amber-400/30',
            'icon' => 'fas fa-exclamation-triangle',
            'iconColor' => 'text-amber-200',
        ],
        default => [
            'bg' => 'bg-gradient-to-r from-blue-600 to-indigo-600',
            'border' => 'border-blue-400/30',
            'icon' => 'fas fa-info-circle',
            'iconColor' => 'text-blue-200',
        ],
    };
@endphp

<div class="premium-alert {{ $alertConfig['bg'] }} {{ $alertConfig['border'] }}">
    <div class="flex items-center space-x-3">
        <i class="{{ $alertConfig['icon'] }} {{ $alertConfig['iconColor'] }} text-lg flex-shrink-0"></i>
        <div class="text-white font-poppins text-sm font-medium leading-relaxed">
            {{ $slot }}
        </div>
        <button class="ml-auto text-white/70 hover:text-white transition-colors duration-200"
            onclick="this.closest('.premium-alert').remove()">
            <i class="fas fa-times text-sm"></i>
        </button>
    </div>
</div>

<style>
    .premium-alert {
        position: fixed !important;
        top: -120px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        z-index: 9999 !important;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        border: 1px solid;
        backdrop-filter: blur(12px);
        box-shadow:
            0 20px 25px -5px rgba(0, 0, 0, 0.3),
            0 10px 10px -5px rgba(0, 0, 0, 0.1),
            0 0 0 1px rgba(255, 255, 255, 0.05);
        min-width: 320px;
        max-width: 480px;
        animation: slideInDown 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        /* Ensure it's always positioned relative to viewport */
        margin: 0 !important;
        box-sizing: border-box;
    }

    @keyframes slideInDown {
        0% {
            top: -120px !important;
            opacity: 0;
            transform: translateX(-50%) translateY(-20px) !important;
        }

        100% {
            top: 1.5rem !important;
            opacity: 1;
            transform: translateX(-50%) translateY(0) !important;
        }
    }

    @keyframes slideOutUp {
        0% {
            top: 1.5rem !important;
            opacity: 1;
            transform: translateX(-50%) translateY(0) !important;
        }

        100% {
            top: -120px !important;
            opacity: 0;
            transform: translateX(-50%) translateY(-20px) !important;
        }
    }

    .premium-alert.hide {
        animation: slideOutUp 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards !important;
    }

    /* Enhanced hover effects */
    .premium-alert:hover {
        transform: translateX(-50%) translateY(-2px) !important;
        box-shadow:
            0 25px 35px -5px rgba(0, 0, 0, 0.4),
            0 15px 15px -5px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.08);
    }

    /* Ensure alert is always on top and properly positioned */
    .premium-alert {
        contain: layout style paint;
        will-change: transform, opacity;
    }

    /* Force proper stacking context */
    body {
        position: relative;
    }

    .premium-alert * {
        pointer-events: auto;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Wait a bit for the DOM to be fully ready
        setTimeout(() => {
            const alerts = document.querySelectorAll('.premium-alert');

            alerts.forEach((alert, index) => {
                // Move alert to body to ensure proper positioning
                if (alert.parentNode !== document.body) {
                    document.body.appendChild(alert);
                }

                // Force reflow to ensure positioning is applied
                alert.offsetHeight;

                // Stagger multiple alerts if present
                setTimeout(() => {
                    // Auto-hide after 4 seconds
                    setTimeout(() => {
                        hideAlert(alert);
                    }, 4000);
                }, index * 200);
            });
        }, 100);
    });

    function hideAlert(alert) {
        alert.classList.add('hide');

        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 400);
    }

    // Watch for new alerts added to the DOM
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1 && node.classList && node.classList.contains(
                        'premium-alert')) {
                    initializeAlert(node);
                }
            });
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    function initializeAlert(alert) {
        // Move to body if not already there
        if (alert.parentNode !== document.body) {
            document.body.appendChild(alert);
        }

        // Force reflow
        alert.offsetHeight;

        // Auto-hide after 4 seconds
        setTimeout(() => {
            hideAlert(alert);
        }, 4000);
    }

    // Enhanced interaction - pause auto-hide on hover
    document.addEventListener('mouseenter', function(e) {
        if (e.target.closest('.premium-alert')) {
            const alert = e.target.closest('.premium-alert');
            alert.style.animationPlayState = 'paused';
        }
    }, true);

    document.addEventListener('mouseleave', function(e) {
        if (e.target.closest('.premium-alert')) {
            const alert = e.target.closest('.premium-alert');
            alert.style.animationPlayState = 'running';
        }
    }, true);
</script>
