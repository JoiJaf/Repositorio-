<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white flex items-center justify-center h-screen">
    <main class='bg-white rounded-lg border border-[#979797] px-20 py-8 w-full sm:max-w-md md:max-w-lg lg:max-w-xl mx-auto'>
        <h1 class='clamp-xxl text-center'>Login</h1>
        <form method="POST" action="{{ route('session-start') }}">
        @csrf
        <div class="my-16 sm:my-20">
            <input id="emailAddress" type="email" name="emailAddress" placeholder="Email" class="border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]" required>
        </div>

        <div class="my-12 sm:my-28">
            <input id="password" type="password" name="password" placeholder="Password" class="border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]" required>
        </div>
        
        <div>
            <input type="submit" value="LOGIN" class="bg-[#0E0E0E] clamp-md hover:bg-green-600 text-white py-4 px-4 rounded-md w-full font-bold">
        </div>
        </form>
    </main>
</body>
</html>