<x-guest-layout>

    <!-- Bagian Judul & Deskripsi -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold tracking-tight text-on-surface mb-3">Atur Ulang Password</h2>
        <p class="text-sm leading-relaxed text-on-surface-variant">
            Silakan buat password baru untuk akun Anda. Pastikan password mudah diingat dan aman.
        </p>
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

    <!-- Form Reset Password -->
    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Input Email -->
        <div class="space-y-2">
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Email Terdaftar</label>
            <div class="relative">
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Masukkan alamat email Anda" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">mail</span>
            </div>
        </div>

        <!-- Input Password Baru -->
        <div class="space-y-2">
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Password Baru</label>
            <div class="relative">
                <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Masukkan password baru" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">lock</span>
            </div>
        </div>

        <!-- Input Konfirmasi Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-on-surface">Konfirmasi Password Baru</label>
            <div class="relative">
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Ulangi password baru Anda" class="w-full h-12 px-4 pr-12 bg-white border border-outline-variant rounded-lg text-sm text-on-surface placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#004d35]/20 focus:border-[#004d35] transition">
                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant">lock_reset</span>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="pt-2">
            <button type="submit" class="w-full h-12 bg-primary hover:bg-primary-container active:scale-[0.99] text-white font-semibold text-sm uppercase tracking-wider rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                <span>Simpan Password</span>
                <span class="material-symbols-outlined text-lg">check_circle</span>
            </button>
        </div>

        <!-- Tombol Batal / Kembali (Opsional) -->
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-secondary hover:text-primary transition group">
                <span class="material-symbols-outlined text-base group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Batal dan kembali ke halaman Masuk
            </a>
        </div>
    </form>
    
</x-guest-layout>