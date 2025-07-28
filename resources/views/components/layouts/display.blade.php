<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.parts.head')
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: var(--white);
            background-color: var(--{{ color() }});
            border-color: var(--{{ color() }});
        }

        .dark-mode .page-item.active .page-link {
            background-color: color-mix(in srgb, var(--{{ color() }}) 80%, black);
            /* border-color: color-mix(in srgb, var(--{{ color() }}) 80%, black); */
            border-color: #3f6791;
            color: var(--white);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        {{ $slot }}
    </div>
    @include('layouts.parts.scripts')
</body>

</html>