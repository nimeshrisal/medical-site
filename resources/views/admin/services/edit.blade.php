@extends('admin.includes.content')

@section('contents')

<div class="box-body">
    <form class="form-sample" action="{{route('services.update',$service->id)}}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="st-set">
            <div class="st-set-title">Edit Services
            </div>
            <div class="st-body">
                {{-- <div class="row"> --}}
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Title </label>
                            <input type="text" name="title" class="form-control" value="{{$service->title}}" placeholder="Enter Title"/>
                        </div>
                    </div>
                {{-- </div> --}}
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Description </label>
                            <input type="text" id="mytextarea" class="form-control" value="{{$service->description}}" name="description" placeholder="Enter description"/>
                        </div>
                    </div>
                    <div class="col-lg">
                        <h4 class="font-weight-bold">Feature Image</h4>
                        <input type="file" class="dropify" name="uploads" />
                        <img src="{{url('/storage/'.$service->image)}}" style="width: 200px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>

                    </div>
                </div>
            </div>
    </form>
</div>
<script src="https://cdn.tiny.cloud/1/kx3c2mohg71489rpmlce05yxoaezaw6e09krip8c19i49jgl/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
     tinymce.init({
        selector: '#mytextarea'
      });
</script>
@endsection
