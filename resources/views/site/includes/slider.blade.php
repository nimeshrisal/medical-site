<div class="slider_area">
    <div class="slider_active owl-carousel">
        @foreach ($slider as $item)
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('storage/'.$item->image)}}" 
                alt="First slide" style=";height: 500px; width:inherit; margin:25px;">
                <div class="carousel-caption d-none d-md-block">
                    <div class="caption">
                        <h3>{{$item->title}}</h3>
                        <p>{!! Str::Limit($item->description,50)!!}</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>        
        @endforeach
    </div>
</div>
<style>
    .caption {
        background-color: currentColor;
        position: absolute;
        top : 0%;
        left: 3%;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        width: 900px;
        height: inherit;
        
    }
</style>