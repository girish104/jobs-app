<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .bg-color {
            background: #F4F2EE;
        }
    </style>
</head>

<body class="bg-color text-slate-700">
    <nav class="fixed top-0 left-0 w-full z-50 flex justify-between items-center px-10 py-4 bg-white border-b-2">
        <ul class="flex space-x-6 items-center">
            <li>
                <a href="{{ route('jobs.index') }}"
                    class="text-gray-800 hover:text-blue-500 font-semibold text-lg flex items-center">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
            </li>
        </ul>
        <ul class="flex space-x-6 items-center">
            @auth
                <li >
                    <a href="{{ route('my-job-applications.index') }}"
                        class="text-gray-800 hover:text-blue-500 font-semibold text-lg flex items-center">
                        {{ auth()->user()->name ?? 'Anonymous' }} : Applications
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-gray-800 hover:text-red-500 font-semibold text-lg flex items-center focus:outline-none">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}"
                        class="text-gray-800 hover:text-blue-500 font-semibold text-lg flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                    </a>
                </li>
            @endauth
        </ul>
    </nav>


    @if (session('success'))
        <div class="my-8 mx-4 rounded-md border-l-4 border-green-300 p-4 text-green-700 bg-green-100 opacity-75">
            <p class="font-bold">Success!</p>
            <p> {{ session('success') }} </p>
        </div>
    @endif
    <div class="max-w-2xl mx-auto mt-20 px-4">
        {{ $slot }}
    </div>
</body>

</html>
