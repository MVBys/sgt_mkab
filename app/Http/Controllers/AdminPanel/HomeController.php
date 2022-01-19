<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Edition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    //
    public function index()
    {
        $editions = Edition::latest()->simplePaginate(5);

        return view('adminpanel.editions',compact('editions'));
    }






}
