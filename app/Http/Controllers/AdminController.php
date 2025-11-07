<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\User;

class AdminController extends Controller
{
    public function exportPdf()
    {
        $users = User::all();
        $pdf = Pdf::loadView('admin.export_pdf', compact('users'))->setPaper('a2', 'landscape');
        return $pdf->stream('data_pendaftar.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'data_pendaftar.xlsx');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = DB::table('users')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('universitas', 'like', "%{$search}%")
                        ->orWhere('program_studi', 'like', "%{$search}%")
                        ->orWhere('nik', 'no_kip', 'nisn', 'like', "%{$search}%")
                        ->orWhere('no_ijazah', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10); // ganti get() jadi paginate()

        return view('admin.index', compact('users'));
    }

    public function edit($id)
    {
        $data = LandingPage::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $record = LandingPage::findOrFail($id);

        $validated = $request->validate([
            'universitas' => 'nullable|string',
            'jalur_program' => 'nullable|string',
            'no_kip' => 'nullable|string|max:6',
            'file_kip' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'nama_lengkap' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|size:10',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'kewarganegaraan' => 'nullable|string|max:100',
            'nik' => 'nullable|string|size:16',
            'file_ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'no_ijazah' => 'nullable|string|max:100',
            'file_transkrip' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_foto' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'fakultas' => 'nullable|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email',
        ]);

        // Proses upload file baru jika ada
        $fileFields = ['file_kip', 'file_ijazah', 'file_transkrip', 'file_foto'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('uploads', 'public');
            }
        }

        $record->update($validated);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $data = LandingPage::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus!');
    }
}