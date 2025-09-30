@props([
    'modalId' => 'deleteModal',
    'title' => 'Konfirmasi Hapus',
    'subtitle' => 'Tindakan ini tidak dapat dibatalkan',
    'itemType' => 'item',
    'warningText' => 'Data yang sudah dihapus tidak dapat dikembalikan lagi.',
    'confirmButtonText' => 'Ya, Hapus',
    'cancelButtonText' => 'Batal',
])

<script>
    // Delete confirmation modal functionality for {{ $modalId }}
    let currentDeleteId_{{ $modalId }} = null;
    let modal_{{ $modalId }}_created = false;

    function createModal_{{ $modalId }}() {
        if (modal_{{ $modalId }}_created) return;

        const modalHTML = `
        <div id="{{ $modalId }}" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center" style="position: fixed !important; top: 0 !important; left: 0 !important; width: 100vw !important; height: 100vh !important; z-index: 999999 !important;">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0 relative" 
                 id="{{ $modalId }}Content" style="z-index: 1000000 !important;">
                <!-- Header -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
                        <p class="text-sm text-gray-400">{{ $subtitle }}</p>
                    </div>
                </div>

                <!-- Content -->
                <div class="mb-6">
                    <p class="text-gray-300 leading-relaxed">
                        Apakah Anda yakin ingin menghapus {{ $itemType }}
                        <span id="{{ $modalId }}ItemName" class="font-semibold text-white"></span>?
                    </p>
                    <p class="text-sm text-gray-400 mt-2">
                        {{ $warningText }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex gap-3">
                    <button type="button" onclick="closeModal_{{ $modalId }}()"
                        class="flex-1 px-4 py-2.5 bg-gray-600/50 hover:bg-gray-600/70 text-gray-200 rounded-lg font-medium transition-all duration-200 border border-gray-500/50 hover:border-gray-400/50">
                        {{ $cancelButtonText }}
                    </button>
                    <button type="button" onclick="confirmDelete_{{ $modalId }}()" id="{{ $modalId }}ConfirmBtn"
                        class="flex-1 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        {{ $confirmButtonText }}
                    </button>
                </div>
            </div>
        </div>
    `;

        // Append modal directly to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        modal_{{ $modalId }}_created = true;

        // Add event listeners
        const modal = document.getElementById('{{ $modalId }}');

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal_{{ $modalId }}();
            }
        });
    }

    function openDeleteModal{{ $modalId }}(itemId, itemName) {
        // Create modal if not exists
        createModal_{{ $modalId }}();

        currentDeleteId_{{ $modalId }} = itemId;
        document.getElementById('{{ $modalId }}ItemName').textContent = itemName;

        const modal = document.getElementById('{{ $modalId }}');
        const modalContent = document.getElementById('{{ $modalId }}Content');

        // Show modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Animate modal appearance
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';

        // Ensure modal is on top of everything
        modal.style.zIndex = '999999';
        modalContent.style.zIndex = '1000000';
    }

    function closeModal_{{ $modalId }}() {
        const modal = document.getElementById('{{ $modalId }}');
        const modalContent = document.getElementById('{{ $modalId }}Content');

        if (!modal || !modalContent) return;

        // Animate modal disappearance
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            currentDeleteId_{{ $modalId }} = null;
        }, 300);

        // Restore body scroll
        document.body.style.overflow = 'auto';
        document.documentElement.style.overflow = 'auto';
    }

    function confirmDelete_{{ $modalId }}() {
        if (currentDeleteId_{{ $modalId }}) {
            // Add loading state
            const confirmBtn = document.getElementById('{{ $modalId }}ConfirmBtn');
            confirmBtn.disabled = true;
            confirmBtn.innerHTML = `
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Menghapus...
        `;

            // Submit the form
            document.getElementById('deleteForm{{ $modalId }}' + currentDeleteId_{{ $modalId }}).submit();
        }
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('{{ $modalId }}');
            if (modal && !modal.classList.contains('hidden')) {
                closeModal_{{ $modalId }}();
            }
        }
    });

    // Initialize modal creation when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        createModal_{{ $modalId }}();
    });
</script>
