<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Mahasiswa - EduPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen font-sans leading-relaxed">

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-extrabold text-center mb-8 text-gray-800 tracking-wide">
            🎓 Daftar Calon Mahasiswa
        </h1>

        {{-- EXPORT --}}
        <div
            class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6 bg-white p-4 rounded-xl shadow-md">
            <div class="flex gap-2">
                <a href="{{ route('admin.export.pdf', request()->only('search')) }}"
                    class="bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2.5 rounded-lg hover:opacity-90 transition font-medium shadow">
                    📄 Unduh PDF
                </a>
                <a href="{{ route('admin.export.excel', request()->only('search')) }}"
                    class="bg-gradient-to-r from-green-500 to-green-600 text-white px-5 py-2.5 rounded-lg hover:opacity-90 transition font-medium shadow">
                    📊 Unduh Excel
                </a>
            </div>

            {{-- Search --}}
            <form action="{{ route('admin.index') }}" method="GET" class="flex space-x-2 w-full md:w-auto">
                <div class="relative w-full md:w-72">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="🔍 Cari nama, email, atau prodi..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                </div>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-medium transition shadow">
                    Cari
                </button>
            </form>
        </div>

        {{-- Flash message --}}
        @if (session('success'))
            <div
                class="mb-6 p-3 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow-sm text-center font-medium">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- TABEL --}}
        <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Nama Lengkap</th>
                        <th class="px-4 py-3 border">NISN</th>
                        <th class="px-4 py-3 border">Tempat Lahir</th>
                        <th class="px-4 py-3 border">Tanggal Lahir</th>
                        <th class="px-4 py-3 border">Nama Ibu Kandung</th>
                        <th class="px-4 py-3 border">Kewarganegaraan</th>
                        <th class="px-4 py-3 border">NIK</th>
                        <th class="px-4 py-3 border">Jalur Program</th>
                        <th class="px-4 py-3 border">No KIP</th>
                        <th class="px-4 py-3 border">File KIP</th>
                        <th class="px-4 py-3 border">Universitas</th>
                        <th class="px-4 py-3 border">Fakultas</th>
                        <th class="px-4 py-3 border">Program Studi</th>
                        <th class="px-4 py-3 border">File Ijazah</th>
                        <th class="px-4 py-3 border">No Ijazah</th>
                        <th class="px-4 py-3 border">File Transkrip</th>
                        <th class="px-4 py-3 border">Pas Foto</th>
                        <th class="px-4 py-3 border">No HP</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $row)
                        <tr
                            class="hover:bg-gray-50 even:bg-gray-50/40 transition text-gray-800 border-b border-gray-100">
                            <td class="px-4 py-3 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 border font-semibold">{{ $row->nama_lengkap }}</td>
                            <td class="px-4 py-3 border">{{ $row->nisn }}</td>
                            <td class="px-4 py-3 border">{{ $row->tempat_lahir }}</td>
                            <td class="px-4 py-3 border">{{ $row->tanggal_lahir }}</td>
                            <td class="px-4 py-3 border">{{ $row->nama_ibu_kandung }}</td>
                            <td class="px-4 py-3 border">{{ $row->kewarganegaraan }}</td>
                            <td class="px-4 py-3 border">{{ $row->nik }}</td>
                            <td class="px-4 py-3 border">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $row->jalur_program === 'KIP' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $row->jalur_program }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border">{{ $row->no_kip }}</td>
                            <td>
                                @if ($row->file_kip)
                                    <a href="{{ asset('storage/' . $row->file_kip) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        Lihat KIP
                                    </a>
                                @else
                                    <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border">{{ $row->universitas }}</td>
                            <td class="px-4 py-3 border">{{ $row->fakultas }}</td>
                            <td class="px-4 py-3 border">{{ $row->program_studi }}</td>
                            <td>
                                @if ($row->file_ijazah)
                                    <a href="{{ asset('storage/' . $row->file_ijazah) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        Lihat Ijazah
                                    </a>
                                @else
                                    <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border">{{ $row->no_ijazah }}</td>
                            <td>
                                @if ($row->file_transkrip)
                                    <a href="{{ asset('storage/' . $row->file_transkrip) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        Lihat Transkrip
                                    </a>
                                @else
                                    <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </td>
                            <td>
                                @if ($row->file_foto)
                                    <img src="{{ asset('storage/' . $row->file_foto) }}" alt="Foto"
                                        class="w-16 h-16 rounded object-cover">
                                @else
                                    <span class="text-gray-400">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border">{{ $row->no_hp }}</td>
                            <td class="px-4 py-3 border">{{ $row->email }}</td>
                            <td class="px-4 py-3 border text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.edit', $row->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('admin.delete', $row->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="21" class="text-center py-6 text-gray-500 text-sm">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center text-gray-600 text-sm">
            <div class="mb-3 sm:mb-0">
                Menampilkan <span class="font-semibold">{{ $users->firstItem() ?? 0 }}</span> -
                <span class="font-semibold">{{ $users->lastItem() ?? 0 }}</span> dari
                <span class="font-semibold">{{ $users->total() }}</span> data
            </div>
            <div>
                {{ $users->appends(request()->only('search'))->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

</body>


</html>
