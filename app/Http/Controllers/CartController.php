<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdType;

class CartController extends Controller
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
    public function index() {
		
		$items = session('items', []);
		
        return view('cart', ['items' => $items]);
    }
	
	public function add(Request $request) {
		
		$items = session('items', []);
		
		$items[] = [AdType::find($request->input('id')), intval($request->input('qty'), 10)];
		
		session(['items' => $items]);
		
		return redirect('cart');
	}
	
	public function clear(Request $request) {
		
		$request->session()->forget('items');
		
		return redirect('cart');
	}
}
