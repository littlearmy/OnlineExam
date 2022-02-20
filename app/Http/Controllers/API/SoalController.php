<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Opsi;
use App\Models\Soal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;

class SoalController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soal = Soal::all();

        return response()->json(['data'=>$soal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('pages.soal.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_mapel'] = $request->id_mapel;

        // proses untuk soal yang bergambar
        $storage = "storage/content";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->nama_soal, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images= $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src=$img->getAttribute('src');
            if(preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
                $mimetype=$groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand= substr(md5($fileNameContent),6,6).'_'.time();
                $filePath=("$storage/$fileNameContentRand.$mimetype");
                $image=Image::make($src)
                        ->resize(1200,1200)
                        ->encode($mimetype, 100)
                        ->save(public_path($filePath));
                $new_src=asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                // $img->setAttribute('class', 'img-responsive');
            }
        }

        $data['nama_soal'] = $dom->saveHTML();

        $soal = Soal::create($data);

        if(count($request->nama_opsi) > 0) {
            foreach ($request->nama_opsi as $item=>$v) {
                $dataOpsi=array(
                    'id_soal'=>$soal->id,
                    'nama_opsi'=>$request->nama_opsi[$item]
                );
                Opsi::create($dataOpsi);
            }
        }

        // Alert::success('Berhasil', 'Soal berhasil dibuat');

        return response()->json(['data'=>$soal]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal = Soal::with('opsi')->find($id);
        $ops = $soal->opsi;
        return response()->json(['data'=>$ops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soal = Soal::with('opsi')->find($id);
        $mapel = MataPelajaran::all();

        return view('pages.soal.edit', compact('soal', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $storage = "storage/content";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->nama_soal, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images= $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src=$img->getAttribute('src');
            if(preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
                $mimetype=$groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand= substr(md5($fileNameContent),6,6).'_'.time();
                $filePath=("$storage/$fileNameContentRand.$mimetype");
                $image=Image::make($src)
                        ->resize(1200,1200)
                        ->encode($mimetype, 100)
                        ->save(public_path($filePath));
                $new_src=asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $data['nama_soal'] = $dom->saveHTML();

        $soal = Soal::find($id);
        $soal->update($data);

        if(count($request->id_opsi) > 0) {
            foreach ($request->id_opsi as $item=>$v) {
            $dataOpsi=array(
              'nama_opsi'=>$request->nama_opsi[$item]
            );
            $opsi = Opsi::where('id', $request->id_opsi[$item])->first();
            $opsi->update($dataOpsi);
            }
        }

        Alert::success('Berhasil', 'Soal Berhasil Diubah');

        return redirect('/soal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::find($id);
        $opsi = Opsi::where('id_soal', $soal->id)->delete();
        $soal->delete();

        Alert::success('Berhasil', 'Soal berhasil dihapus');

        return redirect('/soal');
    }
}