@extends('site.includes.contents')
@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Doctors</h3>
                        <p><a href="{{route('/')}}">Home /</a> Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row">
                @foreach($doctors as $doctor)
                <div class="col-md-6 col-lg-3">
                    <div class="single_expert mb-40">
                        <div class="expert_thumb">
                            <img src="{{url('/storage/'.$doctor->image)}}" alt="">
                        </div>
                        <div class="experts_name text-center">
                            <h3>{{$doctor->name}}</h3>
                            <span>{{$doctor->service->title}}</span><br>
                            {{-- <span>{{$doctor->decription}}</span> --}}
                            <a href="{{route('doctor.detail',$doctor->id)}}" class="learn_more"> Learn More </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

    <!-- testmonial_area_start -->
    @include('site.includes.testimonials')

    <!-- testmonial_area_end -->

    <!-- business_expert_area_start  -->

    <!-- business_expert_area_end  -->

    <!-- Emergency_contact start -->
    @include('site.includes.emergencycontact')

    <!-- Emergency_contact end -->
@endsection
