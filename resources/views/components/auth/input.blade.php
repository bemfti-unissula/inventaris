@props(['type' => 'text', 'name', 'id', 'label', 'value' => '', 'required' => false])

<div class="input-container">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="input-field" placeholder=" "
        autocomplete="off" value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }} />
    <label for="{{ $id }}" class="input-label">{{ $label }}</label>
    @if ($type === 'password')
        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer"
            onclick="togglePassword('{{ $id }}')">
            <svg id="eye-icon-{{ $id }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                fill="currentColor" class="w-6 h-6 text-gray-400">
                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path fill-rule="evenodd"
                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    @endif
</div>
