@props(['active'])

@php
$classes = ($active ?? false)
            ? 'p-2 m-2  shadow-inner text-white bg-purple-900 shadow-inner rounded bg-opacity-50 cursor-pointer'
            : 'p-2 m-2  mt-3 hover:shadow text-white hover:bg-purple-900 cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>