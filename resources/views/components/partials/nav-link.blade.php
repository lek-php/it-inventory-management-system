@props(['active' => false, 'type' => 'a'])

@if ($type == 'button')
<button class="flex items-center gap-3 rounded-xl px-3 py-3
{{ $active ? 'bg-emerald-50 text-signal' : 'text-slate-500 hover:bg-slate-50' }}"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>
    This is a button
</button>
@else
<a class="flex items-center gap-3 rounded-xl px-3 py-3
{{ $active ? 'bg-emerald-50 text-signal' : 'text-slate-500 hover:bg-slate-50' }}"
    aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>
    {{ $slot}}
</a>
@endif