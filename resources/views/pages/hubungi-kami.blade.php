@extends('layouts.app')

@section('title', 'Hubungi Kami — Kebun Raya Mangrove Surabaya')
@php($active = 'hubungi-kami')

@section('content')

    <x-hero
        image="assets/Hubungi Kami Hero.jpg"
        eyebrow="KEBUN RAYA MANGROVE SURABAYA"
        title="Hubungi Kami"
        description="Punya pertanyaan seputar kunjungan, kemitraan CSR, karbon trading, atau produk olahan mangrove? Tim kami siap membantu."
    />

    <section style="padding-top: 48px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="krm-card-plain h-100" data-animate="fade-up">

    <h2 class="h5 fw-bold mb-3" style="color:var(--krm-forest);">
        Kirim Pesan
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        class="krm-form row g-3"
        action="{{ route('hubungi-kami.store') }}"
        method="POST"
    >
        @csrf

        <div class="col-md-6">
            <label for="nama">Nama Lengkap</label>

            <input
                type="text"
                class="form-control @error('nama') is-invalid @enderror"
                id="nama"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Nama Anda"
                required
            >

            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="email">Email</label>

            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                required
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="telepon">Nomor Telepon</label>

            <input
                type="tel"
                class="form-control @error('telepon') is-invalid @enderror"
                id="telepon"
                name="telepon"
                value="{{ old('telepon') }}"
                placeholder="08xx-xxxx-xxxx"
            >

            @error('telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="topik">Topik</label>

            <select
                class="form-select @error('topik') is-invalid @enderror"
                id="topik"
                name="topik"
                required
            >
                <option value="">Pilih Topik</option>

                <option value="Kunjungan & Edukasi"
                    {{ old('topik') == 'Kunjungan & Edukasi' ? 'selected' : '' }}>
                    Kunjungan & Edukasi
                </option>

                <option value="Kemitraan CSR"
                    {{ old('topik') == 'Kemitraan CSR' ? 'selected' : '' }}>
                    Kemitraan CSR
                </option>

                <option value="Karbon Trading"
                    {{ old('topik') == 'Karbon Trading' ? 'selected' : '' }}>
                    Karbon Trading
                </option>

                <option value="Produk Olahan Mangrove"
                    {{ old('topik') == 'Produk Olahan Mangrove' ? 'selected' : '' }}>
                    Produk Olahan Mangrove
                </option>

                <option value="Lainnya"
                    {{ old('topik') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>

            @error('topik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="pesan">Pesan</label>

            <textarea
                class="form-control @error('pesan') is-invalid @enderror"
                id="pesan"
                name="pesan"
                rows="5"
                placeholder="Tuliskan pesan Anda di sini..."
                required
            >{{ old('pesan') }}</textarea>

            @error('pesan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <button
                type="submit"
                class="btn krm-btn krm-btn--primary w-100 justify-content-center"
            >
                Kirim Pesan
            </button>
        </div>

    </form>

</div>
                </div>

                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-3 h-100">
                        <div class="krm-card-plain" data-animate="fade-up">
                            <span class="krm-program-card__icon"><i class="fa-solid fa-location-dot"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Alamat</h3>
                            <p class="krm-muted small mb-0">Jl. Raya Tambak Wedi, Kenjeran, Surabaya, Jawa Timur</p>
                        </div>
                        <div class="krm-card-plain" data-animate="fade-up">
                            <span class="krm-program-card__icon"><i class="fa-solid fa-phone"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Telepon</h3>
                            <p class="krm-muted small mb-0">+62 31 100-0000</p>
                        </div>
                        <div class="krm-card-plain" data-animate="fade-up">
                            <span class="krm-program-card__icon"><i class="fa-solid fa-envelope"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Email</h3>
                            <p class="krm-muted small mb-0">info@krm-surabaya.id</p>
                        </div>
                        <div class="krm-card-plain" data-animate="fade-up">
                            <span class="krm-program-card__icon"><i class="fa-regular fa-clock"></i></span>
                            <h3 class="h6 fw-bold" style="color:var(--krm-forest);">Jam Kunjungan</h3>
                            <p class="krm-muted small mb-0">Selasa &ndash; Minggu, 08.00 &ndash; 16.00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection