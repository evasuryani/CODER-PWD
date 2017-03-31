<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bidang;
use Illuminate\Http\Request;
use Session;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bidang = Bidang::
                ->paginate($perPage);
        } else {
            $bidang = Bidang::paginate($perPage);
        }

        return view('admin.bidang.index', compact('bidang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.bidang.create');
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
        
        $requestData = $request->all();
        
        Bidang::create($requestData);

        Session::flash('flash_message', 'Bidang added!');

        return redirect('admin/bidang');
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
        $bidang = Bidang::findOrFail($id);

        return view('admin.bidang.show', compact('bidang'));
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
        $bidang = Bidang::findOrFail($id);

        return view('admin.bidang.edit', compact('bidang'));
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
        
        $requestData = $request->all();
        
        $bidang = Bidang::findOrFail($id);
        $bidang->update($requestData);

        Session::flash('flash_message', 'Bidang updated!');

        return redirect('admin/bidang');
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
        Bidang::destroy($id);

        Session::flash('flash_message', 'Bidang deleted!');

        return redirect('admin/bidang');
    }
}
