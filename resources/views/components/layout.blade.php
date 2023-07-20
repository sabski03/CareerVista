<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CareerVista</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>CareerVista | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/" class="py-4 font-bold text-xl">CareerVista</a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">welcome {{auth()->user()->name}}</span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>Manage Listings</a>
            </li>

            <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed">Logout</i>
                </button>
            </form>

            @else


            <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
            </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
    </footer>
    </body>
    </html>
</body>
</html>
