@props(['active' => ''])

{{-- Material Symbols --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >

<header class="krm-navbar" id="krmNavbar">
    <nav class="navbar navbar-expand-lg">
        <div class="container krm-navbar__inner">
            <a class="krm-navbar__brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo krm.jpg') }}" alt="Logo Kebun Raya Mangrove Surabaya" class="krm-navbar__logo">
            </a>

            <div class="collapse navbar-collapse" id="krmNavMenu">
                <ul class="krm-navbar__menu">
                    <li>
                        <a href="{{ route('home') }}" class="{{ $active === 'home' ? 'is-active' : '' }}">Home</a>
                    </li>

                    {{-- Program: dropdown --}}
                    <li class="krm-navbar__dropdown">
                        <a href="{{ route('program') }}"
                           class="krm-navbar__dropdown-toggle {{ $active === 'program' ? 'is-active' : '' }}"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Program
                        </a>
                        <div class="dropdown-menu krm-program-dropdown">
                            <span class="krm-program-dropdown__eyebrow">PROGRAM</span>
                            <a href="{{ route('pirolisis') }}" class="krm-program-dropdown__item">
                                <span class="krm-program-dropdown__icon"><i class="fa-solid fa-fire-flame-curved"></i></span>
                                <span>Pirolisis</span>
                            </a>
                            <a href="{{ route('solar-cell') }}" class="krm-program-dropdown__item">
                                <span class="krm-program-dropdown__icon"><i class="fa-solid fa-solar-panel"></i></span>
                                <span>Solar Cell</span>
                            </a>
                            <a href="{{ route('silvo-fishery') }}" class="krm-program-dropdown__item">
                                <span class="krm-program-dropdown__icon"><i class="fa-solid fa-fish"></i></span>
                                <span>Silvo Fishery</span>
                            </a>
                            <a href="{{ route('terangin') }}" class="krm-program-dropdown__item">
                                <span class="krm-program-dropdown__icon"><i class="fa-solid fa-wind"></i></span>
                                <span>Terangin</span>
                            </a>
                        </div>
                    </li>

                    <li><a href="{{ route('biodiversitas') }}" class="{{ $active === 'biodiversitas' ? 'is-active' : '' }}">Koleksi Biodiversitas</a></li>
                    <li><a href="{{ route('produk-olahan') }}" class="{{ $active === 'produk-olahan' ? 'is-active' : '' }}">Produk Olahan Mangrove</a></li>
                    <li><a href="{{ route('csr') }}" class="{{ $active === 'csr' ? 'is-active' : '' }}">CSR</a></li>
                    <li><a href="{{ route('karbon-trading') }}" class="{{ $active === 'karbon-trading' ? 'is-active' : '' }}">Karbon Trading</a></li>
                    <li><a href="{{ route('hubungi-kami') }}" class="{{ $active === 'hubungi-kami' ? 'is-active' : '' }}" style="text-decoration: none;">Hubungi Kami</a></li>
                    <li>
    <a href="{{ route('admin.dashboard') }}" 
       class="flex h-8 w-8 items-center justify-center rounded-full {{ $active === 'admin.dashboard' ? 'ring-2 ring-offset-2 ring-primary' : '' }}" 
       style="text-decoration: none;"
       title="Admin">
        <span class="material-symbols-outlined text-[18px] text-on-primary">
            person
        </span>
    </a>
</li>
                </ul>
            </div>
        </div>
    </nav>
</header>