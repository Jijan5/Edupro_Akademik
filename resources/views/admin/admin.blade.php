<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Mahasiswa - In University</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex flex-col items-center min-h-screen py-10">
        <!-- Header -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/in university-black.png') }}" alt="Logo" class="h-14 mx-auto mb-3">
            <h1 class="text-xl font-semibold text-gray-700">Sistem Informasi Akademik</h1>
            <h2 class="text-2xl font-bold text-blue-700 uppercase">In University</h2>
            <p class="text-sm text-gray-500">Pendaftaran Calon Mahasiswa</p>
        </div>

        <!-- Form Card -->
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Daftar Pendaftar Mahasiswa</h2>
            <div class="overflow-auto max-h-[500px] w-full">
                    <form action="{{ route('admin.index') }}" method="GET" class="flex space-x-2">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama, email, atau prodi..."
                            class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64"
                        >
                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                        >Cari</button>
                    </form>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Nama Ibu Kandung</th>
                            <th>Kewarganegaraan</th>
                            <th>NIK</th>
                            <th>Jalur Program</th>
                            <th>Universitas</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>No Ijazah</th>
                            <th>No HP</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->tempat_lahir }}</td>
                                <td>{{ $user->tanggal_lahir }}</td>
                                <td>{{ $user->nama_ibu_kandung }}</td>
                                <td>{{ $user->kewarganegaraan }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->jalur_program }}</td>
                                <td>{{ $user->universitas }}</td>
                                <td>{{ $user->fakultas }}</td>
                                <td>{{ $user->program_studi }}</td>
                                <td>{{ $user->no_ijazah }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
