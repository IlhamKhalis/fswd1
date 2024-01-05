<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Cuti;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return response()->json($karyawan, 200);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            return response()->json($karyawan, 200);
        } else {
            return response()->json(['message' => 'Karyawan not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $karyawan->update($request->all());
            return response()->json($karyawan, 200);
        } else {
            return response()->json(['message' => 'Karyawan not found'], 404);
        }
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $karyawan->delete();
            return response()->json(['message' => 'Karyawan deleted'], 200);
        } else {
            return response()->json(['message' => 'Karyawan not found'], 404);
        }
    }

    public function firstJoined()
    {
        $karyawan = Karyawan::orderBy('tanggal_bergabung', 'asc')->take(3)->get();
        return response()->json($karyawan, 200);
    }

    public function everTookLeave()
    {
        $karyawan = Karyawan::whereHas('cuti')->get();
        return response()->json($karyawan, 200);
    }

    public function remainingLeave()
    {
        $karyawan = Karyawan::select('nomor_induk', 'nama')
            ->selectRaw('(12 - IFNULL((SELECT SUM(lama_cuti) FROM cuti WHERE cuti.karyawan_id = karyawan.nomor_induk), 0)) as sisa_cuti')
            ->get();
        return response()->json($karyawan, 200);
    }
}
