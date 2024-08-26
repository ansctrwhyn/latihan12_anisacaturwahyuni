<?php

namespace App\Http\Controllers;
use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $response = Biodata::all();
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
        Biodata::create($request->all());
        return redirect()->route('biodata.index');
    }

    public function update($id, Request $request)
    {
        Biodata::find($id)->update($request->all());
        return redirect()->route('biodata.index');
    }

    public function destroy($id)
    {
        Biodata::find($id)->delete();
        return redirect()->route('biodata.index');
    }
}
