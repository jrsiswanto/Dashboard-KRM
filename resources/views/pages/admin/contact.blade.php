@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')

    {{-- HEADER HALAMAN --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="flex flex-col gap-unit-md">

            <h1 class="text-3xl font-semibold text-on-surface">
                Pesan Masuk
            </h1>

            <p class="text-base text-on-surface-variant">
                Daftar pesan yang dikirim melalui halaman Hubungi Kami Kebun Raya Mangrove Surabaya.
            </p>

        </div>

    </div>


    {{-- NOTIFIKASI SUKSES --}}
    @if (session('success'))

        <div class="mt-6 flex items-center justify-between rounded-xl bg-primary/10 p-unit-lg text-primary">

            <div class="flex items-center gap-2">

                <span class="material-symbols-outlined text-[20px]">
                    check_circle
                </span>

                <span class="text-sm font-medium">
                    {{ session('success') }}
                </span>

            </div>

        </div>

    @endif


    {{-- RINGKASAN --}}
    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        {{-- TOTAL --}}
        <div class="rounded-xl bg-surface-container-low p-unit-lg">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary/10 text-primary">

                    <span class="material-symbols-outlined">
                        mail
                    </span>

                </div>

                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Total Pesan
                    </p>

                    <p class="mt-1 text-2xl font-semibold text-on-surface">
                        {{ $totalPesan }}
                    </p>

                </div>

            </div>

        </div>


        {{-- BARU --}}
        <div class="rounded-xl bg-surface-container-low p-unit-lg">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary/10 text-primary">

                    <span class="material-symbols-outlined">
                        mark_email_unread
                    </span>

                </div>

                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Pesan Baru
                    </p>

                    <p class="mt-1 text-2xl font-semibold text-on-surface">
                        {{ $pesanBaru }}
                    </p>

                </div>

            </div>

        </div>


        {{-- DIBACA --}}
        <div class="rounded-xl bg-surface-container-low p-unit-lg">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-container-high text-on-surface-variant">

                    <span class="material-symbols-outlined">
                        draft
                    </span>

                </div>

                <div>

                    <p class="text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Sudah Dibaca
                    </p>

                    <p class="mt-1 text-2xl font-semibold text-on-surface">
                        {{ $pesanDibaca }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- TABEL PESAN --}}
    <div class="mt-6 overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">

        <div class="flex items-center justify-between bg-surface-container-low p-unit-lg">

            <h2 class="text-xl font-semibold text-on-surface">
                Daftar Pesan
            </h2>

            <span class="text-xs font-medium text-on-surface-variant">
                Total: {{ $totalPesan }} Data
            </span>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-surface-container-low text-xs font-medium uppercase text-on-surface-variant">

                    <tr>

                        <th class="px-unit-lg py-unit-sm">
                            Pengirim
                        </th>

                        <th class="px-unit-lg py-unit-sm">
                            Topik
                        </th>

                        <th class="px-unit-lg py-unit-sm">
                            Tanggal
                        </th>

                        <th class="px-unit-lg py-unit-sm">
                            Status
                        </th>

                        <th class="px-unit-lg py-unit-sm text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="text-sm text-on-surface">

                    @forelse ($contacts as $contact)

                        <tr class="group border-t border-outline-variant/40 transition-colors hover:bg-surface-container">

                            {{-- PENGIRIM --}}
                            <td class="px-unit-lg py-unit-md">

                                <div class="flex flex-col">

                                    <span class="font-medium text-on-surface">
                                        {{ $contact->nama }}
                                    </span>

                                    <span class="text-xs text-on-surface-variant">
                                        {{ $contact->email }}
                                    </span>

                                </div>

                            </td>


                            {{-- TOPIK --}}
                            <td class="px-unit-lg py-unit-md text-on-surface-variant">
                                {{ $contact->topik }}
                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-unit-lg py-unit-md text-on-surface-variant">
                                {{ $contact->created_at->translatedFormat('d F Y, H:i') }}
                            </td>


                            {{-- STATUS --}}
                            <td class="px-unit-lg py-unit-md">

                                @if ($contact->status === 'baru')

                                    <span class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">
                                        Baru
                                    </span>

                                @else

                                    <span class="inline-flex items-center rounded-full bg-surface-container-high px-3 py-1 text-xs font-medium text-on-surface-variant">
                                        Dibaca
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-unit-lg py-unit-md text-right">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- LIHAT PESAN --}}
                                    <button
                                        type="button"
                                        onclick="openMessageModal(
                                            {{ $contact->id }},
                                            @js($contact->nama),
                                            @js($contact->email),
                                            @js($contact->telepon ?? '-'),
                                            @js($contact->topik),
                                            @js($contact->pesan),
                                            @js($contact->created_at->translatedFormat('d F Y, H:i')),
                                            @js($contact->status)
                                        )"
                                        title="Lihat Pesan"
                                        class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary"
                                    >

                                        <span class="material-symbols-outlined text-[18px]">
                                            visibility
                                        </span>

                                    </button>


                                    {{-- TANDAI DIBACA --}}
                                    @if ($contact->status === 'baru')

                                        <form
                                            action="{{ route('admin.contact.read', $contact) }}"
                                            method="POST"
                                            class="inline"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                title="Tandai sebagai Dibaca"
                                                class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary"
                                            >

                                                <span class="material-symbols-outlined text-[18px]">
                                                    mark_email_read
                                                </span>

                                            </button>

                                        </form>

                                    @endif


                                    {{-- HAPUS --}}
                                    <button
                                        type="button"
                                        onclick="openDeleteModal({{ $contact->id }})"
                                        title="Hapus"
                                        class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-error-container hover:text-error"
                                    >

                                        <span class="material-symbols-outlined text-[18px]">
                                            delete
                                        </span>

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-unit-lg py-8 text-center text-sm text-on-surface-variant"
                            >
                                Belum ada pesan masuk.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL DETAIL PESAN --}}
    {{-- ========================================================= --}}

    <dialog
        id="messageModal"
        class="m-auto w-full max-w-2xl border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm"
    >

        <div class="w-full max-w-2xl overflow-hidden rounded-xl bg-surface-container p-unit-lg shadow-lg">

            {{-- HEADER MODAL --}}
            <div class="mb-5 flex items-center justify-between border-b border-outline-variant pb-4">

                <div>

                    <h3 class="text-xl font-semibold text-on-surface">
                        Detail Pesan
                    </h3>

                    <p class="mt-1 text-xs text-on-surface-variant">
                        Pesan dari halaman Hubungi Kami
                    </p>

                </div>

                <button
                    type="button"
                    onclick="closeMessageModal()"
                    class="text-on-surface-variant hover:text-on-surface"
                >

                    <span class="material-symbols-outlined">
                        close
                    </span>

                </button>

            </div>


            {{-- INFORMASI PENGIRIM --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Nama Lengkap
                    </label>

                    <div
                        id="message_nama"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>


                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Email
                    </label>

                    <div
                        id="message_email"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>


                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Nomor Telepon
                    </label>

                    <div
                        id="message_telepon"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>


                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Topik
                    </label>

                    <div
                        id="message_topik"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>


                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Tanggal
                    </label>

                    <div
                        id="message_tanggal"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>


                <div>

                    <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                        Status
                    </label>

                    <div
                        id="message_status"
                        class="rounded-xl bg-surface-container-low px-4 py-2.5 text-sm text-on-surface"
                    >
                    </div>

                </div>

            </div>


            {{-- ISI PESAN --}}
            <div class="mt-5">

                <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">
                    Isi Pesan
                </label>

                <div
                    id="message_pesan"
                    class="min-h-[150px] whitespace-pre-line rounded-xl bg-surface-container-low px-4 py-3 text-sm leading-6 text-on-surface"
                >
                </div>

            </div>


            {{-- FOOTER --}}
            <div class="mt-6 flex justify-end gap-2 border-t border-outline-variant pt-4">

                <button
                    type="button"
                    onclick="closeMessageModal()"
                    class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container"
                >
                    Tutup
                </button>

                <form
                    id="readForm"
                    action=""
                    method="POST"
                >

                    @csrf
                    @method('PATCH')

                    <button
                        id="readButton"
                        type="submit"
                        class="flex items-center gap-2 rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container"
                    >

                        <span class="material-symbols-outlined text-[17px]">
                            mark_email_read
                        </span>

                        Tandai Dibaca

                    </button>

                </form>

            </div>

        </div>

    </dialog>


    {{-- ========================================================= --}}
    {{-- MODAL KONFIRMASI HAPUS --}}
    {{-- ========================================================= --}}

    <dialog
        id="deleteModal"
        class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm"
    >

        <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-container p-unit-lg shadow-lg">

            <div class="flex flex-col items-center gap-2 text-center">

                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-error">

                    <span class="material-symbols-outlined text-[24px]">
                        warning
                    </span>

                </div>


                <h3 class="text-lg font-semibold text-on-surface">
                    Konfirmasi Hapus
                </h3>


                <p class="text-xs text-on-surface-variant">
                    Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan.
                </p>

            </div>


            <form
                id="deleteForm"
                action=""
                method="POST"
                class="mt-6 flex justify-center gap-2"
            >

                @csrf
                @method('DELETE')


                <button
                    type="button"
                    onclick="closeDeleteModal()"
                    class="w-full rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="w-full rounded-xl bg-error-container px-4 py-2 text-xs font-medium uppercase tracking-widest text-error transition-colors hover:opacity-80"
                >
                    Hapus
                </button>

            </form>

        </div>

    </dialog>

@endsection


@push('scripts')

<script>

    /*
    |--------------------------------------------------------------------------
    | URL DASAR
    |--------------------------------------------------------------------------
    */

    const contactBaseUrl = "{{ url('/admin/pesan') }}";


    /*
    |--------------------------------------------------------------------------
    | MODAL DETAIL PESAN
    |--------------------------------------------------------------------------
    */

    function openMessageModal(
        id,
        nama,
        email,
        telepon,
        topik,
        pesan,
        tanggal,
        status
    ) {

        document.getElementById('message_nama').textContent = nama;

        document.getElementById('message_email').textContent = email;

        document.getElementById('message_telepon').textContent = telepon;

        document.getElementById('message_topik').textContent = topik;

        document.getElementById('message_tanggal').textContent = tanggal;

        document.getElementById('message_pesan').textContent = pesan;


        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        const statusElement = document.getElementById('message_status');

        if (status === 'baru') {

            statusElement.innerHTML = `
                <span class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary">
                    Baru
                </span>
            `;

        } else {

            statusElement.innerHTML = `
                <span class="inline-flex items-center rounded-full bg-surface-container-high px-3 py-1 text-xs font-medium text-on-surface-variant">
                    Dibaca
                </span>
            `;

        }


        /*
        |--------------------------------------------------------------------------
        | FORM TANDAI DIBACA
        |--------------------------------------------------------------------------
        */

        const readForm = document.getElementById('readForm');

        const readButton = document.getElementById('readButton');

        readForm.action = `${contactBaseUrl}/${id}/dibaca`;


        if (status === 'dibaca') {

            readButton.style.display = 'none';

        } else {

            readButton.style.display = 'flex';

        }


        /*
        |--------------------------------------------------------------------------
        | BUKA MODAL
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('messageModal')
            .showModal();
    }


    function closeMessageModal() {

        document
            .getElementById('messageModal')
            .close();
    }


    /*
    |--------------------------------------------------------------------------
    | MODAL HAPUS
    |--------------------------------------------------------------------------
    */

    function openDeleteModal(id) {

        document.getElementById('deleteForm').action =
            `${contactBaseUrl}/${id}`;

        document
            .getElementById('deleteModal')
            .showModal();
    }


    function closeDeleteModal() {

        document
            .getElementById('deleteModal')
            .close();
    }

</script>

@endpush