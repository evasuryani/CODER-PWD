<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perlombaan;
use Illuminate\Http\Request;
use Session;
use Uploader;


class PerlombaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('perlombaan.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

      $validate=[
        'nama_lomba' => 'required',
        'id_bidang' => 'required|exists:bidang',
        'tgl_perlombaan' => 'required',
        'deskripsi' => 'required',
        'link' => 'required',
        'poster' => 'required|mimes:jpeg,png,jpg|max:2048',
      ];

      $this->validate($request,$validate);

      $input = $request->all();

      if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
        $filename = $input['nama_lomba']. "." . $request->file('poster')->getClientOriginalExtension();
        $request->file('poster')->storeAs('', $filename);
        $input['poster'] = $filename;
      }

      Perlombaan::create($input);

      return redirect('/home')->with('success','Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
      $data['perlombaan'] = \App\Perlombaan::where('id_lomba', $id)->first();

      return view('perlombaan.index')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
      $validate=[
        'nama_lomba' => 'required',
        'id_bidang' => 'required|exists:bidang',
        'tgl_perlombaan' => 'required',
        'deskripsi' => 'required',
        'link' => 'required',
      ];

      $this->validate($request,$validate);

      $input = $request->all();
      $perlombaan  = \App\Perlombaan::where('id_lomba', $id)->first();

      if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
        $filename = $input['nama_lomba']. "." . $request->file('poster')->getClientOriginalExtension();
        $request->file('poster')->storeAs('', $filename);
        $input['poster'] = $filename;
      }

      $perlombaan->update($input);

      return redirect('/home')->with('success','Item Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $perlombaan = \App\Perlombaan::where('id_lomba', $id)->first();
        $perlombaan->delete();

        Session::flash('flash_message', 'Perlombaan deleted!');

        return redirect('home');
    }
}
