<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\LandingPage;
use App\Models\User;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'universitas' => 'required|string',
            'jalur_program' => 'required|string',
            'no_kip' => 'nullable|string|max:100',
            'file_kip' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048', // Sesuaikan nama field
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|size:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:100',
            'nik' => 'required|string|size:16',
            'file_ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048', // Sesuaikan nama field
            'no_ijazah' => 'nullable|string|max:100',
            'file_transkrip' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048', // Sesuaikan
            'file_foto' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Sesuaikan
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'capthca' => 'required',
            'agreement' => 'required|accepted',
        ]);

        // Upload ijazah (wajib)
        $validated['file_ijazah'] = $request->file('file_ijazah')->store('ijazah', 'public');

        // Upload  transkrip
        $validated['file_transkrip'] = $request->file('file_transkrip')->store('transkrip', 'public');

        // upload pas foto (wajib)
        $validated['file_foto'] = $request->file('file_foto')->store('file_foto', 'public');

        // upload KIP (wajib)
        $validated['file_kip'] = $request->file('file_kip')->store('file_kip', 'public');

        // Enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        // Simpan ke database (gunakan User, bukan Users)
        // dd($validated);
        LandingPage::create($validated);

        return redirect('/welcome')->with('success', 'Pendaftaran berhasil!');

        if ($request->jalur_program === 'KIP') {
            $validated['nomor_kip'] = $request->nomor_kip;

            if ($request->hasFile('file_kip')) {
                $validated['file_kip'] = $request->file('file_kip')->store('file_kip', 'public');
            }
        }
    }
}