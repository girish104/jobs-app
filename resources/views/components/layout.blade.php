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
                    <a href="{{ route('my-job-applications.index') }}"> {{ auth()->user()->name ?? 'anoynomus' }} :
                        Applications
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
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
    @if (session('success'))
        <div class="my-8 rounded-md border-l-4 border-green-300 p-4 text-green-700 bg-green-100 opacity-75">
            <p class="font-bold">Success!</p>
            <p> {{ session('success') }} </p>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
