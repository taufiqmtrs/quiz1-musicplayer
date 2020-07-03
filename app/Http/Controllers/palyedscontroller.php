<?php

namespace App\Http\Controllers;
use App\palyeds;
use App\tracks;
use Illuminate\Http\Request;

class palyedscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $palyeds = palyeds::paginate(10);
        return view('admin.palyeds.index', compact('palyeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tracks = tracks::all();
        return view('admin.palyeds.create', compact('tracks'));
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
            'tracks_id' => 'required'
            ]);
        $palyeds =palyeds::create([
            'tracks_id' => $request->tracks_id
            ]);
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
        $tracks=tracks::all();
        $palyeds = palyeds::findorfail($id);
        return view('admin.palyeds.edit', compact('palyeds','tracks'));
       
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
        $palyeds =palyeds::find($id);
        $palyeds->update([
            'tracks_id'=>request('tracks_id'),
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
         $palyeds= palyeds::findorfail($id);
        $palyeds->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }
}
