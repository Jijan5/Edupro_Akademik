<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            ✏️ Edit Data Pendaftaran
        </h2>

        <form action="{{ route('admin.update', $data->id) }}" method="PUT" enctype="multipart/form-data"
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Universitas</label>
                    <input type="text" name="universitas" value="{{ $data->universitas }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">NISN</label>
                    <input type="text" name="nisn" value="{{ $data->nisn }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Ibu Kandung</label>
                    <input type="text" name="nama_ibu_kandung" value="{{ $data->nama_ibu_kandung }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" value="{{ $data->kewarganegaraan }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">NIK</label>
                    <input type="text" name="nik" value="{{ $data->nik }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Jalur Program</label>
                    <select name="jalur_program"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="KIP" {{ $data->jalur_program == 'KIP' ? 'selected' : '' }}>KIP</option>
                        <option value="Non-KIP" {{ $data->jalur_program == 'Non-KIP' ? 'selected' : '' }}>Non-KIP
                        </option>
                    </select>
                </div>

                <!-- Upload Ijazah -->
                <div x-data="fileUploadIjazah()" id="upload-ijazah" class="w-full">
                    <label class="block text-sm text-gray-100 mb-2">
                        Upload Ijazah Terakhir: (.pdf/.jpg) max 2MB
                    </label>

                    <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-400': !isDragging }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">
                        <input type="file" name="file_ijazah" accept=".pdf,.jpg,.jpeg,.png"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <svg class="w-[40px] h-[40px] text-gray-500 mb-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                clip-rule="evenodd" />
                        </svg>

                        <template x-if="!fileName">
                            <p class="text-sm text-gray-600">Klik atau tarik file ke sini</p>
                        </template>

                        <template x-if="fileName">
                            <p class="text-sm text-gray-700 font-medium mt-2" x-text="fileName"></p>
                            <!-- Opsional: Tampilkan preview jika gambar -->
                            <template x-if="filePreview && filePreview !== 'pdf'">
                                <img :src="filePreview" class="mt-2 max-w-32 max-h-32" />
                            </template>
                            <!-- Opsional: Tampilkan ikon untuk PDF -->
                            <template x-if="filePreview === 'pdf'">
                                <p class="text-sm text-gray-600 mt-2">📄 PDF File</p>
                            </template>
                        </template>

                        <!-- Tampilan error unik untuk ijazah -->
                        <template x-if="error">
                            <p class="text-sm text-red-500 mt-2" x-text="error"></p>
                        </template>
                    </div>
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

                <div>
                    <label class="block text-gray-700 font-medium mb-1">No Ijazah</label>
                    <input type="text" name="no_ijazah" value="{{ $data->no_ijazah }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Upload Transkrip Nilai -->
                <div x-data="fileUploadTranskrip()" id="upload-transkrip" class="w-full">
                    <label class="block text-sm text-gray-100 mb-2">
                        Upload Transkrip Nilai: (.pdf/.jpg) max 2MB
                    </label>

                    <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-400': !isDragging }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">
                        <input type="file" name="transkrip" accept=".pdf,.jpg,.jpeg,.png"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <svg class="w-[40px] h-[40px] text-gray-500 mb-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                clip-rule="evenodd" />
                        </svg>

                        <template x-if="!fileName">
                            <p class="text-sm text-gray-600">Klik atau tarik file ke sini</p>
                        </template>

                        <template x-if="fileName">
                            <p class="text-sm text-gray-700 font-medium mt-2" x-text="fileName"></p>
                            <!-- Opsional: Tampilkan preview jika gambar -->
                            <template x-if="filePreview && filePreview !== 'pdf'">
                                <img :src="filePreview" class="mt-2 max-w-32 max-h-32" />
                            </template>
                            <!-- Opsional: Tampilkan ikon untuk PDF -->
                            <template x-if="filePreview === 'pdf'">
                                <p class="text-sm text-gray-600 mt-2">📄 PDF File</p>
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

                    <div x-bind:class="{ 'bg-white/40 border-blue-400': isDragging, 'bg-white/20 border-gray-400': !isDragging }"
                        @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                        @drop.prevent="handleDrop($event)"
                        class="relative border-2 border-dashed rounded-md p-6 flex flex-col items-center justify-center text-center cursor-pointer transition">

                        <input type="file" name="file_foto" accept=".png, .jpg, .jpeg"
                            class="absolute inset-0 opacity-0 cursor-pointer" x-ref="fileInput"
                            @change="handleFileSelect" />

                        <svg class="w-[40px] h-[40px] text-gray-500 mb-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                clip-rule="evenodd" />
                        </svg>

                        <template x-if="!fileName">
                            <p class="text-sm text-gray-600">Klik atau tarik file ke sini</p>
                        </template>

                        <template x-if="fileName">
                            <p class="text-sm text-gray-700 font-medium mt-2" x-text="fileName"></p>
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

                <div>
                    <label class="block text-gray-700 font-medium mb-1">No KIP</label>
                    <input type="text" name="no_kip" value="{{ $data->no_kip }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="file_kip" class="block text-gray-100 mb-1">Upload File KIP</label>
                    <input type="file" id="file_kip" name="file_kip" accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0
       file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Fakultas</label>
                    <input type="text" name="fakultas" value="{{ $data->fakultas }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Program Studi</label>
                    <input type="text" name="program_studi" value="{{ $data->program_studi }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">No. HP</label>
                    <input type="text" name="no_hp" value="{{ $data->no_hp }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ $data->email }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('admin.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
                    ← Kembali
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg transition">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>

</html>
