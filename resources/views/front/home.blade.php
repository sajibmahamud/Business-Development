@extends('profile_layout')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Home</h2>
					<div class="page_link">
						<a href="{{URL::to('/')}}">Home</a>
						<a href="{{URL::to('/all-advise')}}">Home</a>
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
		</div>

		<div class="row">
			<div class="col-md-1">

			</div>
			<div class="col-md-10">
				<p style="text-align: justify;">
					Business development service is an online service provider platform for investor, entrepreneur and service provider organization. Entrepreneur from around the world who wants to invest in business, start a business in our country need to complete a lots of process and procedure. These processes take long time to complete because he needs to take permission from government offices like Land, Gas, and power supply authority. The aim of this project is to reduce the complexity and time of the existing hard copy documents. 
				</p> 

				<p style="text-align: justify;">
					In your system, an entrepreneur can apply for government permission in different area like Land permission, gas connection, and power connection. Our system will take care rest of the procedure. This system will send the documents to the government an office for permission and they verify the application with the necessary documents and give a response either it is acceptable or need to modify the documents. After greeting all the response system will send the response to the applicant entrepreneur.
				</p> 
			</div>
			<div class="col-md-1">

			</div>
		</div>
	</div>
</section>



@endsection    