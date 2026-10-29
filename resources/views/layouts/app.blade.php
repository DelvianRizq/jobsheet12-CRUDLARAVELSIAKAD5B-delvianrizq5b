<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIAKAD') | {{ config('app.name') }}</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/siakad.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-body-tertiary">
    @include('layouts.partials.navbar')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.sidebar')
            <main class="col-lg-9 col-xl-10 px-3 px-md-4 py-4">
                @include('layouts.partials.flash')
                @yield('content')

                <footer class="text-center text-body-secondary small mt-5">
                    &copy; {{ date('Y') }} {{ config('app.name') }} | D3 Teknik Informatika
                </footer>
            </main>
        </div>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const htmlElem = document.documentElement;

            // Cek jika ada tema yang tersimpan di localStorage
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                htmlElem.setAttribute('data-bs-theme', savedTheme);
                updateIcon(savedTheme);
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    const currentTheme = htmlElem.getAttribute('data-bs-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    htmlElem.setAttribute('data-bs-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    updateIcon(newTheme);
                });
            }

            function updateIcon(theme) {
                if (themeIcon) {
                    if (theme === 'dark') {
                        themeIcon.className = 'bi bi-sun-fill fs-6';
                    } else {
                        themeIcon.className = 'bi bi-moon-fill fs-6';
                    }
                }
            }
        });
    </script>
</body>
</html>