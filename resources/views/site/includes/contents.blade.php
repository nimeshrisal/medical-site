@include('site.includes.header')
<div class="content-wrapper alert_message">
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('status') }}
            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ Session::get('error') }}
            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
        </div>
    @endif
@yield('content')

@include('site.includes.footer')