<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Mahasiswa - EduPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Calon Mahasiswa</h1>

        {{-- EXPORT --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <div class="flex gap-2">
                <a href="{{ route('admin.export.pdf', request()->only('search')) }}"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Unduh PDF
                </a>
                <a href="{{ route('admin.export.excel', request()->only('search')) }}"
                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                    Unduh Excel
                </a>
            </div>
        </div>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        {{-- Wrapper agar hanya tabel yang scroll, bukan seluruh halaman --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-700">Daftar Pendaftar Mahasiswa</h2>
                <form action="{{ route('admin.index') }}" method="GET" class="flex space-x-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama, email, atau prodi..."
                        class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                </form>
            </div>
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Lengkap</th>
                        <th class="px-4 py-2 border">NISN</th>
                        <th class="px-4 py-2 border">Tempat Lahir</th>
                        <th class="px-4 py-2 border">Tanggal Lahir</th>
                        <th class="px-4 py-2 border">Nama Ibu Kandung</th>
                        <th class="px-4 py-2 border">Kewarganegaraan</th>
                        <th class="px-4 py-2 border">NIK</th>
                        <th class="px-4 py-2 border">Jalur Program</th>
                        <th class="px-4 py-2 border">NO KIP</th>
                        <th class="px-4 py-2 border">File KIP</th>
                        <th class="px-4 py-2 border">Universitas</th>
                        <th class="px-4 py-2 border">Fakultas</th>
                        <th class="px-4 py-2 border">Program Studi</th>
                        <th class="px-4 py-2 border">File Ijazah</th>
                        <th class="px-4 py-2 border">No Ijazah</th>
                        <th class="px-4 py-2 border">File Transkrip</th>
                        <th class="px-4 py-2 border">Pas Foto</th>
                        <th class="px-4 py-2 border">No HP</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Password</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $row)
                        <tr class="hover:bg-gray-50 text-gray-700">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $row->nama_lengkap }}</td>
                            <td class="px-4 py-2 border">{{ $row->nisn }}</td>
                            <td class="px-4 py-2 border">{{ $row->tempat_lahir }}</td>
                            <td class="px-4 py-2 border">{{ $row->tanggal_lahir }}</td>
                            <td class="px-4 py-2 border">{{ $row->nama_ibu_kandung }}</td>
                            <td class="px-4 py-2 border">{{ $row->kewarganegaraan }}</td>
                            <td class="px-4 py-2 border">{{ $row->nik }}</td>
                            <td class="px-4 py-2 border">{{ $row->jalur_program }}</td>
                            <td class="px-4 py-2 border">{{ $row->no_kip }}</td>
                            <td class="px-4 py-2 border">{{ $row->file_kip }}</td>
                            <td class="px-4 py-2 border">{{ $row->universitas }}</td>
                            <td class="px-4 py-2 border">{{ $row->fakultas }}</td>
                            <td class="px-4 py-2 border">{{ $row->program_studi }}</td>
                            <td class="px-4 py-2 border">{{ $row->file_ijazah }}</td>
                            <td class="px-4 py-2 border">{{ $row->no_ijazah }}</td>
                            <td class="px-4 py-2 border">{{ $row->file_transkrip }}</td>
                            <td class="px-4 py-2 border">{{ $row->file_foto }}</td>
                            <td class="px-4 py-2 border">{{ $row->no_hp }}</td>
                            <td class="px-4 py-2 border">{{ $row->email }}</td>
                            <td class="px-4 py-2 border">{{ $row->password }}</td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('admin.edit', $row->id) }}"
                                    class="inline-block bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500 transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.delete', $row->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center py-4 text-gray-500">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="mt-4">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">Menampilkan {{ $users->firstItem() ?? 0 }} -
                    {{ $users->lastItem() ?? 0 }} dari {{ $users->total() }} data</div>
                <div>
                    {{ $users->appends(request()->only('search'))->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>
