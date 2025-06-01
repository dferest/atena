@props(['route', 'label', 'icon'])

<a href="{{ route($route) }}" class="btn-dashboard flex items-center justify-center gap-2">
    <span class="text-2xl">{{ $icon }}</span>
    <span>{{ $label }}</span>
</a>