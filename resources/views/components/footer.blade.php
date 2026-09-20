<footer class="krm-footer">
    <div class="container">
        <div class="krm-footer__grid">
            <div class="krm-footer__brand">
                <img src="{{ asset('assets/logo krm.jpg') }}" alt="Logo Kebun Raya Mangrove Surabaya" class="krm-footer__logo">
                <p>Kebun Raya Mangrove Surabaya &mdash; konservasi alam, inovasi teknologi, pemberdayaan pesisir.</p>
            </div>

            <div class="krm-footer__col">
                <h6>Program</h6>
                <ul>
                    <li><a href="{{ route('pirolisis') }}">Pirolisis</a></li>
                    <li><a href="{{ route('solar-cell') }}">Solar Cell</a></li>
                    <li><a href="{{ route('silvo-fishery') }}">Silvo Fishery</a></li>
                    <li><a href="{{ route('terangin') }}">Terangin</a></li>
                </ul>
            </div>

            <div class="krm-footer__col">
                <h6>Informasi</h6>
                <ul>
                    <li><a href="{{ route('program') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('biodiversitas') }}">Biodiversitas</a></li>
                    <li><a href="{{ route('produk-olahan') }}">Produk Olahan</a></li>
                    <li><a href="{{ route('csr') }}">CSR</a></li>
                    <li><a href="{{ route('karbon-trading') }}">Karbon Trading</a></li>
                    <li><a href="{{ route('hubungi-kami') }}">Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="krm-footer__col">
                <h6>Hubungi</h6>
                <ul class="krm-footer__contact">
                    <li><i class="fa-solid fa-location-dot"></i> Jl. Raya Tambak Wedi, Surabaya</li>
                    <li><i class="fa-solid fa-phone"></i> +62 31 100-0000</li>
                    <li><i class="fa-solid fa-envelope"></i> info&#64;krm-surabaya.id</li>
                </ul>
            </div>
        </div>

        <div class="krm-footer__bottom">
            <p>&copy; {{ date('Y') }} Kebun Raya Mangrove Surabaya. Hak cipta dilindungi.</p>
        </div>
    </div>
</footer>