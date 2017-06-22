<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seek</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			.types td {
				padding: 20px;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::guest())
						<a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @else
                        <a href="{{ url('/cart') }}">Cart &rarr;</a>
                    @endif
                </div>
            @endif

            <div class="content">
				<form method="POST" action="/cart" autocomplete="off">
					<table class="types">
						<tr>
							@foreach ($types as $type)
								<td>
									<h3>{{ $type->name }}</h3>
									<em title="{{ $type->description }}">{{ str_limit($type->description, 35) }}</em>
									<p>
										<button type="submit" name="id" value="{{ $type->id }}">${{ $type->price }}</button> <input type="text" size="3" placeholder="Qty." name="qty" value="1" />
									</p>
								</td>
							@endforeach
						</tr>
					</table>
					{{ csrf_field() }}
				</form>
            </div>
        </div>
		<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript">
			$(function () {
				
				$('form').submit(function (e) {
					
					if(!$(this).data('go'))
						e.preventDefault();
					
				});
				
				$('button').click(function (e) {
					
					$(this)
						.parents('td')
						.siblings()
							.find('button, input')
								.attr('disabled', 'disabled');
					
					$('form')
						.data('go', true)
						.submit();
					
				});
				
			});
		</script>
    </body>
</html>
