@include('admin.includes.sidebar')
				<div class="main-panel">
				    <div class="content-wrapper alert_message">
					@if (Session::has('success'))
					    <div class="alert alert-success alert-dismissible" role="alert">
					        {{ Session::get('success') }}
					        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
					    </div>
					@endif
					@if (Session::has('error'))
					    <div class="alert alert-danger alert-dismissible" role="alert">
					        {{ Session::get('error') }}
					        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
					    </div>
					@endif
						<!-- <div class="row"> -->


						@yield('contents')


						<!-- </div> -->
				    </div>
				    <!-- content-wrapper ends -->

@include('admin.includes.footer')



