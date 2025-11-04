<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl p-10 border border-blue-100">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-8 tracking-wide">
            ✏️ Edit Data Pendaftaran
        </h2>

        <form action="{{ route('admin.update', $data->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- {{ $error ?? '' }} --}}
            @if ($errors->any())
                <div class="bg-red-500/20 border border-red-400 text-red-900 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">universitas</label>
                    <select name="universitas"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2 bg-white">
                        <option value="ARS University" {{ $data->universitas == 'ARS University' ? 'selected' : '' }}>ARS University</option>
                        <option value="STIT Bandung" {{ $data->universitas == 'STIT Bandung' ? 'selected' : '' }}>STIT Bandung</option>
                        <option value="IWU" {{ $data->universitas == 'IWU' ? 'selected' : '' }}>IWU</option>
                        <option value="UICM" {{ $data->universitas == 'UICM' ? 'selected' : '' }}>UICM</option>
                        <option value="STIEB Bina Esa" {{ $data->universitas == 'STIEB Bina Esa' ? 'selected' : '' }}>STEBI Bina Essa</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">NISN</label>
                    <input type="text" name="nisn" value="{{ $data->nisn }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Ibu Kandung</label>
                    <input type="text" name="nama_ibu_kandung" value="{{ $data->nama_ibu_kandung }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" value="{{ $data->kewarganegaraan }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">NIK</label>
                    <input type="text" name="nik" value="{{ $data->nik }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jalur Program</label>
                    <select name="jalur_program"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2 bg-white">
                        <option value="KIP" {{ $data->jalur_program == 'KIP' ? 'selected' : '' }}>KIP</option>
                        <option value="Non-KIP" {{ $data->jalur_program == 'Non-KIP' ? 'selected' : '' }}>Non-KIP
                        </option>
                    </select>
                </div>

                <!-- Upload Ijazah -->
                <!-- Upload Ijazah Terakhir -->
                <div x-data="fileUploadIjazah()" id="upload-ijazah" class="w-full mb-6">
                    <label class="block text-sm font-semibold text-gray-200 mb-2">
                        Upload Ijazah Terakhir <span class="text-xs text-gray-400">(PDF / JPG / PNG, max 2MB)</span>
                    </label>

                    <div x-bind:class="{
                        'bg-white/20 border-blue-400 ring-2 ring-blue-300': isDragging,
                        'bg-white/10 border-gray-600 hover:bg-white/20': !isDragging
                    }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border border-dashed rounded-lg p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-200 ease-in-out">
                        <input type="file" name="file_ijazah" accept=".pdf,.jpg,.jpeg,.png"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <!-- Icon -->
                        <div class="bg-white/10 p-3 rounded-full mb-2">
                            <svg class="w-10 h-10 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Default message -->
                        <template x-if="!fileName">
                            <p class="text-sm text-gray-300 italic">Klik atau tarik file ke sini untuk mengunggah</p>
                        </template>

                        <!-- File selected -->
                        <template x-if="fileName">
                            <div class="mt-3">
                                <p class="text-sm font-medium text-gray-100" x-text="fileName"></p>

                                <template x-if="filePreview && filePreview !== 'pdf'">
                                    <img :src="filePreview"
                                        class="mt-3 max-w-[120px] max-h-[120px] rounded-lg shadow-md border border-gray-600" />
                                </template>

                                <template x-if="filePreview === 'pdf'">
                                    <p class="text-sm text-blue-300 mt-3">📄 File PDF terpilih</p>
                                </template>
                            </div>
                        </template>

                        <!-- Error message -->
                        <template x-if="error">
                            <p class="text-sm text-red-400 mt-3 font-medium" x-text="error"></p>
                        </template>
                    </div>
                </div>

                <script>
                    document.addEventListener('alpine:init', () => {
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
                                this.filePreview = '';

                                if (!file) return;

                                const fileExt = file.name.split('.').pop().toLowerCase();
                                const validTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                                const validExts = ['pdf', 'jpg', 'jpeg', 'png'];

                                const isTypeValid = validTypes.includes(file.type);
                                const isExtValid = validExts.includes(fileExt);

                                if (fileExt === 'pdf') {
                                    // PDF diizinkan berdasarkan ekstensi
                                } else if (!isTypeValid && !isExtValid) {
                                    this.error = '❌ Hanya file PDF, JPG, atau PNG yang diperbolehkan.';
                                    this.$refs.fileInput.value = '';
                                    return;
                                }

                                const maxSize = 2 * 1024 * 1024;
                                if (file.size > maxSize) {
                                    this.error = '⚠️ Ukuran file terlalu besar (maks. 2MB).';
                                    this.$refs.fileInput.value = '';
                                    return;
                                }

                                this.fileName = file.name;
                                this.fileType = file.type;

                                if (fileExt === 'pdf') {
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
                    });
                </script>


                <div>
                    <label class="block text-gray-700 font-medium mb-1">No Ijazah</label>
                    <input type="text" name="no_ijazah" value="{{ $data->no_ijazah }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Upload Transkrip Nilai -->
                <div x-data="fileUploadTranskrip()" id="upload-transkrip" class="w-full mb-6">
                    <label class="block text-sm font-semibold text-gray-200 mb-2">
                        Upload Transkrip Nilai <span class="text-xs text-gray-400">(PDF / JPG / PNG, max 2MB)</span>
                    </label>

                    <div x-bind:class="{
                        'bg-white/20 border-blue-400 ring-2 ring-blue-300': isDragging,
                        'bg-white/10 border-gray-600 hover:bg-white/20': !isDragging
                    }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border border-dashed rounded-lg p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-200 ease-in-out">
                        <input type="file" name="transkrip" accept=".pdf,.jpg,.jpeg,.png"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <!-- Icon -->
                        <div class="bg-white/10 p-3 rounded-full mb-2">
                            <svg class="w-10 h-10 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Default message -->
                        <template x-if="!fileName">
                            <p class="text-sm text-gray-300 italic">Klik atau tarik file ke sini untuk mengunggah</p>
                        </template>

                        <!-- File selected -->
                        <template x-if="fileName">
                            <div class="mt-3">
                                <p class="text-sm font-medium text-gray-100" x-text="fileName"></p>

                                <template x-if="filePreview && filePreview !== 'pdf'">
                                    <img :src="filePreview"
                                        class="mt-3 max-w-[120px] max-h-[120px] rounded-lg shadow-md border border-gray-600" />
                                </template>

                                <template x-if="filePreview === 'pdf'">
                                    <p class="text-sm text-blue-300 mt-3">📄 File PDF terpilih</p>
                                </template>
                            </div>
                        </template>

                        <!-- Error message -->
                        <template x-if="error">
                            <p class="text-sm text-red-400 mt-3 font-medium" x-text="error"></p>
                        </template>
                    </div>
                </div>

                <script>
                    document.addEventListener('alpine:init', () => {
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
                                const validTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                                const validExts = ['pdf', 'jpg', 'jpeg', 'png'];

                                const isTypeValid = validTypes.includes(file.type);
                                const isExtValid = validExts.includes(fileExt);

                                if (fileExt === 'pdf') {
                                    // PDF diizinkan berdasarkan ekstensi
                                } else if (!isTypeValid && !isExtValid) {
                                    this.error = '❌ Transkrip: Hanya file PDF, JPG, atau PNG yang diperbolehkan.';
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

                                if (fileExt === 'pdf') {
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
                    });
                </script>


                <!-- Upload Foto Diri -->
                <div x-data="fileUpload()" class="w-full mb-6">
                    <label class="block text-sm font-medium text-gray-200 mb-2">
                        Upload Foto Diri: <span class="text-gray-400">(PNG, JPG, JPEG, max 2MB)</span>
                    </label>

                    <div x-bind:class="{
                        'bg-white/40 border-blue-400 shadow-md': isDragging,
                        'bg-white/10 border-gray-500 hover:border-blue-300 hover:bg-white/20': !isDragging
                    }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border-2 border-dashed rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-200 ease-in-out backdrop-blur-sm">
                        <input type="file" name="file_foto" accept=".png, .jpg, .jpeg"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <!-- Ikon upload -->
                        <svg class="w-[48px] h-[48px] text-gray-400 mb-3" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4v12m0 0l3-3m-3 3l-3-3m9 6H6a2 2 0 01-2-2V8a2 2 0 012-2h3.172a2 2 0 011.414.586l1.828 1.828A2 2 0 0013.828 9H18a2 2 0 012 2v9a2 2 0 01-2 2z" />
                        </svg>

                        <!-- Keterangan default -->
                        <template x-if="!fileName">
                            <p class="text-sm text-gray-300">Klik atau tarik file ke sini</p>
                        </template>

                        <!-- Nama file -->
                        <template x-if="fileName">
                            <p class="text-sm font-medium text-blue-200 mt-2" x-text="fileName"></p>
                        </template>

                        <!-- Pesan error -->
                        <template x-if="error">
                            <p class="text-sm text-red-400 mt-2" x-text="error"></p>
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

                                const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                                if (!validTypes.includes(file.type)) {
                                    this.error = '❌ Format file tidak valid. Gunakan PNG, JPG, atau JPEG.';
                                    this.$refs.fileInput.value = '';
                                    return;
                                }

                                const maxSize = 2 * 1024 * 1024; // 2 MB
                                if (file.size > maxSize) {
                                    this.error = '⚠️ Ukuran file terlalu besar. Maksimum 2MB.';
                                    this.$refs.fileInput.value = '';
                                    return;
                                }

                                this.fileName = file.name;
                            },
                        }));
                    });
                </script>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">No KIP</label>
                    <input type="text" name="no_kip" value="{{ $data->no_kip }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label for="file_kip" class="block text-sm font-semibold text-gray-700 mb-1">Upload File
                        KIP</label>
                    <input type="file" id="file_kip" name="file_kip" accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600 transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Fakultas</label>
                    <input type="text" name="fakultas" value="{{ $data->fakultas }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Program Studi</label>
                    <input type="text" name="program_studi" value="{{ $data->program_studi }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">No. HP</label>
                    <input type="text" name="no_hp" value="{{ $data->no_hp }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ $data->email }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 px-3 py-2">
                </div>
            </div>

            <div class="flex justify-between items-center mt-10 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-5 rounded-lg shadow-sm transition">
                    ← Kembali
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>

</html>
