<?php

namespace App\Http\Controllers;
use App\tracks;
use App\albums;
use Illuminate\Http\Request;

class trackscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tracks = tracks::paginate(10);
        return view('admin.tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = albums::all();
        return view('admin.tracks.create', compact('albums'));
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
            'nama_tracks' => 'required',
            'albums_id' => 'required',
            'tracks_time' => 'required',
            'tracks_file' => 'required'
            ]);

        $tracks_file = $request->tracks_file;
        $new_tracks_file = time().$tracks_file->getClientOriginalName();

        $tracks =tracks::create([
            'nama_tracks' => $request->nama_tracks,
            'albums_id' => $request->albums_id,
            'tracks_time' => $request->tracks_time,
            'tracks_file' => 'public/uploads/tracks/'. $new_tracks_file
            ]);
        
        $tracks_file->move('public/uploads/tracks/', $new_tracks_file);
        return redirect()->back()->with('success','postingan anda tersimpan');
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
        $albums=albums::all();
        $tracks = tracks::findorfail($id);
        return view('admin.tracks.edit', compact('tracks','albums'));
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
         $this->validate($request, [
            'nama_tracks' => 'required',
            'albums_id' => 'required',
            'tracks_time' => 'required'
            ]);

         $tracks =tracks::findorfail($id);
         if($request->has('tracks_file')){
            $tracks_file=$request->tracks_file;
            $new_tracks_file = time(). $tracks_file->getClientOriginalName();
            $tracks_file->move('public/uploads/tracks/', $new_tracks_file);
        }

        $tracks_data =[
            'nama_tracks' => $request->nama_tracks,
            'albums_id' => $request->albums_id,
            'tracks_time' => $request->tracks_time,
            'tracks_file' => 'public/uploads/tracks/'. $new_tracks_file
            ];
        
        $tracks->update($tracks_data);
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
        $tracks= tracks::findorfail($id);
        $tracks->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }
}
