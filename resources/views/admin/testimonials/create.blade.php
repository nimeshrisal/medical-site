@extends('admin.includes.content')

@section('contents')

<div class="box-body">
    <form class="form-sample" action="{{route('testimonial.store')}}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="st-set">
            <div class="st-set-title">Add Testimonial
            </div>
            <div class="st-body">
                <div class="col-md">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold"> Testimonial </label>
                        <input type="text" id="mytextarea" class="form-control" name="description" placeholder="Enter description"/>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Client's Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Clients Name"/>
                        </div>
                    </div>                    
                {{-- </div> --}}
                {{-- <div class="row"> --}}
                    <div class="col-md">
                        <div class="form-group">
                            <h4 class="font-weight-bold">Image</h4>
                            <input type="file" class="dropify" name="uploads" />
                        </div>
                    </div>
                {{-- </div> --}}
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-danger btn-block" type="reset">Cancel</button>
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
