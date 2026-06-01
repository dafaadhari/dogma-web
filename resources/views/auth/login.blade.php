<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="max-w-md mx-auto mt-10 shadow-sm">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-black tracking-tight">Login Redaksi</h2>
            <p class="text-xs font-bold text-gray-500 mt-2 uppercase tracking-widest">Portal Komunitas DOGMA</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-xs font-bold text-black uppercase tracking-wider mb-2">Email</label>
                <input id="email" class="block w-full px-2 py-1 border border-gray-300 focus:border-black focus:ring-0 text-black transition-colors" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-xs font-bold text-black uppercase tracking-wider mb-2">Password</label>
                <input id="password" class="block w-full px-2 py-1 border border-gray-300 focus:border-black focus:ring-0 text-black transition-colors"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mb-8">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded-none border-gray-300 text-black focus:ring-black cursor-pointer" name="remember">
                    <span class="ms-2 text-sm text-gray-600 font-medium">Ingat Saya</span>
                </label>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-gray-500 hover:text-black uppercase tracking-wider transition-colors" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <button type="submit" class="bg-black text-white px-8 py-3 font-bold uppercase tracking-wider text-xs hover:bg-gray-800 transition-colors">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>