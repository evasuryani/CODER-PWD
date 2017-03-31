<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['data'] = \App\Perlombaan::all();
      return view('home')->with($data);
    }
    // public function index(Request $request)
    // {
    //     $perlombaan['data'] = \App\Perlombaan::where('id', $id)->get();
    //     return view('home')->with($perlombaan);
    // }

    public function show($id)
    {
      $perlombaan['data'] = \App\Perlombaan::where('id', $id)->get();
      return view('home')->with($perlombaan);
    }

    public function destroy($id)
    {
        $perlombaan = \App\Perlombaan::where('id_lomba', $id)->first();
        $perlombaan->delete();

        Session::flash('flash_message', 'Perlombaan deleted!');

        return redirect('home');
    }

    // public function edit($id)
    // {
    //   $data['result'] = \App\Perlombaan::where('id_lomba', $id)->first();
    //
    //   return view('perlombaan.index')->with($data);
    // }
}
