@extends('layouts.admin')

@section('title', 'Kelola Program')

@section('content')

    {{-- HEADER HALAMAN & TOMBOL TAMBAH --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-1">
            <h1 class="text-3xl font-semibold text-on-surface">
                Kelola Program
            </h1>
            <p class="text-base text-on-surface-variant">
                Daftar seluruh program dan section konten terkait.
            </p>
        </div>

        <div>
            <button onclick="openCreateModal()"
                type="button"
                class="flex items-center gap-2 rounded-xl bg-primary px-4 py-3 text-xs font-medium uppercase tracking-widest text-on-primary shadow-sm transition-colors hover:bg-primary-container">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Tambah Program
            </button>
        </div>
    </div>


    {{-- NOTIFIKASI SUKSES --}}
    @if (session('success'))
        <div class="mt-6 flex items-center justify-between rounded-xl bg-primary/10 p-4 text-primary">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif


    {{-- TABEL DATA PROGRAM --}}
    <div class="mt-6 overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">

        <div class="flex items-center justify-between bg-surface-container-low p-4">
            <h2 class="text-xl font-semibold text-on-surface">Daftar Program</h2>
            <span class="text-xs font-medium text-on-surface-variant">
                Total: {{ count($programs) }} Data
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-surface-container-low text-xs font-medium uppercase text-on-surface-variant">
                    <tr>
                        <th class="px-4 py-3">Nama Program</th>
                        <th class="px-4 py-3">Judul Hero</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-on-surface">
    @if (count($programs) > 0)
        @foreach ($programs as $prog)
            <tr class="group transition-colors hover:bg-surface-container">

                {{-- NAMA PROGRAM --}}
                <td class="px-4 py-3 font-medium text-on-surface">
                    {{ $prog->nama }}
                </td>

                {{-- JUDUL HERO --}}
                <td class="px-4 py-3 text-on-surface-variant">
                    {{ $prog->judul }}
                </td>

                {{-- STATUS --}}
                <td class="px-4 py-3">
                    @if($prog->status)
                        <span class="inline-flex items-center rounded-md bg-green-500/10 px-2 py-1 text-xs font-medium text-green-600">Aktif</span>
                    @else
                        <span class="inline-flex items-center rounded-md bg-gray-500/10 px-2 py-1 text-xs font-medium text-gray-500">Draft</span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">

                        {{-- TOMBOL EDIT --}}
                        <button type="button"
                            onclick="openEditModal({{ $prog->id }})"
                            title="Edit"
                            class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                        </button>

                        {{-- TOMBOL HAPUS --}}
                        <button type="button"
                            onclick="openDeleteModal({{ $prog->id }})"
                            title="Hapus"
                            class="rounded-lg p-1 text-on-surface-variant transition-colors hover:bg-error-container hover:text-on-error-container">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>

                    </div>
                </td>

            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="px-4 py-8 text-center text-sm text-on-surface-variant">
                Belum ada data program terdaftar.
            </td>
        </tr>
    @endif
</tbody>
            </table>
        </div>

    </div>


    {{-- ==================== MODAL TAMBAH PROGRAM (HTML5 DIALOG) ==================== --}}
    <dialog id="createModal" class="m-auto w-full max-w-3xl border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Tambah Program Baru</h3>
                <button type="button" onclick="closeCreateModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ route('admin.program.save') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @csrf

                {{-- BAGIAN 1: DATA UTAMA --}}
                <div class="space-y-4">
                    <h4 class="font-bold text-on-surface text-base">Data Utama (Hero Section)</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Program (Singkat)</label>
                            <input type="text" name="nama" required placeholder="Contoh: Mangrove Tour"
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status Publikasi</label>
                            <select name="status" class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                                <option value="1">Aktif (Tampil)</option>
                                <option value="0">Draft (Sembunyikan)</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Judul Hero (Lengkap)</label>
                            <input type="text" name="judul" required placeholder="Judul utama tampilan depan"
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Deskripsi Hero</label>
                            <textarea name="deskripsi" rows="3" required placeholder="Penjelasan singkat program..."
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Gambar Utama Hero</label>
                            <input type="file" name="gambar_utama" accept="image/*"
                                class="w-full text-sm text-on-surface-variant file:mr-4 file:rounded-full file:border-0 file:bg-primary file:px-4 file:py-2 file:text-xs file:font-semibold file:text-on-primary hover:file:bg-primary-container">
                        </div>
                    </div>
                </div>

                {{-- BAGIAN 2: KONTEN / SECTION DINAMIS --}}
                <div class="space-y-4 border-t border-outline-variant pt-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-bold text-on-surface text-base">Konten / Section Program</h4>
                        <button type="button" onclick="addCreateContentRow()" class="flex items-center gap-1 rounded-lg border border-primary px-3 py-1.5 text-xs font-medium text-primary hover:bg-primary hover:text-on-primary">
                            <span class="material-symbols-outlined text-[16px]">add</span> Tambah Section
                        </button>
                    </div>

                    <div id="create-contents-container" class="flex flex-col gap-4">
                        {{-- Row Konten Dinamis --}}
                    </div>
                </div>

                {{-- SUBMIT BUTTONS --}}
                <div class="mt-2 flex justify-end gap-2 border-t border-outline-variant pt-4">
                    <button type="button" onclick="closeCreateModal()"
                        class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                        class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container shadow-sm">
                        Simpan Program
                    </button>
                </div>
            </form>

        </div>
    </dialog>


    {{-- ==================== MODAL EDIT PROGRAM (HTML5 DIALOG) ==================== --}}
    <dialog id="editModal" class="m-auto w-full max-w-3xl border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-xl bg-surface-container p-6 shadow-lg">

            <div class="mb-4 flex items-center justify-between border-b border-outline-variant pb-3">
                <h3 class="text-xl font-semibold text-on-surface">Edit Program</h3>
                <button type="button" onclick="closeEditModal()" class="text-on-surface-variant hover:text-on-surface">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="{{ route('admin.program.save') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                @csrf
                <input type="hidden" name="program_id" id="edit_program_id" value="">
                <input type="hidden" name="deleted_contents" id="edit_deleted_contents" value="">

                {{-- BAGIAN 1: DATA UTAMA --}}
                <div class="space-y-4">
                    <h4 class="font-bold text-on-surface text-base">Data Utama (Hero Section)</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Nama Program (Singkat)</label>
                            <input type="text" name="nama" id="edit_nama" required
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Status Publikasi</label>
                            <select name="status" id="edit_status" class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                                <option value="1">Aktif (Tampil)</option>
                                <option value="0">Draft (Sembunyikan)</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Judul Hero (Lengkap)</label>
                            <input type="text" name="judul" id="edit_judul" required
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none">
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Deskripsi Hero</label>
                            <textarea name="deskripsi" id="edit_deskripsi" rows="3" required
                                class="w-full rounded-xl border border-outline/20 bg-surface-container-low px-4 py-2.5 text-sm focus:border-primary focus:outline-none"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-1 block text-xs font-medium uppercase tracking-wider text-on-surface-variant">Gambar Utama Hero</label>
                            <input type="file" name="gambar_utama" accept="image/*"
                                class="w-full text-sm text-on-surface-variant file:mr-4 file:rounded-full file:border-0 file:bg-primary file:px-4 file:py-2 file:text-xs file:font-semibold file:text-on-primary hover:file:bg-primary-container">
                            <p id="edit_current_gambar_utama" class="mt-2 text-xs text-primary hidden">Gambar saat ini: <span></span></p>
                        </div>
                    </div>
                </div>

                {{-- BAGIAN 2: KONTEN / SECTION DINAMIS --}}
                <div class="space-y-4 border-t border-outline-variant pt-4">
                    <div class="flex items-center justify-between">
                        <h4 class="font-bold text-on-surface text-base">Konten / Section Program</h4>
                        <button type="button" onclick="addEditContentRow()" class="flex items-center gap-1 rounded-lg border border-primary px-3 py-1.5 text-xs font-medium text-primary hover:bg-primary hover:text-on-primary">
                            <span class="material-symbols-outlined text-[16px]">add</span> Tambah Section
                        </button>
                    </div>

                    <div id="edit-contents-container" class="flex flex-col gap-4">
                        {{-- Row Konten Dinamis --}}
                    </div>
                </div>

                {{-- SUBMIT BUTTONS --}}
                <div class="mt-2 flex justify-end gap-2 border-t border-outline-variant pt-4">
                    <button type="button" onclick="closeEditModal()"
                        class="rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit"
                        class="rounded-xl bg-primary px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-primary hover:bg-primary-container shadow-sm">
                        Perbarui Program
                    </button>
                </div>
            </form>

        </div>
    </dialog>


    {{-- ==================== MODAL KONFIRMASI HAPUS (HTML5 DIALOG) ==================== --}}
    <dialog id="deleteModal" class="m-auto w-full max-w-sm border-0 bg-transparent p-0 rounded-xl backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="w-full max-w-sm overflow-hidden rounded-xl bg-surface-containerp-6 shadow-lg">

            <div class="flex flex-col items-center gap-2 text-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-error-container text-on-error-container">
                    <span class="material-symbols-outlined text-[24px]">warning</span>
                </div>

                <h3 class="text-lg font-semibold text-on-surface">Konfirmasi Hapus</h3>
                <p class="text-xs text-on-surface-variant">Apakah Anda yakin ingin menghapus data program ini beserta seluruh konten di dalamnya?</p>
            </div>

            <form id="deleteForm" action="" method="POST" class="mt-6 flex justify-center gap-2">
                @csrf
                @method('DELETE')

                <button type="button" onclick="closeDeleteModal()"
                        class="w-full rounded-xl px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-surface-variant hover:bg-surface-container">
                    Batal
                </button>
                <button type="submit"
                        class="w-full rounded-xl bg-error-container px-4 py-2 text-xs font-medium uppercase tracking-widest text-on-error-container transition-colors hover:opacity-80">
                    Hapus
                </button>
            </form>

        </div>
    </dialog>

@endsection

@push('scripts')
<script>
    const baseUrl = "{{ url('/admin/program') }}";
    
    let createContentIndex = 0;
    let editContentIndex = 0;
    let deletedContentsArray = [];

    // --- DIALOG CREATE ---
    function openCreateModal() {
        document.getElementById('create-contents-container').innerHTML = '';
        createContentIndex = 0;
        addCreateContentRow(); // Otomatis tambahkan 1 baris konten awal
        document.getElementById('createModal').showModal();
    }

    function closeCreateModal() {
        document.getElementById('createModal').close();
    }

    function addCreateContentRow() {
        const container = document.getElementById('create-contents-container');
        const html = `
            <div class="relative rounded-xl border border-outline-variant bg-surface p-4 shadow-sm" id="create_row_${createContentIndex}">
                <button type="button" onclick="removeCreateContentRow(${createContentIndex})" class="absolute right-3 top-3 text-error hover:bg-error-container rounded-lg p-1" title="Hapus Section">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pr-8">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Judul Section</label>
                        <input type="text" name="contents[${createContentIndex}][judul]" required class="w-full rounded-lg border border-outline/20 bg-surface-container-low px-3 py-2 text-sm focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Penjelasan / Deskripsi Section</label>
                        <textarea name="contents[${createContentIndex}][deskripsi]" rows="2" required class="w-full rounded-lg border border-outline/20 bg-surface-container-low px-3 py-2 text-sm focus:outline-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Gambar Section</label>
                        <input type="file" name="contents[${createContentIndex}][gambar]" accept="image/*" class="w-full text-xs text-on-surface-variant">
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        createContentIndex++;
    }

    function removeCreateContentRow(index) {
        const el = document.getElementById(`create_row_${index}`);
        if(el) el.remove();
    }


    // --- DIALOG EDIT ---
    function openEditModal(id) {
        const url = `${baseUrl}/api/${id}`;
        
        fetch(url)
            .then(res => {
                if(!res.ok) throw new Error('Gagal mengambil data program');
                return res.json();
            })
            .then(data => {
                document.getElementById('edit_program_id').value = data.id;
                document.getElementById('edit_nama').value = data.nama;
                document.getElementById('edit_judul').value = data.judul;
                document.getElementById('edit_deskripsi').value = data.deskripsi;
                document.getElementById('edit_status').value = data.status;

                // Tampilkan info gambar jika ada
                const imgInfo = document.getElementById('edit_current_gambar_utama');
                if (data.gambar_utama) {
                    imgInfo.classList.remove('hidden');
                    imgInfo.querySelector('span').innerText = data.gambar_utama;
                } else {
                    imgInfo.classList.add('hidden');
                }

                // Reset Section Konten Edit
                document.getElementById('edit-contents-container').innerHTML = '';
                deletedContentsArray = [];
                document.getElementById('edit_deleted_contents').value = '';
                editContentIndex = 0;

                // Render Section yang sudah ada
                if (data.contents && data.contents.length > 0) {
                    data.contents.forEach(content => {
                        addEditContentRow(content);
                    });
                } else {
                    addEditContentRow(); // Tambahkan 1 baris kosong jika tidak ada section
                }

                document.getElementById('editModal').showModal();
            })
            .catch(err => console.error(err));
    }

    function closeEditModal() {
        document.getElementById('editModal').close();
    }

    function addEditContentRow(data = null) {
        const container = document.getElementById('edit-contents-container');
        const idInput = data ? `<input type="hidden" name="contents[${editContentIndex}][id]" value="${data.id}">` : '';
        const judulVal = data ? data.judul : '';
        const deskripsiVal = data ? data.deskripsi : '';
        const gambarInfo = (data && data.gambar) ? `<p class="mt-1 text-xs text-primary">Gambar saat ini: ${data.gambar}</p>` : '';
        const dbId = data ? data.id : null;

        const html = `
            <div class="relative rounded-xl border border-outline-variant bg-surface p-4 shadow-sm" id="edit_row_${editContentIndex}">
                ${idInput}
                <button type="button" onclick="removeEditContentRow(${editContentIndex}, ${dbId})" class="absolute right-3 top-3 text-error hover:bg-error-container rounded-lg p-1" title="Hapus Section">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pr-8">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Judul Section</label>
                        <input type="text" name="contents[${editContentIndex}][judul]" value="${judulVal}" required class="w-full rounded-lg border border-outline/20 bg-surface-container-low px-3 py-2 text-sm focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Penjelasan / Deskripsi Section</label>
                        <textarea name="contents[${editContentIndex}][deskripsi]" rows="2" required class="w-full rounded-lg border border-outline/20 bg-surface-container-low px-3 py-2 text-sm focus:outline-none">${deskripsiVal}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-on-surface mb-1">Gambar Section</label>
                        <input type="file" name="contents[${editContentIndex}][gambar]" accept="image/*" class="w-full text-xs text-on-surface-variant">
                        ${gambarInfo}
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        editContentIndex++;
    }

    function removeEditContentRow(index, dbId) {
        if (dbId) {
            deletedContentsArray.push(dbId);
            document.getElementById('edit_deleted_contents').value = deletedContentsArray.join(',');
        }
        const el = document.getElementById(`edit_row_${index}`);
        if(el) el.remove();
    }


    // --- DIALOG DELETE ---
    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `${baseUrl}/${id}`;
        document.getElementById('deleteModal').showModal();
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').close();
    }
</script>
@endpush