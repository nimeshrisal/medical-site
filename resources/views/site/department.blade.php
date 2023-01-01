@extends('site.includes.contents')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Services</h3>
                        <p><a href="index.html">Home /</a> Services</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- service_area_start -->
    @include('site.includes.services')
    <!-- service_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Our Services</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $item)        
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{url('/storage/'.$item->image)}}" alt="" style="width: 400px; height: 200px">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">{{$item->name}}</a></h3>
                            <p>{!!Str::limit($item->description, 20)!!}</p>
                            <a href="{{route('service.detail',$item->id)}}" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- testmonial_area_start -->
    @include('site.includes.testimonials')

    <!-- testmonial_area_end -->

    <!-- business_expert_area_start  -->
    
    <!-- business_expert_area_end  -->


    <!-- expert_doctors_area_start -->

    @include('site.includes.doctors')
    <!-- expert_doctors_area_end -->

    <!-- Emergency_contact start -->
    @include('site.includes.emergencycontact')
   
    <!-- Emergency_contact end -->
    @endsection
