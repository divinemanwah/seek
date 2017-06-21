@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
					<h5 class="pull-left">Cart</h5>
					<button class="btn btn-primary pull-right">Checkout</button>
					<a class="btn btn-default pull-right" href="/cart/clear" style="margin-right: 5px;">Clear</a>
				</div>

                <div class="panel-body">
                    @empty ($items)
						Your cart is empty!
					@else
						<table class="table table-bordered table-striped">
							@foreach ($items as $id => $item)
							
								<tr>
									<td>{{ $item[0]->name }}</td>
									<td style="text-align: right;">&times;&nbsp;&nbsp;&nbsp;{{ $item[1] }}</td>
									<td style="text-align: right;">&times;&nbsp;&nbsp;&nbsp;${{ $item[2] }}</td>
								</tr>
							
							@endforeach
						</table>
					@endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
