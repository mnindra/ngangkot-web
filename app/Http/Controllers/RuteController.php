<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rute/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'rute/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'id_rute' => 'required|min:2|firebase_unique:rute',
            'keterangan' => 'required|min:6',
            'biaya' => 'required|numeric',
            'rute' => 'required'
        ]);

        // decode json rute
        $request->merge(['rute' => json_decode($request->input('rute'))]);

        // drop if its ajax
        if ($request->ajax()) return;

        // save to firebase
        Rute::create($request->all());

        return redirect('/rute');
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
        $data['id'] = $id;
        return view('rute/edit', $data);
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
            'keterangan' => 'required|min:6',
            'biaya' => 'required|numeric',
            'rute' => 'required'
        ]);
        if ($request->ajax()) return;

      // decode json rute
      $request->merge(['rute' => json_decode($request->input('rute'))]);

      Rute::update($request->all(), $id);
      return redirect('/rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rute::destroy($id);
    }
}
