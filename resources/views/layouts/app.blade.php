<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Product Management')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header class="navbar">

        <div class="navbar-brand">
            Product Management
        </div>

        @auth

            <div class="navbar-user">

                <div class="user-info">
                    <span class="user-label">
                        Login sebagai
                    </span>

                    <span class="username">
                        {{ Auth::user()->username }}
                    </span>
                </div>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="btn-logout"
                    >
                        Logout
                    </button>
                </form>

            </div>

        @endauth

    </header>

    <div class="container">

        @if (session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if (session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif

        @yield('content')

    </div>
    @stack('scripts')

</body>

</html>