
<!DOCTYPE html>
<html>
<head>
	<title>Review</title>
	<style type="text/css">
	.form-group input[type="checkbox"] {
		display: none;
	}

	.form-group input[type="checkbox"] + .btn-group > label span {
		width: 20px;
	}

	.form-group input[type="checkbox"] + .btn-group > label span:first-child {
		display: none;
	}
	.form-group input[type="checkbox"] + .btn-group > label span:last-child {
		display: inline-block;   
	}

	.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
		display: inline-block;
	}
	.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
		display: none;   
	}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="[ col-xs-12 col-sm-6 ]">
			
			<h3><a href="{{'/dashboard'}}">Back to admin panel</a></h3><hr>
			<h3>Select Reivew Area</h3><hr />
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
			<form method="post" action="{{'/review-govt-office'}}">
				{{ csrf_field() }}

				<div class="[ form-group ]">
					<input type="checkbox" name="soil" value="soil" id="fancy-checkbox-default" autocomplete="off" />
					<div class="[ btn-group ]">
						<label for="fancy-checkbox-default" class="[ btn btn-default ]">
							<span class="[ glyphicon glyphicon-ok ]"></span>
							<span> </span>
						</label>
						<label for="fancy-checkbox-default" class="[ btn btn-default active ]">
							Soil Office
						</label>
					</div>
				</div>
				<div class="[ form-group ]">
					<input type="checkbox" value="gass" name="gass" id="fancy-checkbox-primary" autocomplete="off" />
					<div class="[ btn-group ]">
						<label for="fancy-checkbox-primary" class="[ btn btn-primary ]">
							<span class="[ glyphicon glyphicon-ok ]"></span>
							<span> </span>
						</label>
						<label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
							Gass Office
						</label>
					</div>
				</div>
				<div class="[ form-group ]">
					<input type="checkbox" value="land" name="land" id="fancy-checkbox-success" autocomplete="off" />
					<div class="[ btn-group ]">
						<label for="fancy-checkbox-success" class="[ btn btn-success ]">
							<span class="[ glyphicon glyphicon-ok ]"></span>
							<span> </span>
						</label>
						<label for="fancy-checkbox-success" class="[ btn btn-default active ]">
							Land Office
						</label>
					</div>
				</div>
				<div class="[ form-group ]">
					<input type="checkbox" value="water" name="water" id="fancy-checkbox-info" autocomplete="off" />
					<div class="[ btn-group ]">
						<label for="fancy-checkbox-info" class="[ btn btn-info ]">
							<span class="[ glyphicon glyphicon-ok ]"></span>
							<span> </span>
						</label>
						<label for="fancy-checkbox-info" class="[ btn btn-default active ]">
							Water Office
						</label>
					</div>
				</div>
				<div class="[ form-group ]">
					<input type="checkbox" value="tax" name="tax" id="fancy-checkbox-warning" autocomplete="off" />
					<div class="[ btn-group ]">
						<label for="fancy-checkbox-warning" class="[ btn btn-warning ]">
							<span class="[ glyphicon glyphicon-ok ]"></span>
							<span> </span>
						</label>
						<label for="fancy-checkbox-warning" class="[ btn btn-default active ]">
							Tax Office
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-group mx-sm-3 mb-2">
						<h3>Type Order Id here......</h3>
						<input type="text" name="o_id" class="form-control" id="inputPassword2" placeholder="Type Order Id">
					</div>
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>