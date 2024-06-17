<div {{ $attributes->merge([
    'class' => 'bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg'
])}}>
    <div class="p-6 text-slate-100">
        {{ $slot }}
    </div>
</div>