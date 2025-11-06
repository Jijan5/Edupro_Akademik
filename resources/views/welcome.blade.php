<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPro Akademik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans text-gray-800 bg-white">
    <!-- Navbar -->
    <nav class="bg-white shadow fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/edupro-logo.png') }}" alt="EduPro Logo" class="w-20 h-auto mx-auto">
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="#profile" class="hover:text-yellow-500 font-medium">Profile</a>
                <a href="#vision" class="hover:text-yellow-500 font-medium">Vision & Mission</a>
                <a href="#service" class="hover:text-yellow-500 font-medium">Service</a>
                <a href="#team" class="hover:text-yellow-500 font-medium">Team</a>
            </div>
            <a href="{{ url('/pendaftaran') }}"
                class="bg-blue-200 text-blue-700 font-semibold px-4 py-2 rounded-lg hover:bg-blue-300 transition">
                Daftar
            </a>
        </div>
    </nav>

    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-500 text-white text-center px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white text-center px-4 py-2 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-green-500 text-white p-3 rounded-md text-center mb-4">
        {{ session('success') }}
    </div>

    <!-- Hero Section -->
    <section id="profile" class="pt-20 bg-gray-900 text-white">
        <div
            class="max-w-6xl mx-auto flex flex-col md:flex-row items-center px-10 py-10 space-y-6 md:space-y-0 md:space-x-10">
            <img src="{{ asset('images/edupro-logo2.png') }}" alt="EduPro Logo" class="w-40 h-40 mx-auto md:mx-0">
            <div class="text-justify">
                <p class="text-lg leading-relaxed">
                    <strong>CV. Edupro Academic Indonesia</strong> adalah perusahaan konsultan pendidikan yang didirikan
                    pada tahun 2024.
                    Kami berkomitmen untuk memberikan layanan berkualitas tinggi dalam bidang pendidikan di seluruh
                    Indonesia.
                    Dengan dukungan tenaga ahli di bidang pendidikan yang memiliki level instruktur nasional, kami siap
                    membantu institusi pendidikan
                    dalam mencapai tujuan akademis mereka.
                </p>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section id="vision" class="bg-yellow-50 py-16">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 px-6">
            <!-- Visi -->
            <div>
                <h2 class="text-xl font-bold mb-4 border-b-2 border-yellow-400 inline-block">Visi</h2>
                <p class="leading-relaxed">
                    Menjadi mitra terpercaya dalam inovasi pendidikan di Indonesia, berkontribusi pada peningkatan
                    kualitas pendidikan nasional.
                </p>
            </div>

            <!-- Misi -->
            <div>
                <h2 class="text-xl font-bold mb-4 border-b-2 border-yellow-400 inline-block">Misi</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>Memberikan konsultasi pendidikan yang berstandar tinggi dan berbasis data.</li>
                    <li>Mendukung pengembangan kurikulum yang inovatif dan relevan.</li>
                    <li>Meningkatkan kapasitas tenaga pendidik melalui pelatihan dan workshop.</li>
                    <li>Menyediakan solusi pendidikan yang disesuaikan dengan kebutuhan klien.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Layanan Kami -->
    <section id="service" class="py-16 bg-white">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold">Layanan Kami</h2>
        </div>
        <div class="max-w-6xl mx-auto grid md:grid-cols-4 sm:grid-cols-2 gap-6 px-6">
            <div class="bg-blue-900 text-white rounded-xl p-6 shadow-md hover:scale-105 transition">
                <h3 class="text-lg font-bold mb-2">1. Konsultasi Pendidikan</h3>
                <p>Analisis dan pengembangan strategi pendidikan yang efektif.</p>
            </div>
            <div class="bg-blue-900 text-white rounded-xl p-6 shadow-md hover:scale-105 transition">
                <h3 class="text-lg font-bold mb-2">2. Pengembangan Kurikulum</h3>
                <p>Desain dan implementasi kurikulum terbaru sesuai standar nasional.</p>
            </div>
            <div class="bg-blue-900 text-white rounded-xl p-6 shadow-md hover:scale-105 transition">
                <h3 class="text-lg font-bold mb-2">3. Pelatihan dan Workshop</h3>
                <p>Program peningkatan keterampilan untuk tenaga pendidik.</p>
            </div>
            <div class="bg-blue-900 text-white rounded-xl p-6 shadow-md hover:scale-105 transition">
                <h3 class="text-lg font-bold mb-2">4. Analisis Data Pendidikan</h3>
                <p>Menggunakan data kependidikan untuk meningkatkan kinerja institusi.</p>
            </div>
        </div>
        <div class="max-w-4xl mx-auto mt-10 text-center text-gray-700 px-6">
            <p>
                Kami bangga dapat melayani berbagai institusi pendidikan di seluruh Indonesia, dari Sabang hingga
                Merauke.
                Dengan pendekatan yang personal dan berbasis kebutuhan, kami memastikan bahwa setiap layanan kami
                memberikan dampak positif dan berkelanjutan pada klien kami.
            </p>
        </div>
    </section>

    <!-- EduPro Team -->
    <section id="team" class="bg-gray-100 py-16">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold">EduPro Team</h2>
        </div>
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 sm:grid-cols-2 gap-8 px-6 text-center">
            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg">
                <h3 class="font-semibold text-lg mb-2">Instruktur Nasional</h3>
                <p>Para ahli dengan pengalaman luas di bidang pendidikan, siap membimbing program pelatihan nasional.
                </p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg">
                <h3 class="font-semibold text-lg mb-2">Tenaga Teknis Data Kependidikan</h3>
                <p>Profesional terampil dalam analisis data untuk mendukung laporan kependidikan yang akurat.</p>
            </div>
            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg">
                <h3 class="font-semibold text-lg mb-2">Spesialis Kurikulum</h3>
                <p>Tim yang fokus pada pengembangan dan pembaruan kurikulum sesuai kebutuhan zaman.</p>
            </div>
        </div>
    </section>

    <!-- Pendaftaran -->
    <section id="register" class="bg-blue-200 py-16">
        <div class="max-w-6xl mx-auto text-center mb-10">
            <h2 class="text-2xl font-bold mb-2">Pendaftaran</h2>
            <p>Daftar dan pilih universitas yang kamu mau</p>
        </div>

        <div x-data="{ openTab: 1 }" class="max-w-5xl mx-auto bg-blue-100 p-8 rounded-xl shadow-lg">

            <!-- Tombol Universitas (Horizontal) -->
            <div class="flex flex-wrap justify-center gap-4 overflow-x-auto pb-4 border-b border-blue-300">
                <template
                    x-for="(tab, index) in [
          {id:1, nama:'ARS University'},
          {id:2, nama:'STIT Bandung'},
          {id:3, nama:'IWU'},
          {id:4, nama:'UICM'},
          {id:5, nama:'STEBI Bina Essa'},
          {id:6, nama:'Universitas Wiralodra'}
        ]"
                    :key="tab.id">
                    <button @click="openTab = tab.id"
                        :class="openTab === tab.id ? 'bg-yellow-400 text-gray-900' :
                            'bg-yellow-100 text-gray-700 hover:bg-yellow-200'"
                        class="px-4 py-2 font-semibold rounded-lg transition whitespace-nowrap shadow-sm">
                        <span x-text="tab.nama"></span>
                    </button>
                </template>
            </div>

            <!-- Konten Tab -->
            <div class="mt-8 text-left">
                <!-- Ars Universitas -->
                <div x-show="openTab === 1" x-transition x-data="{
                    fakultas: '',
                    programStudi: '',
                    listProdi: {
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
                }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Ars University</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Fakultas -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Fakultas:</label>
                            <select x-model="fakultas"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Fakultas --</option>
                                <template x-for="(prodis, key) in listProdi" :key="key">
                                    <option x-text="key"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <template x-if="fakultas">
                                    <template x-for="prodi in listProdi[fakultas]" :key="prodi">
                                        <option x-text="prodi"></option>
                                    </template>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Keterangan</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Semester 1</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Semester 2–4</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Semester 5–8</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Formulir</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Pra Kuliah</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 2.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Kuliah</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.500.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.500.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.500.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">SPP</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 1.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="font-semibold bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Jumlah per Semester</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 6.750.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 5.500.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.500.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <a @click.prevent="
                            const url = new URL('{{ url('/pendaftaran') }}');
                            url.searchParams.set('universitas', 'ARS University');
                            url.searchParams.set('fakultas', fakultas);
                            url.searchParams.set('program_studi', programStudi);
                            window.location.href = url.toString();
                          "
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- STIT Bandung -->
                <div x-show="openTab === 2" x-transition x-data="{ programStudi: '', baseUrl: '{{ url('/pendaftaran') }}' }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">STIT Bandung</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <option>Pendidikan Agama Islam (PAI) S1</option>
                                <option>Manajemen Pendidikan Islam S1</option>
                                <option>Pendidikan Islam Anak Usia Dini (PIAUDI) S1</option>
                                <option>Pendidikan Guru Madrasah Ibtidaiyah (PGMI) S1</option>
                                <option>Manajemen Keuangan Syariah S1</option>
                                <option>Ekonomi Islam S1</option>
                                <option>Perbankan Syariah S1</option>
                                <option>Pendidikan Bahasa Inggris S1</option>
                                <option>Sastra & Bahasa Indonesia S1</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya Akan Diinfokan Lebih lanjut
                        </h4>
                        {{-- <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Program KIP-K</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelar Reguler &
                                            Experience</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelas Sore/Karyawan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendaftaran</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Jas Almamater, KTM dan Buku
                                            Panduan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Asuransi Kecelakaan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pengembangan Pendidikan
                                            (BPP)</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendidikan (BP) Persemester
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FISB</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.900.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FST</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.750.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FSD</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.950.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 5.450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>

                    <div class="mt-6 text-right">
                        <a :href="baseUrl +
                            '?universitas=' + encodeURIComponent('STIT Bandung ') + '&program_studi=' + encodeURIComponent(programStudi)"
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- IWU -->
                <div x-show="openTab === 3" x-transition x-data="{ programStudi: '', baseUrl: '{{ url('/pendaftaran') }}' }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">IWU</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <option>Hubungan International</option>
                                <option>Ilmu Komunikasi</option>
                                <option>Ilmu Politik</option>
                                <option>Administrasi Bisnis</option>
                                <option>Matematika</option>
                                <option>Biologi</option>
                                <option>Desain Interior</option>
                                <option>Fisika</option>
                                <option>Kimia</option>
                                <option>Desain Komunikasi Visual</option>
                                <option>Informatika</option>
                                <option>Akuntansi Perpajakan</option>
                                <option>Peradilan Pidana</option>
                            </select>
                        </div>
                    </div>

                     <!-- Rincian Biaya -->
                     <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Program KIP-K</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelar Reguler &
                                            Experience</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelas Sore/Karyawan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendaftaran</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Jas Almamater, KTM dan Buku
                                            Panduan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Asuransi Kecelakaan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pengembangan Pendidikan
                                            (BPP)</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendidikan (BP) Persemester
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FISB</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.900.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FST</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.750.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FSD</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.950.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 5.450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <a :href="baseUrl + '?universitas=' + encodeURIComponent('IWU') + '&program_studi=' + encodeURIComponent(programStudi)"
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- UICM -->
                <div x-show="openTab === 4" x-transition x-data="{
                    fakultas: '',
                    programStudi: '',
                    listProdi: {
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
                            'Program Studi Agribisnis S1',
                            'Program Studi Agroteknologi S1',
                            'Program Studi Peternakan S1',
                            'Program Studi Arsitektur Lanskap S1',
                            'Program Studi Teknologi Hasil Pertanian S1',
                        ],
                        'Fakultas Keguruan & Ilmu Pendidikan': [
                            'Program Studi Pendidikan Masyarakat S1'
                        ]
                    }
                }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">UICM</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Fakultas -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Fakultas:</label>
                            <select x-model="fakultas"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Fakultas --</option>
                                <template x-for="(prodis, key) in listProdi" :key="key">
                                    <option x-text="key"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <template x-if="fakultas">
                                    <template x-for="prodi in listProdi[fakultas]" :key="prodi">
                                        <option x-text="prodi"></option>
                                    </template>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Uang Pendaftaran</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Uang Penyelenggara
                                            PKKMB & Almamater</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Dana Pengembangan
                                            Pendidikan</th>
                                    </tr>
                                </thead>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">Rp. 100.000</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">Rp. 500.000</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">Rp. 2.000.000</td>
                                </tr>
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Program Studi Fakultas
                                            Teknik</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">SPP/Semester</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Registrasi Semester
                                        </th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Praktikum SKS</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kemahasiswaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Teknik Industri S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.500.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Teknik Kimia S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.500.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Teknik Idustri Tekstil D3</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.00</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.00</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.00</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Teknik Kimia Tekstil D3</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <thead class="bg-blue-100 text-gray-700">
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2 text-left">Program Studi
                                                Fakultas Pertanian</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">SPP/Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Registrasi
                                                Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Praktikum SKS</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Kemahasiswaan</th>
                                        </tr>
                                    </thead>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Agribisnis S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Agroteknologi S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Arsitektur Lanskap/Pertamanan S1
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Teknologi Hasil Pertanian S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Peternakan S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 200.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <thead class="bg-blue-100 text-gray-700">
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2 text-left">Program Studi
                                                Fakultas Ekonomi</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">SPP/Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Registrasi
                                                Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Praktikum SKS</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Kemahasiswaan</th>
                                        </tr>
                                    </thead>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Akuntansi S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Manajemen S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <thead class="bg-blue-100 text-gray-700">
                                        <tr>
                                            <th class="border border-gray-300 px-4 py-2 text-left">Program Studi
                                                Fakultas Keguruan & Ilmu Pendidikan</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">SPP/Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Registrasi
                                                Semester</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Praktikum SKS</th>
                                            <th class="border border-gray-300 px-4 py-2 text-center">Kemahasiswaan</th>
                                        </tr>
                                    </thead>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Pendidikan Luar Sekolah/Pendidikan
                                            Masyarakat S1</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <a @click.prevent="
                            const url = new URL('{{ url('/pendaftaran') }} ');
                        url.searchParams.set('universitas', 'UICM');
                        url.searchParams.set('program_studi', programStudi);
                        window.location.href = url.toString();"
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- STEBI Bina Essa -->
                <div x-show="openTab === 5" x-transition x-data="{ programStudi: '', baseUrl: '{{ url('/pendaftaran') }}' }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">STEBI Bina Essa</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <option>Ekonomi Syariah S1</option>
                                <option>Perbankan Syariah S1</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya Akan Diinfokan Lebih lanjut
                        </h4>
                        {{-- <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Program KIP-K</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelar Reguler &
                                            Experience</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelas Sore/Karyawan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendaftaran</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Jas Almamater, KTM dan Buku
                                            Panduan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Asuransi Kecelakaan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pengembangan Pendidikan
                                            (BPP)</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendidikan (BP) Persemester
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FISB</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.900.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FST</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.750.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FSD</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.950.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 5.450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>

                    <div class="mt-6 text-right">
                        <a :href="baseUrl + '?universitas=' + encodeURIComponent('STEBI Bina Essa') + '&program_studi=' + encodeURIComponent(programStudi)"
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- STEBI Bina Essa -->
                <div x-show="openTab === 6" x-transition x-data="{ programStudi: '', baseUrl: '{{ url('/pendaftaran') }}' }">
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Universitas Wiralodra (Magister/Pascasarjana S2)</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Dropdown Program Studi -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">Program Studi:</label>
                            <select x-model="programStudi"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">-- Pilih Program Studi --</option>
                                <option>Manajemen Pendidikan S2</option>
                                <option>Hukum S2</option>
                            </select>
                        </div>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="mt-6 text-gray-700">
                        <h4 class="font-semibold text-lg mb-3 text-blue-700">Rincian Biaya Akan Diinfokan Lebih lanjut
                        </h4>
                        {{-- <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-sm">
                                <thead class="bg-blue-100 text-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Program KIP-K</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelar Reguler &
                                            Experience</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Kelas Sore/Karyawan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendaftaran</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Jas Almamater, KTM dan Buku
                                            Panduan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 700.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Asuransi Kecelakaan</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 100.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pengembangan Pendidikan
                                            (BPP)</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.000.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Biaya Pendidikan (BP) Persemester
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FISB</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 3.900.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.400.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FST</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.250.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.750.000</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">FSD</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">-</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 4.950.000</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">Rp. 5.450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>

                    <div class="mt-6 text-right">
                        <a :href="baseUrl + '?universitas=' + encodeURIComponent('Universitas Wiralodra') + '&program_studi=' + encodeURIComponent(programStudi)"
                            href="#"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="max-w-6xl mx-auto text-center space-y-4 px-6">
            <img src="{{ asset('images/edupro-logo.png') }}" alt="EduPro Logo" class="w-40 h-auto mx-auto">
            <p>eduproacademicindonesia@gmail.com | 081211121855</p>
            <p>Jl. Srimahi Dalam II No.3, Ancol, Kec. Regol, Kota Bandung, Jawa Barat 40254</p>
            <p>Bersama CV. Edupro Academic Indonesia, mari kita wujudkan pendidikan berkualitas untuk masa depan yang
                lebih baik</p>
            <p class="text-sm text-gray-400">&copy; EduPro 2024</p>
        </div>
    </footer>
</body>

</html>