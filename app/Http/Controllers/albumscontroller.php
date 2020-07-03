<?php

namespace App\Http\Controllers;
use App\albums;
use App\artis;
use Illuminate\Http\Request;

class albumscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = albums::paginate(10);
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artis = artis::all();
        return view('admin.albums.create', compact('artis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_album' => 'required',
            'artis_id' => 'required'
            ]);
        $albums =albums::create([
            'nama_album' => $request->nama_album,
            'artis_id' => $request->artis_id
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artis=artis::all();
        $albums = albums::findorfail($id);
        return view('admin.albums.edit', compact('albums','artis'));
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
        $albums =albums::find($id);
        $albums->update([
            'artis_id'=>request('artis_id'),
            ]);
         return redirect()->back()->with('success','postingan anda tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums= albums::findorfail($id);
        $albums->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }
}
