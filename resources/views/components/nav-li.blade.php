@props(['href' => '#', 'icon' => 'far fa-dot-circle nav-icon', 'route' => null, 'after' => null, 'before' => null, 'prefix' => null])
<li class="nav-item {{ (isset($prefix) && request()->is($prefix)) ? 'menu-is-opening menu-open' : '' }}">
    {{$before}}
    <a href="{{ isset($route) ? route($route) : '#' }}" {{ $attributes->merge(['class' => 'nav-link ' . (request()->routeIs($route) ? 'text-bold bg-primary' : '')]) }}>
        <i class="{{ $icon }}"></i>
        {{ $slot }}
    </a>
    {{ $after }}
</li>