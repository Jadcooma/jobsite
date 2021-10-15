<!DOCTYPE html>

<head>
    <title>Das Vacatur - Job site</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<section class="px-2 py-4" style="font-family: Open Sans, sans-serif">
    <nav class="flex justify-between items-center bg-blue-500 rounded">
        <div class="text-5xl text-white mx-3 my-3">Das Vacatur</div>
        <div class="mx-3 my-3">
            <a href="/" class="font-bold text-white ">Aanmelden</a>
        </div>
    </nav>
    
    {{ $slot }}

    <footer class="mt-10 text-center text-s">
        Made with &#x1F49B by Jasper De Cooman - 2021  
    </footer>
</section>