@extends('profile_layout')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>All Feedback</h2>
					<div class="page_link">
						<a href="{{URL::to('/')}}">Home</a>
						<a href="{{URL::to('/feedback')}}">All Feedback</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================All Advertises =================-->
<section class="feature_area white_feature p_120">
	<div class="container">
		<div class="main_title">
			<h2>All Orders Feedback Are Here</h2>
		</div>

		<!-- session message start -->
		<p class="alert-success" style="font-size: 20px; color: #149278; text-align: center;">
			<?php 
			$message = Session::get('message');
			if ($message) {
				echo $message;
				session::put('message', null);
			}
			?>
		</p>
		<!-- sesstion message end -->
		
		<table class="table table-hover table-dark">
			<thead>
					<tr>
						<th>Order ID</th>
						<th>Country</th>
						<th>Order Section</th>
						<th>File</th>
						<th>Review Status</th>
					</tr>
				</thead>   

				@foreach( $all_order_info as $order)
				<tbody>
					<tr>
						<td>{{ $order->o_id }}</td>
						<td>{{ $order->o_country }}</td>
						<td>{{ $order->c_land }} {{ $order->c_gass }} {{ $order->c_water }} {{ $order->c_tax }} {{ $order->c_soil }}</td>
						<td class="center">
							<a href="{{ $order->o_file }}">
								<button class="btn tbn-primary">
									<i class="glyphicon glyphicon-download">File</i>
								</button>
							</a>
						</td>
						<td>{{ $order->c_message }}</td>
					</tr>
				</tbody>
				@endforeach
		</table>
	</div>
</section>



@endsection    