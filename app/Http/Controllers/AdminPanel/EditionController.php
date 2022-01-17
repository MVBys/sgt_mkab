<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Edition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminPanel\EditionRequest;
class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.addedition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Problems with file EditionRequest
        $edition = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1200',
            'img_file' => 'required|mimes:jpg,png|max:5512',
            'pdf_file' => 'required|mimes:pdf|file|max:15512',
        ]);
        $edition['created_at'] =date("Y-m-d H:i:s");
        $edition['updated_at'] = date("Y-m-d H:i:s");

        $edition['img_file'] = Storage::put('editions', $edition['img_file']);
        $edition['pdf_file'] = Storage::put('editions', $edition['pdf_file']);

        Edition::insert($edition);

        return redirect()->route('adminpanel');

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
        $edition = Edition::find($id);
        Storage::delete($edition->img_file);
        Storage::delete($edition->pdf_file);

        $edition->delete();
        return redirect()->route('adminpanel');
    }
}
