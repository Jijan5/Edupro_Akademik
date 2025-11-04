<!DOCTYPE html>
<html lang="id" class="antialiased">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Formulir Pendaftaran - EduPro Akademik</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #f3f4f6;
        }

        h1,
        h2,
        h3,
        label,
        button {
            font-family: 'Poppins', sans-serif;
        }

        /* kecilkan overlay blur agar mirip screenshot */
        .bg-pattern {
            background: linear-gradient(135deg, #38BDF8, #0EA5E9);
        }

        /* white stroke outline */
        .panel-outline {
            border: 2px solid rgba(216, 216, 216, 0.3);
        }
    </style>
</head>

<body class="bg-pattern">

    <div class="min-h-screen flex items-start justify-center py-12 px-4 font-sans font-color-black">
        <!-- Panel utama -->
        <div class="w-full max-w-3xl relative">
            <div
                class="bg-background/100 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-primary/10 text-black">
                <!-- gradient overlay -->
                <div class="p-8 md:p-2">
                    <!-- Logo + Judul -->
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/edupro-logo.png') }}" alt="EduPro"
                            class="mx-auto w-36 h-auto mb-3">
                        <h2 class="text-3xl font-bold text-gray-100 text-primary mb-2">Formulir Pendaftaran Mahasiswa
                        </h2>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data"
                        x-data="pendaftaranForm()" class="space-y-4">
                        @csrf

                        <!-- Universitas -->
                        {{-- {{ $error ?? '' }} --}}
                        @if ($errors->any())
                            <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 rounded mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- UNIVERSITAS & FAKULTAS / PRODI -->
                        <div x-data="{
                            universitas: '',
                            fakultas: '',
                            programStudi: '',
                            // daftar universitas yang TIDAK punya fakultas
                            noFakultasList: ['STIT Bandung', 'IWU', 'STEBI Bina Essa'],
                            data: {
                                'ARS University': {
                                    fakultas: {
                                        'Fakultas Teknologi Informasi': [
                                            'Program Studi Sistem Informasi S1',
                                            'Program Studi Teknik Informatika S1'
                                        ],
                                        'Fakultas Ekonomi': [
                                            'Program Studi Akuntansi S1',
                                            'Program Studi Manajemen S1'
                                        ],
                                        'Fakultas Komunikasi Dan Desain': [
                                            'Program Studi Ilmu Komunikasi S1',
                                            'Program Studi Desain Komunikasi Visual S1'
                                        ],
                                        'Fakultas Keperawatan': [
                                            'Program Studi Ilmu Keperawatan S1',
                                            'Program Profesi Ners'
                                        ],
                                        'Pariwisata Dan Perhotelan': [
                                            'Program Studi Manajemen Pariwisata S1',
                                            'Program Studi Perhotelan D3'
                                        ]
                                    }
                                },
                                'STIT Bandung': {
                                    fakultas: {
                                        'Program Studi': [
                                            'Pendidikan Agama Islam (PAI) S1',
                                            'Manajemen Pendidikan Islam S1',
                                            'Pendidikan Islam Anak Usia Dini (PIAUDI) S1',
                                            'Pendidikan Guru Madrasah Ibtidaiyah (PGMI) S1',
                                            'Manajemen Keuangan Syariah S1',
                                            'Ekonomi Islam S1',
                                            'Perbankan Syariah S1',
                                            'Pendidikan Bahasa Inggris S1',
                                            'Sastra & Bahasa Indonesia S1'
                                        ]
                                    }
                                },
                                'IWU': {
                                    fakultas: {
                                        'Program Studi': [
                                            'Hubungan International',
                                            'Ilmu Komunikasi',
                                            'Ilmu Politik',
                                            'Administrasi Bisnis',
                                            'Matematika',
                                            'Biologi',
                                            'Desain Interior',
                                            'Fisika',
                                            'Kimia',
                                            'Desain Komunikasi Visual',
                                            'Informatika',
                                            'Akuntansi Perpajakan',
                                            'Peradilan Pidana'
                                        ]
                                    }
                                },
                                'UICM': {
                                    fakultas: {
                                        'Fakultas Ekonomi & Bisnis': [
                                            'Program Studi Akuntansi S1',
                                            'Program Studi Manajemen S1'
                                        ],
                                        'Fakultas Teknik': [
                                            'Program Studi Teknik Industri S1',
                                            'Program Studi Teknik Kimia S1',
                                            'Program Studi Teknik Industri Tekstil D3',
                                            'Program Studi Teknik Kimia Tekstil D3'
                                        ],
                                        'Fakultas Pertanian': [
                                            'Program Studi Ilmu Agribisnis S1',
                                            'Program Studi Agroteknologi S1',
                                            'Program Studi Peternakan S1',
                                            'Program Studi Arsitektur Lanskap S1',
                                            'Program Studi Teknologi Hasil Pertanian S1'
                                        ],
                                        'Fakultas Keguruan & Ilmu Pendidikan': [
                                            'Program Studi Pendidikan Masyarakat S1'
                                        ]
                                    }
                                },
                                'STEBI Bina Essa': {
                                    fakultas: {
                                        'Program Studi': [
                                            'Ekonomi Syariah S1',
                                            'Perbankan Syariah S1'
                                        ]
                                    }
                                }
                            },

                            init() {
                                try {
                                    const params = new URLSearchParams(window.location.search);
                                    const univ = params.get('universitas');
                                    const fak = params.get('fakultas');
                                    const prodi = params.get('program_studi');

                                    if (univ) {
                                        const decodedUniv = decodeURIComponent(univ).trim();
                                        const decodedFak = fak ? decodeURIComponent(fak).trim() : null;
                                        const decodedProdi = prodi ? decodeURIComponent(prodi).trim() : null;

                                        this.$nextTick(() => {
                                            if (decodedUniv && this.data.hasOwnProperty(decodedUniv)) {
                                                this.universitas = decodedUniv;

                                                // jika universitas TIDAK punya fakultas, abaikan param fakultas
                                                if (this.hasNoFakultas()) {
                                                    this.fakultas = '';
                                                    if (decodedProdi && this.getProdiList().includes(decodedProdi)) {
                                                        this.programStudi = decodedProdi;
                                                    }
                                                } else {
                                                    if (decodedFak && this.getFakultasList().includes(decodedFak)) {
                                                        this.fakultas = decodedFak;

                                                        if (decodedProdi && this.getProdiList().includes(decodedProdi)) {
                                                            this.programStudi = decodedProdi;
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    }
                                } catch (err) {
                                    console.error('Error initializing university selector:', err);
                                }
                            },

                            hasNoFakultas() {
                                return this.noFakultasList.includes(this.universitas);
                            },

                            getFakultasList() {
                                if (!this.universitas) return [];
                                if (this.hasNoFakultas()) return [];
                                const entry = this.data[this.universitas];
                                if (!entry || !entry.fakultas) return [];
                                return Object.keys(entry.fakultas);
                            },

                            getProdiList() {
                                if (!this.universitas) return [];
                                const entry = this.data[this.universitas];
                                if (!entry) return [];

                                // Jika universitas tidak punya fakultas, ambil daftar program studi dari key 'Program Studi'
                                if (this.hasNoFakultas()) {
                                    if (entry.fakultas && entry.fakultas['Program Studi']) {
                                        return entry.fakultas['Program Studi'];
                                    }
                                    // fallback: bila suatu saat data disimpan langsung di property 'prodi'
                                    if (entry.prodi) return entry.prodi;
                                    return [];
                                }

                                // kalau ada fakultas terpilih, kembalikan daftar program studi di dalam fakultas tersebut
                                if (!this.fakultas) return [];
                                if (!entry.fakultas) return [];
                                return entry.fakultas[this.fakultas] || [];
                            }
                        }" x-init="init()">

                            <!-- Dropdown Universitas -->
                            <div class="relative flex items-center bg-white/10 rounded-md px-3 py-2 mb-4">
                                <select name="universitas" x-model="universitas" @change="fakultas=''; programStudi=''"
                                    class="w-full bg-transparent text-gray-100 focus:outline-none cursor-pointer">
                                    <option value="">-- Pilih Universitas --</option>
                                    <template x-for="(value, key) in data" :key="key">
                                        <option :value="key" x-text="key" class="bg-gray-100 text-gray-700">
                                        </option>
                                    </template>
                                </select>
                            </div>

                            <!-- Dropdown Fakultas (sembunyikan bila universitas tidak punya fakultas) -->
                            <div x-show="!hasNoFakultas()"
                                class="relative flex items-center bg-white/10 rounded-md px-3 py-2 mb-4" x-cloak>
                                <select name="fakultas" x-model="fakultas" @change="programStudi=''"
                                    class="w-full bg-transparent text-gray-100 focus:outline-none cursor-pointer">
                                    <option value="">-- Pilih Fakultas --</option>
                                    <template x-for="fak in getFakultasList()" :key="fak">
                                        <option :value="fak" x-text="fak" class="bg-gray-100 text-gray-700">
                                        </option>
                                    </template>
                                </select>
                            </div>

                            <!-- Dropdown Program Studi -->
                            <div class="relative flex items-center bg-white/10 rounded-md px-3 py-2 mb-4">
                                <select name="program_studi" x-model="programStudi"
                                    class="w-full bg-transparent text-gray-100 focus:outline-none cursor-pointer">
                                    <option value="">-- Pilih Program Studi --</option>
                                    <template x-for="prodi in getProdiList()" :key="prodi">
                                        <option :value="prodi" x-text="prodi" class="bg-gray-100 text-gray-700">
                                        </option>
                                    </template>
                                </select>
                            </div>
                        </div>

                        <!-- Input Nama / TTL (dua kolom) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label class="sr-only">Nama Lengkap</label>
                                <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                    <!-- icon -->
                                    <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <input name="nama_lengkap" type="text" placeholder="Nama Lengkap"
                                        class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                        <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <input name="tempat_lahir" type="text" placeholder="Tempat Lahir"
                                            class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                        <input name="tanggal_lahir" type="date"
                                            class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NISN -->
                        <div class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none">
                            <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input name="nisn" type="text" placeholder="NISN"
                                    class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                            </div>
                        </div>

                        <!-- Nama Ibu -->
                        <div class="w-full bg-transparent text-gray-100 placeholder-gray-300 focus:outline-none">
                            <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input name="nama_ibu_kandung" type="text" placeholder="Nama Ibu Kandung"
                                    class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                            </div>
                        </div>

                        <!-- Kewarganegaraan/NIK -->
                        <div class="relative flex items-center bg-white/10 rounded-md px-3 py-2">
                            <select name="kewarganegaraan"
                                class="w-full appearance-none bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none cursor-pointer">
                                <option value="" disabled selected>Kewarganegaraan</option>
                                <option value="WNI" class="bg-gray-100 text-gray-700">WNI</option>
                                <option value="WNA" class="bg-gray-100 text-gray-700">WNA</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute right-3 w-5 h-5 text-gray-300 pointer-events-none" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <div class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none">
                            <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <input name="nik" type="text" placeholder="NIK"
                                    class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                            </div>
                        </div>

                        <!-- Jalur Program -->
                        <div x-data="{ jalur_program: ' ' }" class="space-y-4">
                            <div class="flex items-center gap-4 text-sm"> <span class="text-gray-100">Jalur
                                    Program:</span> <label class="inline-flex items-center gap-2"> <input
                                        type="radio" name="jalur_program" value="KIP" x-model="jalur_program"
                                        class="form-radio"> <span class="text-gray-100">KIP</span> </label> <label
                                    class="inline-flex items-center gap-2"> <input type="radio"
                                        name="jalur_program" value="Non-KIP" x-model="jalur_program"
                                        class="form-radio"> <span class="text-gray-100">Non-KIP</span> </label> </div>
                            <!-- Kolom tambahan muncul hanya jika KIP dipilih -->
                            <div x-show="jalur_program === 'KIP'" x-transition
                                class="mt-3 bg-white/10 p-4 rounded-lg space-y-3">
                                <div> <label for="nomor_kip" class="block text-gray-100 mb-1">Nomor KIP</label> <input
                                        type="text" id="no_kip" name="no_kip"
                                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Masukkan Nomor KIP"> </div>
                                <div> <label for="file_kip" class="block text-gray-100 mb-1">Upload File KIP</label>
                                    <input type="file" id="file_kip" name="file_kip"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                                </div>
                            </div>
                        </div>

                        <!-- Upload Ijazah -->
                        <div x-data="fileUploadIjazah()" id="upload-ijazah" class="w-full">
                            <label class="block text-sm text-gray-100 mb-2">
                                Upload Ijazah Terakhir: (.pdf/.jpg) max 2MB
                            </label>

                            <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-100': !isDragging }"
                                @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                                @drop.prevent="handleDrop($event)"
                                class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">
                                <input type="file" name="file_ijazah" accept=".pdf,.jpg,.jpeg,.png"
                                    class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                                    @change="handleFileSelect" />

                                <svg class="w-[40px] h-[40px] text-gray-100 mb-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <template x-if="!fileName">
                                    <p class="text-sm text-gray-100">Klik atau tarik file ke sini</p>
                                </template>

                                <template x-if="fileName">
                                    <p class="text-sm text-gray-100 font-medium mt-2" x-text="fileName"></p>
                                    <!-- Opsional: Tampilkan preview jika gambar -->
                                    <template x-if="filePreview && filePreview !== 'pdf'">
                                        <img :src="filePreview" class="mt-2 max-w-32 max-h-32" />
                                    </template>
                                    <!-- Opsional: Tampilkan ikon untuk PDF -->
                                    <template x-if="filePreview === 'pdf'">
                                        <p class="text-sm text-gray-100 mt-2">📄 PDF File</p>
                                    </template>
                                </template>

                                <!-- Tampilan error unik untuk ijazah -->
                                <template x-if="error">
                                    <p class="text-sm text-red-500 mt-2" x-text="error"></p>
                                </template>
                            </div>
                        </div>

                        <!-- Contoh untuk kolom foto (pisahkan dengan nama unik, asumsikan serupa) -->
                        <div x-data="fileUploadFoto()" id="upload-foto" class="w-full">
                            <!-- ... kode serupa untuk foto, tapi ganti nama komponen dan pesan error -->
                            <label class="block text-sm text-gray-100 mb-2">
                                Upload Foto: (.jpg/.png) max 2MB
                            </label>
                            <!-- ... sisanya serupa, tapi pastikan validasi hanya untuk gambar -->
                            <template x-if="error">
                                <p class="text-sm text-red-500 mt-2" x-text="error"> <!-- Pesan error khusus foto -->
                                </p>
                            </template>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                // Komponen untuk ijazah
                                Alpine.data('fileUploadIjazah', () => ({
                                    isDragging: false,
                                    fileName: '',
                                    fileType: '',
                                    filePreview: '',
                                    error: '',

                                    handleFileSelect(e) {
                                        const file = e.target.files[0];
                                        this.validateFile(file);
                                    },

                                    handleDrop(e) {
                                        this.isDragging = false;
                                        const file = e.dataTransfer.files[0];
                                        this.validateFile(file);

                                        if (!this.error) {
                                            this.$refs.fileInput.files = e.dataTransfer.files;
                                        }
                                    },

                                    validateFile(file) {
                                        this.error = '';
                                        this.fileName = '';
                                        this.fileType = '';
                                        this.filePreview = '';

                                        if (!file) return;

                                        const fileExt = file.name.split('.').pop().toLowerCase();

                                        // Logging unik untuk ijazah
                                        console.log('Ijazah - File Type:', file.type);
                                        console.log('Ijazah - File Extension:', fileExt);

                                        const validTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                                        const validExts = ['pdf', 'jpg', 'jpeg', 'png'];

                                        const isTypeValid = validTypes.includes(file.type);
                                        const isExtValid = validExts.includes(fileExt);

                                        // Khusus PDF: Jika ekstensi 'pdf', izinkan meski type kosong
                                        if (fileExt === 'pdf') {
                                            // PDF diizinkan berdasarkan ekstensi
                                        } else if (!isTypeValid && !isExtValid) {
                                            this.error =
                                                '❌ Ijazah: Hanya file PDF dan gambar (JPG/PNG) yang diperbolehkan.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        const maxSize = 2 * 1024 * 1024; // 2 MB
                                        if (file.size > maxSize) {
                                            this.error = '⚠️ Ijazah: Ukuran file terlalu besar. Maksimum 2MB.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        this.fileName = file.name;
                                        this.fileType = file.type;

                                        if (file.type === 'application/pdf' || fileExt === 'pdf') {
                                            this.filePreview = 'pdf';
                                        } else if (file.type.startsWith('image/')) {
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                this.filePreview = e.target.result;
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                }));

                                // Komponen untuk foto (contoh, sesuaikan validasi hanya untuk gambar)
                                Alpine.data('fileUploadFoto', () => ({
                                    // ... salin struktur serupa, tapi ubah validasi (misalnya, hanya gambar, tanpa PDF)
                                    // Contoh: validTypes = ['image/jpeg', 'image/jpg', 'image/png']; validExts = ['jpg', 'jpeg', 'png'];
                                    // Dan error: '❌ Foto: Hanya gambar (JPG/PNG) yang diperbolehkan.'
                                    // Logging: console.log('Foto - File Type:', file.type);
                                }));
                            });
                        </script>


                        <!-- Nomor Ijazah -->
                        <div>
                            <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                <svg class="w-5 h-5 text-gray-100 mr-3" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor">
                                    <path stroke-width="1.3" d="M3 7h18" />
                                </svg>
                                <input name="no_ijazah" type="text" placeholder="No. Ijazah"
                                    class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                            </div>
                        </div>

                        <!-- Upload Transkrip Nilai -->
                        <div x-data="fileUploadTranskrip()" id="upload-transkrip" class="w-full">
                            <label class="block text-sm text-gray-100 mb-2">
                                Upload Transkrip Nilai: (.pdf/.jpg) max 2MB
                            </label>

                            <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-100': !isDragging }"
                                @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                                @drop.prevent="handleDrop($event)"
                                class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">
                                <input type="file" name="file_transkrip" accept=".pdf,.jpg,.jpeg,.png"
                                    class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                                    @change="handleFileSelect" />

                                <svg class="w-[40px] h-[40px] text-gray-100 mb-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <template x-if="!fileName">
                                    <p class="text-sm text-gray-100">Klik atau tarik file ke sini</p>
                                </template>

                                <template x-if="fileName">
                                    <p class="text-sm text-gray-100 font-medium mt-2" x-text="fileName"></p>
                                    <!-- Opsional: Tampilkan preview jika gambar -->
                                    <template x-if="filePreview && filePreview !== 'pdf'">
                                        <img :src="filePreview" class="mt-2 max-w-32 max-h-32" />
                                    </template>
                                    <!-- Opsional: Tampilkan ikon untuk PDF -->
                                    <template x-if="filePreview === 'pdf'">
                                        <p class="text-sm text-gray-100 mt-2">📄 PDF File</p>
                                    </template>
                                </template>

                                <!-- Tampilan error unik untuk transkrip -->
                                <template x-if="error">
                                    <p class="text-sm text-red-500 mt-2" x-text="error"></p>
                                </template>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                // Komponen untuk transkrip (sama seperti ijazah, tapi unik)
                                Alpine.data('fileUploadTranskrip', () => ({
                                    isDragging: false,
                                    fileName: '',
                                    fileType: '',
                                    filePreview: '',
                                    error: '',

                                    handleFileSelect(e) {
                                        const file = e.target.files[0];
                                        this.validateFile(file);
                                    },

                                    handleDrop(e) {
                                        this.isDragging = false;
                                        const file = e.dataTransfer.files[0];
                                        this.validateFile(file);

                                        if (!this.error) {
                                            this.$refs.fileInput.files = e.dataTransfer.files;
                                        }
                                    },

                                    validateFile(file) {
                                        this.error = '';
                                        this.fileName = '';
                                        this.fileType = '';
                                        this.filePreview = '';

                                        if (!file) return;

                                        const fileExt = file.name.split('.').pop().toLowerCase();

                                        // Logging unik untuk transkrip
                                        console.log('Transkrip - File Type:', file.type);
                                        console.log('Transkrip - File Extension:', fileExt);

                                        const validTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                                        const validExts = ['pdf', 'jpg', 'jpeg', 'png'];

                                        const isTypeValid = validTypes.includes(file.type);
                                        const isExtValid = validExts.includes(fileExt);

                                        // Khusus PDF: Jika ekstensi 'pdf', izinkan meski type kosong
                                        if (fileExt === 'pdf') {
                                            // PDF diizinkan berdasarkan ekstensi
                                        } else if (!isTypeValid && !isExtValid) {
                                            this.error =
                                                '❌ Transkrip: Hanya file PDF dan gambar (JPG/PNG) yang diperbolehkan.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        const maxSize = 2 * 1024 * 1024; // 2 MB
                                        if (file.size > maxSize) {
                                            this.error = '⚠️ Transkrip: Ukuran file terlalu besar. Maksimum 2MB.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        this.fileName = file.name;
                                        this.fileType = file.type;

                                        if (file.type === 'application/pdf' || fileExt === 'pdf') {
                                            this.filePreview = 'pdf';
                                        } else if (file.type.startsWith('image/')) {
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                this.filePreview = e.target.result;
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                }));

                                // Jika ada komponen lain (ijazah, foto), tambahkan di sini dengan nama unik
                                // Contoh: Alpine.data('fileUploadIjazah', () => ({ ... }));
                            });
                        </script>

                        <!-- Upload Foto Diri -->
                        <div x-data="fileUpload()" class="w-full">
                            <label class="block text-sm text-gray-100 mb-2">
                                Upload Foto Diri: (.png, .jpg, .jpeg) max 2MB
                            </label>

                            <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-100': !isDragging }"
                                @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                                @drop.prevent="handleDrop($event)"
                                class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">

                                <input type="file" name="file_foto" accept=".png, .jpg, .jpeg"
                                    class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                                    @change="handleFileSelect" />

                                <svg class="w-[40px] h-[40px] text-gray-100 mb-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <template x-if="!fileName">
                                    <p class="text-sm text-gray-100">Klik atau tarik file ke sini</p>
                                </template>

                                <template x-if="fileName">
                                    <p class="text-sm text-gray-100 font-medium mt-2" x-text="fileName"></p>
                                </template>

                                <!-- Pesan error sekarang di dalam kolom upload -->
                                <template x-if="error">
                                    <p class="text-sm text-red-500 mt-2" x-text="error"></p>
                                </template>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('fileUpload', () => ({
                                    isDragging: false,
                                    fileName: '',
                                    error: '',

                                    handleFileSelect(e) {
                                        const file = e.target.files[0];
                                        this.validateFile(file);
                                    },

                                    handleDrop(e) {
                                        this.isDragging = false;
                                        const file = e.dataTransfer.files[0];
                                        this.validateFile(file);

                                        if (!this.error) {
                                            this.$refs.fileInput.files = e.dataTransfer.files;
                                        }
                                    },

                                    validateFile(file) {
                                        this.error = '';
                                        this.fileName = '';

                                        if (!file) return;

                                        // Validasi tipe file
                                        const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                                        if (!validTypes.includes(file.type)) {
                                            this.error = '❌ Format file tidak valid. Gunakan PNG, JPG, atau JPEG.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        // Validasi ukuran file
                                        const maxSize = 2 * 1024 * 1024; // 2 MB
                                        if (file.size > maxSize) {
                                            this.error = '⚠️ Ukuran file terlalu besar. Maksimum 2MB.';
                                            this.$refs.fileInput.value = '';
                                            return;
                                        }

                                        // Jika valid
                                        this.fileName = file.name;
                                    }
                                }))
                            })
                        </script>

                        <!-- Contact / Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                    <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                            clip-rule="evenodd" />
                                        <path fill="currentColor"
                                            d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                                    </svg>
                                    <input name="no_hp" type="tel" placeholder="WhatsApp"
                                        class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                    <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white mr-3"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z" />
                                    </svg>

                                    <input name="email" type="email" placeholder="Email"
                                        class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none" />
                                </div>
                            </div>
                        </div>

                        <!-- Password / Konfirmasi -->
                        <div x-data="{
                            showPassword: false,
                            showConfirmPassword: false,
                            password: '',
                            confirmPassword: '',
                            error: ''
                        }" class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            <!-- Password -->
                            <div>
                                <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                    <svg class="w-5 h-5 text-gray-100 mr-3"></svg>
                                    <input :type="showPassword ? 'text' : 'password'" x-model="password"
                                        name="password" placeholder="Password"
                                        class="w-full bg-transparent text-gray-100 placeholder-gray-100 focus:outline-none"
                                        @input="error = (confirmPassword && password !== confirmPassword) ? 'Password tidak sesuai' : ''" />
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="ml-3 text-gray-100">
                                        <template x-if="!showPassword">
                                            <!-- Eye -->
                                            <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </template>
                                        <template x-if="showPassword">
                                            <!-- Eye Slash -->
                                            <svg class="w-[20px] h-[20px]" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </template>
                                    </button>
                                </div>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div>
                                <div class="flex items-center bg-white/10 rounded-md px-3 py-2">
                                    <svg class="w-5 h-5 text-gray-100 mr-3"></svg>
                                    <input :type="showConfirmPassword ? 'text' : 'password'" x-model="confirmPassword"
                                        name="Konfirm_password" placeholder="Ulangi Password"
                                        class="w-full bg-transparent text-gray-300 placeholder-gray-100 focus:outline-none"
                                        @input="error = (password !== confirmPassword) ? 'Password tidak sesuai' : ''" />
                                    <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                        class="ml-3 text-gray-100">
                                        <template x-if="!showConfirmPassword">
                                            <!-- Eye -->
                                            <svg class="w-[20px] h-[20px] text-gray-100 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </template>
                                        <template x-if="showConfirmPassword">
                                            <!-- Eye Slash -->
                                            <svg class="w-[20px] h-[20px]" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </template>
                                    </button>
                                </div>
                                <p x-show="error" x-text="error" class="text-red-600 text-sm mt-1"></p>
                            </div>

                        </div>

                        <!-- Petunjuk Password -->
                        <div class="bg-white/10 p-3 rounded-md text-sm text-gray-100">
                            <ul class="list-disc pl-5">
                                <li>Minimal 8 karakter.</li>
                                <li>Harus mengandung minimal satu huruf kecil.</li>
                                <li>Harus mengandung minimal satu huruf besar.</li>
                                <li>Harus mengandung minimal satu angka.</li>
                            </ul>
                        </div>

                        <!-- Captcha dan Persetujuan -->
                        <div class="space-y-6 mt-6">
                            <!-- Captcha -->
                            <div>
                                <label class="block text-sm font-medium text-gray-100 mb-2">Kerjakan soal di bawah
                                    ini:</label>
                                <div class="flex flex-col md:flex-row items-center gap-3">
                                    <!-- Soal -->
                                    <div
                                        class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-md text-gray-100 font-semibold min-w-[100px] justify-center">
                                        <span x-text="captchaText"></span>
                                    </div>

                                    <!-- Input Jawaban -->
                                    <input type="text" name="capthca" placeholder="Jawab disini" required
                                        class="flex-1 bg-white/10 rounded-md px-4 py-2 text-gray-100 placeholder-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-300" />

                                    <!-- Tombol Refresh -->
                                    <button type="button"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md transition duration-200"
                                        @click="regenerateCaptcha()" title="Muat ulang soal">
                                        ⟳
                                    </button>
                                </div>
                            </div>

                            <!-- Checkbox Persetujuan -->
                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="agreement" required
                                    class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                                <span class="text-gray-100 text-sm leading-relaxed">
                                    Saya menyetujui semua persyaratan pendaftaran, apabila ada data yang keliru saya
                                    siap bertanggung jawab.
                                </span>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('captchaForm', () => ({
                                    captchaText: '',
                                    regenerateCaptcha() {
                                        const num1 = Math.floor(Math.random() * 10) + 1;
                                        const num2 = Math.floor(Math.random() * 10) + 1;
                                        const operators = ['+', '-', '×', '÷'];
                                        const operator = operators[Math.floor(Math.random() * operators.length)];

                                        let a = num1;
                                        let b = num2;

                                        // Biar pembagian tetap hasil bulat
                                        if (operator === '÷') {
                                            a = num1 * num2; // contoh: 8 ÷ 2, bukan 7 ÷ 2
                                        }

                                        this.captchaText = `${a} ${operator} ${b}`;
                                    },
                                }));
                            });
                        </script>

                        <!-- Tombol aksi -->
                        <div class="flex flex-col md:flex-row gap-3 justify-between">
                            <a href="{{ url('/welcome') }}"
                                class="block text-center bg-white/20 text-white px-6 py-2 rounded-md">Kembali</a>
                            <button type="submit"
                                class="block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md">Daftar</button>
                        </div>

                    </form>
                </div> <!-- end panel inner -->
            </div> <!-- end panel -->
        </div>
    </div>

    <script>
        function pendaftaranForm() {
            return {
                selectedUniversity: ' ',
                showPassword: false,
                captchaText: '',
                captchaAnswer: 0,
                regenerateCaptcha() {
                    const a = Math.floor(Math.random() * 9) + 2;
                    const b = Math.floor(Math.random() * 9) + 2;
                    this.captchaText = `${a} + ${b} =`;
                    this.captchaAnswer = a * b;
                },
                init() {
                    this.regenerateCaptcha();
                }
            }
        }
        document.addEventListener('alpine:init', () => {
            // nothing extra needed
        });
    </script>

</body>

</html>
