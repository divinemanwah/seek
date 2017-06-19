<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the list of all Ad types, sorted by price.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalog', ['types' => DB::table('ad_types')->orderBy('price')->get()]);
    }
}
