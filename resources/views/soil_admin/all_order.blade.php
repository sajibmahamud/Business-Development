@extends('soil_admin.soil_admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

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

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>File Review ID</th>
						<th>Order ID</th>
						<th>Customr ID</th>
						<th>Review Section</th>
						<th>File</th>
						<th>Status</th>
					</tr>
				</thead>   

				@foreach( $all_order_info as $order)
					<tbody>
					<tr>
						<td>{{ $order->f_id }}</td>
						<td>{{ $order->o_id }}</td>
						<td>{{ $order->c_id }}</td>
						<td>{{ $order->f_soil }}</td>
						<td class="center">
							<a href="{{ $order->o_file }}">
								<button class="btn tbn-primary">
									<i class="glyphicon glyphicon-download">File</i>
								</button>
							</a>
						</td>
						<td class="center">
							<a href="{{URL::to('/soil-confirm-order/'.$order->o_id )}}">
								<button class="btn btn-success">Decision</button>
							</a>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>            
		</div>
	</div>
</div>

@endsection