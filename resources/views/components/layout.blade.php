<!DOCTYPE html>

<head>
    <title>Das Vacatur - Job site</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<section class="px-2 py-4" style="font-family: Open Sans, sans-serif">
    <nav class="flex justify-between items-center bg-blue-500 rounded">
        <div class="text-5xl text-white mx-3 my-3">Das Vacatur</div>
        @auth
        <div class="flex items-center">
            <span class="text-3xl text-white item-center">Welkom {{auth()->user()->name}} </span>
            <form method="POST" action="/session/logout" class="light ml-3 font-semibold text-blue-500">
                @csrf
                <button type="submit" class="p-1 mt-3 text-white border-white rounded border-2">
                    Afmelden
                </button>
            </form>
        </div>
        @endauth
        <div class="mx-3 my-3 text-white font-bold">
            @auth
            @if (auth()->user()->username === 'admin')
            <a href="/admin/jobs/create">Aanmaak Jobs</a> |
            @endif
            @endauth

            @guest
            <a href="/user/create">Registreren</a> |
            <a href="/session/login">Aanmelden</a>
            @endguest
        </div>
    </nav>

    {{ $slot }}

    <footer class="mt-10 text-center text-s">
        Made with &#x1F49B by Jasper De Cooman - 2021
    </footer>
</section>