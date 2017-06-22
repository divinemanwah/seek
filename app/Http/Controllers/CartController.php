<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdType;
use App\Rule;
use Illuminate\Support\Facades\Auth;

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

		$group_id = Auth::user()->group_id;
		$total = 0;
		$specials = [];
		
		foreach($items as $item) {
			
			$rules = Rule::where([
				'group_id' => $group_id,
				'type_id' => $item[0]->id,
				'active' => 1
			])->get();

			if(count($rules) > 0) {
				
				foreach($rules as $rule) {
					
					$specials[] = $rule->description;
					
					$meta = json_decode($rule->meta, true);
					
					if(isset($meta['deal']))
						foreach($meta['deal'] as $deal) {
							
							$rate = 1 - ($deal[1] / $deal[0]); // get discount per deal, example get 5 for the price of 4 is 1 - (5 / 4) = 20% 
							$multiplier = floor($item[1] / $deal[0]); // calculate how many times $rate will be applied for the current quantity based on given rule
							
							$total += $item[2] - ($item[2] * ($rate * $multiplier)); // current bulk price minus discounted price
							
						}
					
					if(isset($meta['discount']))
						foreach($meta['discount'] as $discount) {
							
							if($item[1] >= $discount[0])
								$total += $discount[1] * $item[1];

						}
				}
			}
			else
				$total += $item[2];
		}

        return view('cart', [
			'items' => $items,
			'total' => $total,
			'is_special' => count($specials) > 0,
			'specials' => $specials
		]);
    }
	
	public function add(Request $request) {
		
		$items = session('items', []);
		$req = $request->all();
		
		$id = 'id-' . $req['id'];
		
		if(!preg_match("/^-?[1-9][0-9]*$/D", $req['qty']))
			$req['qty'] = 1;
		
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
