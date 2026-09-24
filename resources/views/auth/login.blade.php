<x-guest-layout>
    
    <!-- Judul Halaman -->
    <div class="mb-10">
        <h2 class="text-3xl font-bold tracking-tight text-on-surface mb-2">Masuk ke KRM Surabaya</h2>
        <p class="text-base text-on-surface-variant">Portal Pengelolaan dan Monitoring Konservasi Mangrove</p>
    </div>

    <!-- Alert Status & Error bawaan Breeze -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-6 p-4 bg-error-container border border-error/20 rounded-lg flex gap-3 shadow-sm">
            <span class="material-symbols-outlined text-on-error-container shrink-0">error</span>
            <div class="text-sm leading-relaxed text-on-error-container">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Email</label>
            <div class="relative">
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Masukkan email admin" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">person</span>
            </div>
        </div>

        <div class="space-y-2">
            <div class="flex justify-between items-center">
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-semibold text-primary hover:text-primary-container transition">Lupa Password?</a>
                @endif
            </div>
            <div class="relative">
                <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Masukkan password" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                
                <button type="button" onclick="const p = document.getElementById('password'); const i = document.getElementById('passwordIcon'); if(p.type === 'password'){ p.type = 'text'; i.innerText = 'visibility_off'; } else { p.type = 'password'; i.innerText = 'visibility'; }" class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 flex items-center justify-center rounded-md text-on-surface-variant hover:text-on-surface hover:bg-gray-100 transition">
                    <span id="passwordIcon" class="material-symbols-outlined text-xl">visibility</span>
                </button>
            </div>
        </div>

        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox" class="w-4 h-4 rounded border-outline accent-[#004d35] focus:ring-[#004d35]">
            <label for="remember" class="ml-2 text-sm text-on-surface-variant cursor-pointer">Ingat saya di perangkat ini</label>
        </div>

        <button type="submit" class="w-full h-12 bg-primary hover:bg-primary-container active:scale-[0.99] text-white font-semibold text-sm uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
            <span>Masuk</span>
            <span class="material-symbols-outlined text-lg">login</span>
        </button>
    </form>

            <!-- Link ke Halaman Login -->
        <div class="text-center mt-4">
            <span class="text-sm text-on-surface-variant">Belum Punya Akun?</span>
            <a href="{{ route('register') }}" class="text-sm font-semibold text-primary hover:text-primary-container transition ml-1">Daftar di sini</a>
        </div>
    </form>
</x-guest-layout>