@extends('site.includes.contents')
@section('content')

<div class="bradcam_area breadcam_bg bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Service Detail</h3>
                    <p><a href="index.html">Home /</a>Servie Detail</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end  -->

 <!--================Blog Area =================-->
 <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg">
             <div class="single-post">
                <div class="feature-img" style="width: cover;">
                   <img class="img-fluid" src="{{url('/storage/'.$service->image)}}" alt="">
                </div>
                <div class="blog_details">
                   <h2>{{$service->title}}
                   </h2>
                   <p class="excert">
                    {!! $service->description !!}
                   </p>
                </div>
             </div>
             <div class="blog-author">
                <div class="media align-items-center">
                   <!-- <img src="img/blog/author.png" alt=""> -->
                   <div class="media-body">
                      <a href="{{route('department')}}">
                         <h4>See All Services</h4>
                      </a>
                      <p></p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection