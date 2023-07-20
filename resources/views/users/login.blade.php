<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
            <p class="mb-4">Login into your account to post a job</p>
        </header>

        <form method="POST" action="/users/login">
            @csrf

            @if(session('danger'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                    {{ session('danger') }}
                </div>
            @endif

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"/>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Sign In</button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>

</x-layout>
