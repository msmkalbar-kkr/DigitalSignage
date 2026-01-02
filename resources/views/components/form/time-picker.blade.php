<div x-data x-init="flatpickr($refs.input, {
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    dateFormat: 'H:i'
})">
    <input x-ref="input" id="{{ $id ?? $name }}" type="text" name="{{ $name }}"
        class="border p-2 rounded w-full" value="{{ $value }}">
</div>
