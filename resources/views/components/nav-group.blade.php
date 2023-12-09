@props(['name' => '', 'icon' => '', 'prefix' => ''])
<li class="nav-item {{ (isset($prefix) && request()->is($prefix)) ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="{{ $icon }}"></i>
        <p>
            {{ $name }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    {{$slot}}
</li>