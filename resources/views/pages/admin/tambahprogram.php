```blade
@extends('layouts.admin')

@section('title', 'Tambah Program')

@section('content')

    {{-- ========================================================= --}}
    {{-- BREADCRUMB --}}
    {{-- ========================================================= --}}

    <div class="mb-unit-lg">

        <div class="flex items-center gap-2 text-sm">

            <span class="text-on-surface-variant">
                Program KRM
            </span>

            <span class="material-symbols-outlined text-[18px] text-on-surface-variant">
                chevron_right
            </span>

            <span class="font-medium text-primary">
                Tambah Program
            </span>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-unit-xl flex items-start justify-between gap-unit-lg">

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-on-surface">
                Tambah Program Baru
            </h1>

            <p class="mt-2 text-sm text-on-surface-variant">
                Isi detail program KRM Surabaya dengan lengkap.
            </p>
        </div>


        {{-- ACTION BUTTON --}}
        <div class="flex items-center gap-unit-sm">

            <a
                href="#"
                class="
                    inline-flex items-center gap-2
                    rounded-lg
                    border border-outline-variant
                    bg-surface-container-lowest
                    px-unit-md py-unit-sm
                    text-sm font-medium
                    text-on-surface
                    transition-colors
                    hover:bg-surface-container-high
                "
            >
                <span class="material-symbols-outlined text-[18px]">
                    close
                </span>

                Batal
            </a>


            <button
                type="submit"
                form="program-form"
                name="status"
                value="draft"
                class="
                    inline-flex items-center gap-2
                    rounded-lg
                    border border-outline-variant
                    bg-surface-container-lowest
                    px-unit-md py-unit-sm
                    text-sm font-medium
                    text-on-surface
                    transition-colors
                    hover:bg-surface-container-high
                "
            >
                <span class="material-symbols-outlined text-[18px]">
                    save
                </span>

                Simpan Draft
            </button>


            <button
                type="submit"
                form="program-form"
                name="status"
                value="published"
                class="
                    inline-flex items-center gap-2
                    rounded-lg
                    bg-primary
                    px-unit-md py-unit-sm
                    text-sm font-medium
                    text-on-primary
                    shadow-sm
                    transition-colors
                    hover:bg-primary-container
                "
            >
                <span class="material-symbols-outlined text-[18px]">
                    publish
                </span>

                Publikasikan
            </button>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- FORM --}}
    {{-- ========================================================= --}}

    <form
        id="program-form"
        action="#"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


        <div class="grid grid-cols-12 gap-unit-lg">


            {{-- ================================================= --}}
            {{-- LEFT CONTENT --}}
            {{-- ================================================= --}}

            <div class="col-span-8 space-y-unit-lg">


                {{-- ============================================= --}}
                {{-- INFORMASI PROGRAM --}}
                {{-- ============================================= --}}

                <section
                    class="
                        rounded-xl
                        border border-outline-variant
                        bg-surface-container-lowest
                        p-unit-lg
                        shadow-sm
                    "
                >

                    <div class="mb-unit-lg">

                        <div class="flex items-center gap-unit-sm">

                            <span
                                class="
                                    flex h-9 w-9
                                    items-center justify-center
                                    rounded-lg
                                    bg-primary
                                    text-on-primary
                                "
                            >
                                <span class="material-symbols-outlined text-[20px]">
                                    description
                                </span>
                            </span>

                            <div>
                                <h2 class="text-lg font-semibold text-on-surface">
                                    Informasi Program
                                </h2>

                                <p class="text-sm text-on-surface-variant">
                                    Informasi dasar mengenai program KRM.
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- NAMA PROGRAM --}}
                    <div class="mb-unit-md">

                        <label
                            for="nama"
                            class="mb-2 block text-sm font-medium text-on-surface"
                        >
                            Nama Program
                        </label>

                        <input
                            id="nama"
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Contoh: Konservasi Mangrove Pesisir Surabaya"
                            class="
                                w-full rounded-lg
                                border border-outline-variant
                                bg-surface-container-lowest
                                px-unit-md py-3
                                text-sm text-on-surface
                                placeholder:text-on-surface-variant
                                focus:border-primary
                                focus:outline-none
                                focus:ring-2 focus:ring-primary/20
                            "
                        >

                        @error('nama')
                            <p class="mt-1 text-xs text-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- DESKRIPSI SINGKAT --}}
                    <div class="mb-unit-md">

                        <label
                            for="deskripsi_singkat"
                            class="mb-2 block text-sm font-medium text-on-surface"
                        >
                            Deskripsi Singkat
                        </label>

                        <textarea
                            id="deskripsi_singkat"
                            name="deskripsi_singkat"
                            rows="3"
                            placeholder="Tuliskan deskripsi singkat mengenai program..."
                            class="
                                w-full resize-none rounded-lg
                                border border-outline-variant
                                bg-surface-container-lowest
                                px-unit-md py-3
                                text-sm text-on-surface
                                placeholder:text-on-surface-variant
                                focus:border-primary
                                focus:outline-none
                                focus:ring-2 focus:ring-primary/20
                            "
                        >{{ old('deskripsi_singkat') }}</textarea>

                        @error('deskripsi_singkat')
                            <p class="mt-1 text-xs text-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- DESKRIPSI LENGKAP --}}
                    <div class="mb-unit-md">

                        <label
                            for="deskripsi_lengkap"
                            class="mb-2 block text-sm font-medium text-on-surface"
                        >
                            Deskripsi Lengkap
                        </label>

                        <textarea
                            id="deskripsi_lengkap"
                            name="deskripsi_lengkap"
                            rows="6"
                            placeholder="Tuliskan penjelasan lengkap mengenai program..."
                            class="
                                w-full resize-none rounded-lg
                                border border-outline-variant
                                bg-surface-container-lowest
                                px-unit-md py-3
                                text-sm text-on-surface
                                placeholder:text-on-surface-variant
                                focus:border-primary
                                focus:outline-none
                                focus:ring-2 focus:ring-primary/20
                            "
                        >{{ old('deskripsi_lengkap') }}</textarea>

                        @error('deskripsi_lengkap')
                            <p class="mt-1 text-xs text-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- TUJUAN --}}
                    <div class="mb-unit-md">

                        <label
                            for="tujuan"
                            class="mb-2 block text-sm font-medium text-on-surface"
                        >
                            Tujuan
                        </label>

                        <textarea
                            id="tujuan"
                            name="tujuan"
                            rows="4"
                            placeholder="Tuliskan tujuan dari program..."
                            class="
                                w-full resize-none rounded-lg
                                border border-outline-variant
                                bg-surface-container-lowest
                                px-unit-md py-3
                                text-sm text-on-surface
                                placeholder:text-on-surface-variant
                                focus:border-primary
                                focus:outline-none
                                focus:ring-2 focus:ring-primary/20
                            "
                        >{{ old('tujuan') }}</textarea>

                        @error('tujuan')
                            <p class="mt-1 text-xs text-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- MANFAAT --}}
                    <div>

                        <label
                            for="manfaat"
                            class="mb-2 block text-sm font-medium text-on-surface"
                        >
                            Manfaat
                        </label>

                        <textarea
                            id="manfaat"
                            name="manfaat"
                            rows="4"
                            placeholder="Tuliskan manfaat dari program..."
                            class="
                                w-full resize-none rounded-lg
                                border border-outline-variant
                                bg-surface-container-lowest
                                px-unit-md py-3
                                text-sm text-on-surface
                                placeholder:text-on-surface-variant
                                focus:border-primary
                                focus:outline-none
                                focus:ring-2 focus:ring-primary/20
                            "
                        >{{ old('manfaat') }}</textarea>

                        @error('manfaat')
                            <p class="mt-1 text-xs text-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </section>



                {{-- ============================================= --}}
                {{-- AKTIVITAS PROGRAM --}}
                {{-- ============================================= --}}

                <section
                    class="
                        rounded-xl
                        border border-outline-variant
                        bg-surface-container-lowest
                        p-unit-lg
                        shadow-sm
                    "
                >

                    <div class="mb-unit-lg flex items-center justify-between">

                        <div class="flex items-center gap-unit-sm">

                            <span
                                class="
                                    flex h-9 w-9
                                    items-center justify-center
                                    rounded-lg
                                    bg-primary
                                    text-on-primary
                                "
                            >
                                <span class="material-symbols-outlined text-[20px]">
                                    event
                                </span>
                            </span>

                            <div>
                                <h2 class="text-lg font-semibold text-on-surface">
                                    Aktivitas Program
                                </h2>

                                <p class="text-sm text-on-surface-variant">
                                    Tambahkan aktivitas yang terdapat dalam program.
                                </p>
                            </div>

                        </div>


                        <button
                            type="button"
                            class="
                                inline-flex items-center gap-2
                                rounded-lg
                                border border-primary
                                px-unit-md py-unit-sm
                                text-sm font-medium
                                text-primary
                                transition-colors
                                hover:bg-primary hover:text-on-primary
                            "
                        >
                            <span class="material-symbols-outlined text-[18px]">
                                add
                            </span>

                            Tambah Aktivitas
                        </button>

                    </div>


                    {{-- ACTIVITY CARD --}}
                    <div
                        class="
                            rounded-lg
                            border border-outline-variant
                            bg-surface-container-low
                            p-unit-md
                        "
                    >

                        <div class="mb-unit-md flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="text-sm font-semibold text-primary">
                                    Aktivitas 1
                                </span>

                            </div>

                            <button
                                type="button"
                                class="rounded-lg p-2 text-error hover:bg-error-container"
                            >
                                <span class="material-symbols-outlined text-[20px]">
                                    delete
                                </span>
                            </button>

                        </div>


                        <div class="grid grid-cols-2 gap-unit-md">

                            {{-- NAMA --}}
                            <div>

                                <label
                                    for="aktivitas_nama"
                                    class="mb-2 block text-sm font-medium text-on-surface"
                                >
                                    Nama Aktivitas
                                </label>

                                <input
                                    id="aktivitas_nama"
                                    type="text"
                                    name="aktivitas[0][nama]"
                                    placeholder="Contoh: Penanaman Mangrove"
                                    class="
                                        w-full rounded-lg
                                        border border-outline-variant
                                        bg-surface-container-lowest
                                        px-unit-md py-3
                                        text-sm
                                        focus:border-primary
                                        focus:outline-none
                                        focus:ring-2 focus:ring-primary/20
                                    "
                                >

                            </div>


                            {{-- TANGGAL --}}
                            <div>

                                <label
                                    for="aktivitas_tanggal"
                                    class="mb-2 block text-sm font-medium text-on-surface"
                                >
                                    Tanggal
                                </label>

                                <input
                                    id="aktivitas_tanggal"
                                    type="date"
                                    name="aktivitas[0][tanggal]"
                                    class="
                                        w-full rounded-lg
                                        border border-outline-variant
                                        bg-surface-container-lowest
                                        px-unit-md py-3
                                        text-sm
                                        focus:border-primary
                                        focus:outline-none
                                        focus:ring-2 focus:ring-primary/20
                                    "
                                >

                            </div>


                            {{-- DESKRIPSI --}}
                            <div>

                                <label
                                    for="aktivitas_deskripsi"
                                    class="mb-2 block text-sm font-medium text-on-surface"
                                >
                                    Deskripsi Aktivitas
                                </label>

                                <textarea
                                    id="aktivitas_deskripsi"
                                    name="aktivitas[0][deskripsi]"
                                    rows="3"
                                    placeholder="Jelaskan aktivitas..."
                                    class="
                                        w-full resize-none rounded-lg
                                        border border-outline-variant
                                        bg-surface-container-lowest
                                        px-unit-md py-3
                                        text-sm
                                        focus:border-primary
                                        focus:outline-none
                                        focus:ring-2 focus:ring-primary/20
                                    "
                                ></textarea>

                            </div>


                            {{-- LOKASI --}}
                            <div>

                                <label
                                    for="aktivitas_lokasi"
                                    class="mb-2 block text-sm font-medium text-on-surface"
                                >
                                    Lokasi
                                </label>

                                <input
                                    id="aktivitas_lokasi"
                                    type="text"
                                    name="aktivitas[0][lokasi]"
                                    placeholder="Contoh: Kawasan Mangrove Wonorejo"
                                    class="
                                        w-full rounded-lg
                                        border border-outline-variant
                                        bg-surface-container-lowest
                                        px-unit-md py-3
                                        text-sm
                                        focus:border-primary
                                        focus:outline-none
                                        focus:ring-2 focus:ring-primary/20
                                    "
                                >

                            </div>

                        </div>

                    </div>

                </section>

            </div>



            {{-- ================================================= --}}
            {{-- RIGHT CONTENT --}}
            {{-- ================================================= --}}

            <div class="col-span-4 space-y-unit-lg">


                {{-- ============================================= --}}
                {{-- DOKUMENTASI --}}
                {{-- ============================================= --}}

                <section
                    class="
                        rounded-xl
                        border border-outline-variant
                        bg-surface-container-lowest
                        p-unit-lg
                        shadow-sm
                    "
                >

                    <div class="mb-unit-md">

                        <h2 class="text-lg font-semibold text-on-surface">
                            Dokumentasi
                        </h2>

                        <p class="mt-1 text-sm text-on-surface-variant">
                            Tambahkan foto atau video dokumentasi program.
                        </p>

                    </div>


                    <label
                        for="dokumentasi"
                        class="
                            flex cursor-pointer
                            flex-col items-center justify-center
                            rounded-xl
                            border-2 border-dashed
                            border-outline-variant
                            bg-surface-container-low
                            px-unit-md py-unit-xl
                            text-center
                            transition-colors
                            hover:border-primary
                            hover:bg-surface-container
                        "
                    >

                        <span
                            class="
                                mb-unit-md
                                flex h-12 w-12
                                items-center justify-center
                                rounded-full
                                bg-surface-container-high
                                text-primary
                            "
                        >
                            <span class="material-symbols-outlined">
                                cloud_upload
                            </span>
                        </span>

                        <p class="text-sm font-medium text-on-surface">
                            Klik untuk upload
                        </p>

                        <p class="mt-1 text-xs text-on-surface-variant">
                            atau drag & drop file di sini
                        </p>

                        <p class="mt-unit-md text-xs text-on-surface-variant">
                            JPG, PNG, MP4 • Maks. 10MB
                        </p>

                        <input
                            id="dokumentasi"
                            type="file"
                            name="dokumentasi[]"
                            multiple
                            accept="image/jpeg,image/png,video/mp4"
                            class="hidden"
                        >

                    </label>


                    {{-- PREVIEW --}}
                    <div
                        id="preview-container"
                        class="mt-unit-md grid grid-cols-2 gap-unit-sm"
                    ></div>

                </section>



                {{-- ============================================= --}}
                {{-- PUBLIKASI --}}
                {{-- ============================================= --}}

                <section
                    class="
                        rounded-xl
                        border border-outline-variant
                        bg-surface-container-lowest
                        p-unit-lg
                        shadow-sm
                    "
                >

                    <div class="flex items-start justify-between gap-unit-md">

                        <div>

                            <h2 class="text-lg font-semibold text-on-surface">
                                Publikasi
                            </h2>

                            <p class="mt-1 text-sm text-on-surface-variant">
                                Tentukan apakah program dapat dilihat oleh publik.
                            </p>

                        </div>


                        <label class="relative inline-flex cursor-pointer">

                            <input
                                type="checkbox"
                                name="publik"
                                value="1"
                                class="peer sr-only"
                                checked
                            >

                            <div
                                class="
                                    h-6 w-11
                                    rounded-full
                                    bg-surface-container-highest
                                    transition
                                    peer-checked:bg-primary
                                    after:absolute
                                    after:left-[2px]
                                    after:top-[2px]
                                    after:h-5
                                    after:w-5
                                    after:rounded-full
                                    after:bg-white
                                    after:transition-all
                                    peer-checked:after:translate-x-full
                                "
                            ></div>

                        </label>

                    </div>

                </section>

            </div>

        </div>

    </form>

@endsection


@push('scripts')

<script>
    const fileInput = document.getElementById('dokumentasi');
    const previewContainer = document.getElementById('preview-container');

    if (fileInput) {

        fileInput.addEventListener('change', function () {

            previewContainer.innerHTML = '';

            Array.from(this.files).forEach(function (file) {

                const wrapper = document.createElement('div');

                wrapper.className =
                    'overflow-hidden rounded-lg border border-outline-variant bg-surface-container-low';

                if (file.type.startsWith('image/')) {

                    const image = document.createElement('img');

                    image.src = URL.createObjectURL(file);
                    image.className = 'h-32 w-full object-cover';

                    wrapper.appendChild(image);

                } else if (file.type.startsWith('video/')) {

                    const video = document.createElement('video');

                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    video.className = 'h-32 w-full object-cover';

                    wrapper.appendChild(video);

                }

                const filename = document.createElement('p');

                filename.className =
                    'truncate px-2 py-2 text-xs text-on-surface-variant';

                filename.textContent = file.name;

                wrapper.appendChild(filename);

                previewContainer.appendChild(wrapper);

            });

        });

    }
</script>

@endpush