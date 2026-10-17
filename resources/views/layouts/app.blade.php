<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#111d3a">
    <meta name="description" content="A Laravel point-of-sale management laboratory project.">
    <title>@yield('title', 'Dashboard') · Laravel POS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to content</a>
    <div class="site-frame">
        <header class="site-header">
            <div class="container header-inner">
                <a class="brand" href="{{ route('home') }}" aria-label="Laravel POS home">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 40 40" fill="none"><rect x="5" y="5" width="30" height="30" rx="10" fill="currentColor"/><path d="M13 22.5 18 27l9-12" stroke="white" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="27.5" cy="12" r="2" fill="#A5B4FC"/></svg>
                    </span>
                    <span class="brand-copy"><strong>Laravel POS</strong><small>Management System</small></span>
                </a>

                <button class="menu-toggle" type="button" aria-controls="primary-nav" aria-expanded="false" aria-label="Open navigation" data-menu-toggle>
                    <span></span><span></span><span></span>
                </button>

                <nav class="primary-nav" id="primary-nav" aria-label="Primary navigation" data-primary-nav>
                    <a class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Dashboard</a>
                    <a class="nav-link {{ request()->routeIs('customers.index') ? 'is-active' : '' }}" href="{{ route('customers.index') }}" @if(request()->routeIs('customers.index')) aria-current="page" @endif>Customers</a>
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'is-active' : '' }}" href="{{ route('users.index') }}" @if(request()->routeIs('users.index')) aria-current="page" @endif>Users</a>
                    <a class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
                </nav>

                <span class="header-chip"><span class="header-chip-dot"></span> Laravel 13 · TFA5</span>
            </div>
        </header>

        <main id="main-content" class="main-content">
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container footer-inner">
                <span>© {{ date('Y') }} Laravel POS Management System</span>
                <span>Built for IT0049 · Web System Technologies</span>
            </div>
        </footer>
    </div>
</body>
</html>
