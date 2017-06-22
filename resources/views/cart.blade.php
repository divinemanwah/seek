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
							<thead>
								<tr>
									<th>Ad Type</th>
									<th>Quantity</th>
									<th style="text-align: right;">Amount</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($items as $id => $item)
							
								<tr>
									<td>{{ $item[0]->name }}</td>
									<td>&times;&nbsp;&nbsp;&nbsp;{{ $item[1] }}</td>
									<td style="text-align: right;">{{ number_format($item[2], 2) }}</td>
								</tr>
							
							@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td style="text-align: right;" colspan="3">
										<h3 style="@if ($is_special) border-bottom: 1px dotted #aaa; @endif display: inline;" @if ($is_special) rel="tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<ul style='padding-left: 10px;'>@foreach ($specials as $special) <li>{{ $special }}</li> @endforeach </ul>" @endif>
											Total: ${{ number_format($total, 2) }}@if ($is_special) <sup class="text-danger" style="font-size: xx-large; vertical-align: bottom;">*</sup>@endif
										</h3>
									</td>
								</tr>
							</tfoot>
						</table>
						@if ($is_special)
							<small class="info-text"><span class="text-danger" style="font-size: xx-large; line-height: 15px; vertical-align: bottom;">*</span> Special pricing applied (place cursor over the total amount for details)</small>
						@endif
					@endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
