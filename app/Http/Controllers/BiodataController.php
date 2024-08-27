<?php

namespace App\Http\Controllers;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $response = Biodata::all();
        // dd($response);
        return view('biodata.list')->with('biodata', $response);

    }

    public function create()
    {
        return view('biodata.create');
    }

    public function edit($id)
    {
        $response = Biodata::find($id);
        return view('biodata.edit')->with('biodata', $response);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $imagePath = null;
        $imageUrl = null;

        if ($image) {
            $imagePath = $image->store('images', 'public');
            // dd($imagePath);
            if ($imagePath) {
                $imageUrl = Storage::disk('public')->url($imagePath);
            } else {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }

        }
        Biodata::create(
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'image_path' => $imageUrl
            ]
        );
        return redirect()->route('biodata.index');
    }

    public function update($id, Request $request)
    {
        $image = $request->file('image');
        $imagePath = null;
        $imageUrl = null;

        if ($image) {
            $imagePath = $image->store('images', 'public');
            // dd($imagePath);
            if ($imagePath) {
                $imageUrl = Storage::disk('public')->url($imagePath);
            } else {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }

        }

        Biodata::find($id)->update(
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'image_path' => $imageUrl
            ]
        );
        return redirect()->route('biodata.index');
    }

    public function destroy($id)
    {
        Biodata::find($id)->delete();
        return redirect()->route('biodata.index');
    }
}
