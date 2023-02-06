<div class="testmonial_area">
     <div class="testmonial_active owl-carousel">
        @foreach ($testimonials as $item)
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('storage/'.$item->image)}}" 
                alt="First slide" style=";height: 500px; width:inherit; margin:25px;">
                <div class="carousel-caption d-none d-md-block">
                    <div class="caption-testimonial">
                        <p class="">{!! Str::Limit($item->testimonial,200)!!}</p>
                        <h3 class="">{{$item->clients_name}}</h3>
                    </div>
                  </div>
              </div>
            </div>
          </div>        
        @endforeach
    </div> 
</div>
<style>
    .caption-testimonial {
        background-color: currentColor;
        opacity: 0.7;
        position: unset;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        width: 900px;
        height: inherit;
    }
    h3,p {
        color: black;
    }
</style>