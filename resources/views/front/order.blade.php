@extends('profile_layout')
@section('content')


<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Give Order</h2>
					<div class="page_link">
						<a href="{{URL::to('/')}}">Home</a>
						<a href="{{URL::to('/services')}}">Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->



<!--================Welcome Area =================-->
<section class="welcome_area p_120">
	<div class="container">
		<div class="row welcome_inner">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8">

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

				<form action="{{URL::to('/save-order')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="exampleInputEmail1">Country</label>
						<input type="text" class="form-control" name="o_country" required="" placeholder="Type Country Name">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Business Name</label>
						<input type="text" class="form-control" name="o_b_name" required="" placeholder="Type Business Name">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Description</label>
						<textarea type="textarea" class="form-control" name="o_description" required="" placeholder="Type Description"></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" name="o_email" required="" placeholder="Type Email">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Phone</label>
						<input type="text" class="form-control" name="o_phone" required="" placeholder="Type Phone Number">
					</div>
					<div class="form-group">
						<div class="btn-group PayementBtnGroup btn-group-justified" data-toogle="buttons" >
							<label btn PayementMethod active>
								<div class="mehtod visa">Soil</div>
								<input type="checkbox" name="soil" value="soil">
							</label>

							<label btn PayementMethod active style="margin-left: 7px">
								<div class="mehtod visa">Gass</div>
								<input type="checkbox" name="gass" value="gass">
							</label>

							<label btn PayementMethod active style="margin-left: 7px">
								<div class="mehtod visa">Land</div>
								<input type="checkbox" name="land" value="land">
							</label>

							<label btn PayementMethod active style="margin-left: 7px">
								<div class="mehtod visa">Water</div>
								<input type="checkbox" name="water" value="water">
							</label>

							<label btn PayementMethod active style="margin-left: 7px">
								<div class="mehtod visa">Tax</div>
								<input type="checkbox" name="tax" value="tax">
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">File</label>
						<input type="file" class="form-control" name="o_file" multiple="">
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
	</div>
</section>
<!--================End Welcome Area =================-->


@endsection