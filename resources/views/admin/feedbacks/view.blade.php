@extends('admin.includes.content')

@section('contents')
<div class="box-body">
    <div class="st-set">
        <div class="st-set-title">
            Feedback from {{$feedback->name}}
        </div>
        <div class="st-body">
            <section class="blog_area single-post-area section-padding">
                <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <div class="single-post">
                            <div class="feature-img" style="width: cover;">
                                <h5>Subject:
                                    {{$feedback->subject}}
                                </h5>
                            </div>
                            <div class="blog_details">
                            <p class="excert">
                                {!! $feedback->feedback !!}
                            </p>
                            </div>
                        </div>
                        <div class="blog-author">
                            <div class="media align-items-center">
                            <h6>Mailed By:{{$feedback->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </div>    
    </div>
</div>

    

@endsection
