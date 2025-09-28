@props(['type' => 'text', 'name', 'id', 'label', 'value' => '', 'required' => false])

<div class="mb-6">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-200 mb-2 font-poppins">{{ $label }}</label>
    <div class="relative">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" 
            class="premium-input w-full px-4 py-3 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none text-white font-poppins {{ $type === 'password' ? 'pr-12' : '' }}"
            placeholder="Enter {{ strtolower($label) }}"
            value="{{ old($name, $value) }}" 
            {{ $required ? 'required' : '' }} />
        
        @if ($type === 'password')
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer"
                onclick="togglePassword('{{ $id }}')">
                <svg id="eye-icon-{{ $id }}" class="w-5 h-5 text-gray-400 hover:text-red-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
        @endif
    </div>
    
    @error($name)
        <p class="mt-2 text-sm text-red-400 font-poppins">{{ $message }}</p>
    @enderror
</div>
