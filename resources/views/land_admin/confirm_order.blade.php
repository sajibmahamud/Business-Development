@extends('land_admin.land_admin_layout')
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

<form method="post" action="{{'/land-confirm'}}">
	{{csrf_field()}}
	<div class="form-group">
		<h3>Write Message</h3>
		<select name="c_message">
			<option>Select</option>
			<option>Reject</option>
			<option>Confirm</option>
		</select>
	</div>
	<div class="form-group">
		<h3>Write Order Id for Confirm</h3>
		<input type="textarea" name="o_id" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
	</div>
	<div class="form-group">
		<h3>Land</h3>
		<input type="checkbox" name="c_land" value="land" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
	</div><br>
	<button name="submit" value="submit" class="btn btn-info">Send</button>
</form>

@endsection