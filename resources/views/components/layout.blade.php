<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
    {{ $slot }}
</body>

</html>