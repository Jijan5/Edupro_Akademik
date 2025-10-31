<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar Mahasiswa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #444; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Daftar Pendaftar Mahasiswa</h2>

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
                <th>File Ijazah</th>
                <th>No Ijazah</th>
                <th>File Transkrip</th>
                <th>File Foto</th>
                <th>No HP</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
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
                    <td>{{ $user->file_ijazah }}</td>
                    <td>{{ $user->no_ijazah }}</td>
                    <td>{{ $user->file_transkrip }}</td>
                    <td>{{ $user->file_foto }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
