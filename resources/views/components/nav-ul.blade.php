@props(['prefix' => null])
<ul class="nav nav-treeview" style="display: {{ (isset($prefix) && request()->is($prefix)) ? 'block' : '' }}; border-left: 1px dotted #ffdada40; margin-left: 10px;">
    {{ $slot }}
</ul>