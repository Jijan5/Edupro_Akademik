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
    <section id="profile" class="pt-24 bg-gray-900 text-white">
        <div
            class="max-w-6xl mx-auto flex flex-col md:flex-row items-center px-6 py-12 space-y-6 md:space-y-0 md:space-x-10">
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
          {id:1, nama:'Ars Universitas'},
          {id:2, nama:'STIT Bandung'},
          {id:3, nama:'IWU'},
          {id:4, nama:'UICM'},
          {id:5, nama:'STIEB Bina Esa'}
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
                <div x-show="openTab === 1" x-transition>
                    <h3 class="text-xl font-bold text-blue-700 mb-4">Ars Universitas</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 font-semibold">Fakultas:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>-- Pilih Fakultas --</option>
                                <option>Teknik</option>
                                <option>Ekonomi</option>
                                <option>Keguruan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 font-semibold">Program Studi:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>-- Pilih Program Studi --</option>
                                <option>S1 Informatika</option>
                                <option>S1 Manajemen</option>
                                <option>S1 Pendidikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p>Rincian Biaya: <strong>Rp 4.500.000/semester</strong></p>
                        <p>Total Biaya: <strong>Rp 36.000.000</strong></p>
                    </div>
                    <div class="mt-6 text-right">
                        <button href="{{ url('/pendaftaran') }}"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Daftar
                            Sekarang</button>
                    </div>
                </div>

                <!-- STIT Bandung -->
                <div x-show="openTab === 2" x-transition>
                    <h3 class="text-xl font-bold text-blue-700 mb-4">STIT Bandung</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 font-semibold">Fakultas:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>-- Pilih Fakultas --</option>
                                <option>Agama Islam</option>
                                <option>Pendidikan Guru</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 font-semibold">Program Studi:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>-- Pilih Program Studi --</option>
                                <option>S1 PAI</option>
                                <option>S1 PGMI</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p>Rincian Biaya: <strong>Rp 3.800.000/semester</strong></p>
                        <p>Total Biaya: <strong>Rp 30.400.000</strong></p>
                    </div>
                    <div class="mt-6 text-right">
                        <button href="{{ url('/pendaftaran') }}"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Daftar
                            Sekarang</button>
                    </div>
                </div>

                <!-- IWU -->
                <div x-show="openTab === 3" x-transition>
                    <h3 class="text-xl font-bold text-blue-700 mb-4">IWU</h3>
                    <p class="text-gray-700 mb-4">Informasi pendaftaran IWU akan segera tersedia.</p>
                </div>

                <!-- UICM -->
                <div x-show="openTab === 4" x-transition>
                    <h3 class="text-xl font-bold text-blue-700 mb-4">UICM</h3>
                    <p class="text-gray-700 mb-4">Informasi pendaftaran UICM akan segera tersedia.</p>
                </div>

                <!-- STIEB Bina Esa -->
                <div x-show="openTab === 5" x-transition>
                    <h3 class="text-xl font-bold text-blue-700 mb-4">STIEB Bina Esa</h3>
                    <p class="text-gray-700 mb-4">Informasi pendaftaran STIEB Bina Esa akan segera tersedia.</p>
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
