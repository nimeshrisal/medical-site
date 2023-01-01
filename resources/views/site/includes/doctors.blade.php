<div class="expert_doctors_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="doctors_title mb-55">
                    <h3>Expert Doctors</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="expert_active owl-carousel">
                    @foreach($doctors as $doc)
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{url('/storage/'.$doc->image)}}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>{{$doc->name}}</h3>
                                <span>{{$doc->specialization}}</span><br>
                                <span>{{$doc->service->title}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>