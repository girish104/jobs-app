<x-layout>
    <h1 class="text-center text-slate-600 my-16 font-medium text-4xl">Sign in to your account!</h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="email">E-mail</x-label>
                <x-text-input name='email' />
            </div>
            <div class="mb-8">
                <x-label for="password">Password</x-label>
                <x-text-input name='password' type="password" />
            </div>
            <div class="flex justify-between mb-8 text-sm font-medium">
                <div>
                    <div class="flex space-x-2 items-center">
                        <input type="checkbox" name="remember" class="rounded-sm border-slate-400">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forget Password?</a>
                </div>
            </div>
            <div>
                <x-button class="w-full">Login</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
