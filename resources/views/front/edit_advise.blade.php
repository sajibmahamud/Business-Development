@extends('edit_layout')
@section('admin_content')


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

				<form action="{{URL::to('/update-advise', $advise_info->a_id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="exampleInputEmail1">Name</label>
						<input type="text" class="form-control" name="a_name" value="{{ $advise_info->a_name}}">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Description</label>
						<textarea  type="textarea" class="form-control" rows="6" cols="8" name="a_description"> {{ $advise_info->a_description}}</textarea>
					</div>

					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<img src="{{URL::to($advise_info->a_image)}}" style="height: 120px; width: 120px;">
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Image</label>
						<input type="file" class="form-control" name="a_image" placeholder="Enter Title">
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