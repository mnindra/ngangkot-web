<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\FirebaseLib;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->firebase = new FirebaseLib(env('databaseURL'), env('dbSecreat'));
    }

    public function index()
    {
      return view('admin/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/create');
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
        'nama' => 'required|min:4',
        'username' => 'required|min:4|alpha_num',
        'password' => 'required|min:6|same:konfirmasi_password',
        'konfirmasi_password' => 'required',
        'telp' => 'required|numeric'
      ]);

      // drop if its ajax
      if ($request->ajax()) return;

      // saving to firebase
      $id = uniqid();
      $path = "/admin/" . $id . "/";
      $data = array(
        'id_admin' => $id,
        'nama' => $request->input('nama'),
        'telp' => $request->input('telp'),
        'username' => $request->input('username'),
        'password' => md5($request->input('username'))
      );
      $this->firebase->set($path, $data);

      return redirect('/admin');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
