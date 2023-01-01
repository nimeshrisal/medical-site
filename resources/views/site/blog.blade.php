@extends('site.includes.contents')
@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>blog</h3>
                        <p><a href="index.html">Home /</a> blog</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">        
                            <img class="card-img rounded-0" src="{{url('/storage/'.$blog->image)}}" alt="" style="width: 300px; height: 200px">
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('blog.detail',$blog->id)}}">
                                    <h2>{{$blog->title}}</h2>
                                </a>
                                <p>{!! Str::limit($blog->description,40)!!}</p>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="list cat-list">
                                @foreach($category as $cat)
                                <li>
                                    <a class="d-flex">
                                        <p>{{$cat->name}}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
                
            {{-- </div> --}}
        </div>
    </section>
    <!--================Blog Area =================-->

<!-- footer start -->
@endsection
