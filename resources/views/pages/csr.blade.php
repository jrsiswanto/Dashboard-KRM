@extends('layouts.app')

@section('title', 'CSR Partnership — Kebun Raya Mangrove Surabaya')
@php($active = 'csr')

@section('content')

    <x-hero
        image="assets/Csr Hero.jpg"
        eyebrow="KOLABORASI & KEMITRAAN"
        title="Bermitra Bersama Melestarikan Pesisir Surabaya"
        highlight="Bermitra Bersama"
        description="Salurkan program Tanggung Jawab Sosial Lingkungan (TJSL/CSR) perusahaan Anda melalui aksi nyata penanaman mangrove, edukasi ekologis, dan pemberdayaan masyarakat."
    />

    <section class="py-5" style="background-color: var(--krm-bg, #f8fbf9);">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="krm-card-plain p-4 p-md-5 rounded-4 shadow-sm bg-white border">
                        <div class="mb-4">
                            <h2 class="h3 fw-bold" style="color: var(--krm-forest, #0b3d2e);">Tertarik Bermitra?</h2>
                            <p class="text-muted small">Isi formulir di bawah ini untuk mendiskusikan peluang kemitraan CSR, penanaman pohon, atau kolaborasi ESG khusus untuk perusahaan Anda.</p>
                        </div>

                        <form action="#" method="POST">
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Nama Perusahaan</label>
                                    <input type="text" name="perusahaan" class="form-control" placeholder="PT. Inovasi Hijau" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Email Korporat</label>
                                <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Bentuk Program / Kebutuhan</label>
                                <select name="kategori" class="form-select">
                                    <option value="bibit">Penanaman Bibit Mangrove</option>
                                    <option value="edukasi">Program Edukasi & Pemberdayaan Warga</option>
                                    <option value="offset">Kemitraan Offset Karbon</option>
                                    <option value="lainnya">Kemitraan Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-semibold">Pesan / Objektif CSR &amp; ESG</label>
                                <textarea name="pesan" rows="4" class="form-control" placeholder="Ceritakan singkat tentang target program keberlanjutan perusahaan Anda..." required></textarea>
                            </div>

                            <button type="submit" class="btn w-100 py-2 fw-semibold text-white" style="background-color: var(--krm-forest, #14855e); border-radius: 8px;">
                                Kirim Permintaan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection