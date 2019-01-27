@extends('admin_layout')
@section('admin_content')

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

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{('/dashboard')}}">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Forms</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{URL::to('/save-doctor')}}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<fieldset>
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<input type="text" class="input" name="doctor_name" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" class="input" name="doctor_email" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Phone</label>
						<div class="controls">
							<input type="text" class="input" name="doctor_phone" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" class="input" name="doctor_pass" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Image</label>
						<div class="controls">
							<input type="file" class="input" name="doctor_image">
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection