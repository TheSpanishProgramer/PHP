<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	
		<title>Order Confirmation</title>

	<style>
		body{ font-family: "Century Gothic"; }
		h5{ font-size: 20px; color: rgb(120, 213, 227); }
		ul{ list-style: none; }
		h1{ font-size: 50px; color: white; background: rgb(100, 100, 100); }
		span{ padding: 5px; font-size: 20px; }
		th{ color: white; 
			border-bottom: solid thin rgb(100, 100, 100); 
			background: rgb(100, 100, 100);
		}
   		table{
  			width: 75%;
  			border-collapse: collapse;
  			margin: 50px 0 50px 0;
		}
		td{
  			text-align: center;
  			font-size: 15px;
  			height: 50px;
  			vertical-align: bottom;
  			color: rgb(100, 100, 100);
		}
	</style>
	</head>

	<body>
		<h1>
  			PS4Play
		</h1>

		<h5>
  			Your order containing the following 
  			items is being processed:
		</h5>

		<table>
  			<tr>
    			<th>Product</th>
    			<th>Quantity</th>
    			<th>Price</th>
  			</tr>

  			@foreach ($games as $game) 
  				<tr>
    				<td>{{ $game['game']->name }}</td>
    				<td>{{ $game['num'] }}</td>
    				<td>{{ $game['game']->price }}</td>
  				</tr>
  			@endforeach
		</table>

		<h5>{{ '$'. number_format( array_sum( $total ), 2 ) }}</h5>

</body>
</html>