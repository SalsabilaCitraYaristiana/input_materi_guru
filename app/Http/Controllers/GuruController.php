<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();

        if($gurus) {
            return ApiFormatter::createApi(200, 'success', $gurus);
        }else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function restore($id)
    {
        try {
            $guru = Guru::onlyTrashed()->where('id', $id);
            $guru->restore();
            $dataRestore = Guru::where('id', $id)->first();
            if ($dataRestore) {
                return ApiFormatter::createApi(200, 'success', $dataRestore);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
            } catch (Exception $error) {
                return ApiFormatter::createApi(400, 'failed', $error->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaguru' => 'required',
                'mapel' => 'required',
                'tahunajaran' => 'required|numeric|min:2000|max:' . (date('Y') + 1),
                'semester' => 'required',
                'judulmateri' => 'required',
                'deskripsimateri' => 'required',
            ]);

            $tahunajaran = date('Y');
            $semester = ceil(($request->tahunajaran - 2023) / 2);

            $existingMateri = Guru::where('namaguru', $request->namaguru)
            ->where('mapel', $request->mapel)
            ->where('tahunajaran', $tahunajaran)
            ->where('semester', $semester)
            ->where('judulmateri', $request->judulmateri)
            // ->where('semester', $semester)
            ->first();
    
        if ($existingMateri) {
            return redirect()->back()->with('error', 'Materi dengan judul yang sama sudah ada untuk semester ini.');
        }

            $guru = Guru::create([
                'namaguru' => $request->namaguru,
                'mapel' => $request->mapel,
                'tahunajaran' => $request->tahunajaran,
                'semester' => $request->semester,
                'judulmateri' => $request->judulmateri,
                'deskripsimateri' => $request->deskripsimateri,
                // 'semester' => $request->semester,
            ]);

            // return redirect()->route('materi-guru.index')->with('success', 'Materi guru berhasil disimpan');

            $getDataSaved = Guru::where('id', $guru->id)->first();

            if ($getDataSaved) {
                return ApiFormatter::createApi(200, 'success', $getDataSaved);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        }catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed', $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $guru = Guru::find($id);
            if ($guru) {
                return ApiFormatter::createApi(200, 'success', $guru);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'error', $error->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function trash()
    {
        try {
            $gurus = Guru::onlyTrashed()->get();
            if ($gurus) {
                return ApiFormatter::createApi(200, 'success', $gurus);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        }  catch (Exception $error) {
            return ApiFormatter::createApi(400, 'error', $error->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'namaguru' => 'required',
                'mapel' => 'required',
                'tahunajaran' => 'required|numeric|min:2000|max:' . (date('Y') + 1),
                'semester' => 'required',
                'judulmateri' => 'required',
                'deskripsimateri' => 'required',
            ]);
            $guru = Guru::find($id);
            $guru->update([
                'namaguru' => $request->namaguru,
                'mapel' => $request->mapel,
                'tahunajaran' => $request->tahunajaran,
                'semester' => $request->semester,
                'judulmateri' => $request->judulmateri,
                'deskripsimateri' => $request->deskripsimateri,
            ]);
            $dataTerbaru = Guru::where('id', $guru->id)->first();
            if ($dataTerbaru) {
                return ApiFormatter::createApi(200, 'success', $dataTerbaru);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
            } catch (Exception $error) {
                return ApiFormatter::createApi(400, 'error', $error->getMessage());
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $guru = Guru::find($id);
            $cekBerhasil = $guru->delete();
            if ($cekBerhasil) {
                return ApiFormatter::createApi(200, 'success', 'Data terhapus!');
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        }  catch (Exception $error) {
            return ApiFormatter::createApi(400, 'error', $error->getMessage());
    }
    }

    public function permanentDelete($id)
    {
        try {
            $guru = Guru::onlyTrashed()->where('id', $id);
            $proses = $guru->forceDelete();
            if ($proses) {
                return ApiFormatter::createApi(200, 'success', 'Data dihapus permanen!');
            }else {
                return ApiFormatter::createApi(400, 'failed');
            }
        }  catch (Exception $error) {
            return ApiFormatter::createApi(400, 'error', $error->getMessage());
    }
    }
}
    

            
