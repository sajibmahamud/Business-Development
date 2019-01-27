@extends('profile_layout')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Doctors</h2>
					<div class="page_link">
						<a href="{{URL::to('/')}}">Home</a>
						<a href="{{URL::to('/all-doctor')}}">All Doctor</a>
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
			<h2>All Doctors Info Are Here</h2>
		</div>
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>ID</th>
					<th>Doctor Name</th>
					<th>Image</th>
					<th>Contact Number</th>
					<th>Gmail</th>
				</tr>
			</thead> 
			@foreach( $all_doctor_info as $doctor)
			<tbody>
				<tr>
					<td>{{ $doctor->doctor_id }}</td>
					<td class="center">{{ $doctor->doctor_name }}</td>
					<td><img src="{{URL::to($doctor->doctor_image)}}" style="height: 80px; width: 80px;"></td>
					<td class="center">{{ $doctor->doctor_phone }}</td>
					<td class="center">{{ $doctor->doctor_email }}</td>
				</tr>
			</tbody>
			@endforeach
			
		</table>
	</div>
</section>



@endsection    