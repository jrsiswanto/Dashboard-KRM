<x-guest-layout>
    
    <!-- Bagian Judul -->
    <div class="mb-10">
        <h2 class="text-3xl font-bold tracking-tight text-on-surface mb-2">Daftar Akun Baru</h2>
        <p class="text-base text-on-surface-variant">Bergabung dengan KRM Surabaya</p>
    </div>

    <!-- Tampilkan Error Jika Ada -->
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

    <!-- Form Register -->
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Input Name -->
        <div class="space-y-2">
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Nama Lengkap</label>
            <div class="relative">
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">badge</span>
            </div>
        </div>

        <!-- Input Email -->
        <div class="space-y-2">
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Email</label>
            <div class="relative">
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Masukkan alamat email" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">mail</span>
            </div>
        </div>

        <!-- Input Password -->
        <div class="space-y-2">
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Password</label>
            <div class="relative">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Buat password" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                
                <button type="button" onclick="const p = document.getElementById('password'); const i = document.getElementById('passwordIcon'); if(p.type === 'password'){ p.type = 'text'; i.innerText = 'visibility_off'; } else { p.type = 'password'; i.innerText = 'visibility'; }" class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 flex items-center justify-center rounded-md text-on-surface-variant hover:text-on-surface hover:bg-gray-100 transition">
                    <span id="passwordIcon" class="material-symbols-outlined text-xl">visibility</span>
                </button>
            </div>
        </div>

        <!-- Input Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Konfirmasi Password</label>
            <div class="relative">
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Ulangi password" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                
                <button type="button" onclick="const p = document.getElementById('password_confirmation'); const i = document.getElementById('passwordConfirmIcon'); if(p.type === 'password'){ p.type = 'text'; i.innerText = 'visibility_off'; } else { p.type = 'password'; i.innerText = 'visibility'; }" class="absolute right-2 top-1/2 -translate-y-1/2 w-9 h-9 flex items-center justify-center rounded-md text-on-surface-variant hover:text-on-surface hover:bg-gray-100 transition">
                    <span id="passwordConfirmIcon" class="material-symbols-outlined text-xl">visibility</span>
                </button>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="pt-2">
            <button type="submit" class="w-full h-12 bg-primary hover:bg-primary-container active:scale-[0.99] text-white font-semibold text-sm uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                <span>Daftar Sekarang</span>
                <span class="material-symbols-outlined text-lg">person_add</span>
            </button>
        </div>

        <!-- Link ke Halaman Login -->
        <div class="text-center mt-4">
            <span class="text-sm text-on-surface-variant">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-sm font-semibold text-primary hover:text-primary-container transition ml-1">Masuk di sini</a>
        </div>
        
    </form>
</x-guest-layout>