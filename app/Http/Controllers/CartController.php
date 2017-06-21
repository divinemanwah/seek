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
		$req = $request->all();
		
		$id = 'id-' . $req['id'];
		
		if(isset($items[$id])) {
			
			$items[$id][1] += intval($req['qty'], 10);
			
			$items[$id][2] = $items[$id][0]->price * $items[$id][1];
		}
		else {
			
			$type = AdType::find($req['id']);
			$qty = intval($req['qty'], 10);
			
			$items[$id] = [$type, $qty, $type->price * $qty];
		}
		
		session(['items' => $items]);
		
		return redirect('cart');
	}
	
	public function clear(Request $request) {
		
		$request->session()->forget('items');
		
		return redirect('cart');
	}
}
