@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
					<h5 class="pull-left">Cart</h5>
					<button class="btn btn-primary pull-right">Checkout</button>
				</div>

                <div class="panel-body">
                    @empty ($items)
						Your cart is empty!
					@else
						<ul>
							@foreach ($items as $i => $item)
							
								<li>{{ $item[0]->name }}</li>
							
							@endforeach
						</ul>
					@endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
