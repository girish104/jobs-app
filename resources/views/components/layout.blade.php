<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
    <nav class="flex justify-between mb-8 font-medium">
        <ul class="flex space-x-2">
            <li><a href="{{ route('jobs.index') }}">Home</a></li>
        </ul>
        <ul class="flex space-x-2">
            @auth
                <li>
                    {{ auth()->user()->name ?? 'anoynomus' }}
                </li>
                <li>
                    <form action="{{ route('auth.destory') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                    </form>
                @else
                    <a href="{{ route('auth.create') }}">Sign In</a>
                @endauth
            </li>
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
