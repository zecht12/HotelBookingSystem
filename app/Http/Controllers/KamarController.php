<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search= $request->search;
        $data = Kamar::select('id','nama_kamar','foto_kamar','jum_kamar','harga_kamar','deskripsi_kamar')
        ->when($search,function($query,$search){
            return $query->where('nama_kamar','like',"%{$search}%")
            ->orWhere('harga_kamar','like',"%{$search}%");
        })
        ->paginate(10) ;
        return view('kamar.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|min:3',
            'foto_kamar' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=1000,min_height=500|between:50,1000',
            'jum_kamar' => 'required',
            'harga_kamar'=>'required',
            'deskripsi_kamar'=>'required|min:10'
        ]);
        $file = $request->file('foto_kamar');
        $ext = $file->getClientOriginalExtension();
        $filename = rand(9, 999) . '_' . time() . '.' . $ext;
        $request->foto_kamar->move('images/kamar', $filename);
        Kamar::create([
            'nama_kamar' =>$request->nama_kamar,
            'foto_kamar' => $filename,
            'jum_kamar' => $request->jum_kamar,
            'harga_kamar'=>$request->harga_kamar,
            'deskripsi_kamar'=>$request->deskripsi_kamar,
        ]);
        return redirect()->route('kamar.index')->with('status', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        return view('kamar.edit',['row'=>$kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama_kamar' => 'required|min:3',
            'foto_kamar' => 'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=1000,min_height=500|between:50,1000',
            'jum_kamar' => 'required',
            'harga_kamar'=>'required',
            'deskripsi_kamar'=>'required|min:10'
        ]);
        if ($kamar->foto_kamar && $request->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if (file_exists($file)) {
                unlink($file);
            }
        };
        if ($request->foto_kamar) {
            $file = $request->file('foto_kamar');
            $ext = $file->getClientOriginalExtension();
            $filename = rand(9, 999) . '_' . time() . '.' . $ext;
            $request->foto_kamar->move('images/kamar', $filename);
            $arr = [
                'nama_kamar' =>$request->nama_kamar,
                'foto_kamar' => $filename,
                'jum_kamar' => $request->jum_kamar,
                'harga_kamar'=>$request->harga_kamar,
                'deskripsi_kamar'=>$request->deskripsi_kamar,
            ];
        } else {
            $arr = [
                'nama_kamar' =>$request->nama_kamar,
                'jum_kamar' => $request->jum_kamar,
                'harga_kamar'=>$request->harga_kamar,
                'deskripsi_kamar'=>$request->deskripsi_kamar,
            ];
        }
        $kamar->update($arr);
        return redirect()->route('kamar.index')->with('status', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        if ($kamar->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if (file_exists($file)) {
                unlink($file);
            }
        };
        $kamar->delete();
        return back()->with('status', 'destroy');
    }
}
