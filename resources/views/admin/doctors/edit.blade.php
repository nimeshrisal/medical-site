@extends('admin.includes.content')

@section('contents')

<div class="box-body">
    <form class="form-sample" action="{{route('doctors.update',$doctor->id)}}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="st-set">
            <div class="st-set-title">Edit Doctor
            </div>
            <div class="st-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Name </label>
                            <input type="text" name="name" value="{{$doctor->name}}" class="form-control" placeholder="Enter Name"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Department </label>
                            <select name="department" class="form-control">
                                <option value=""> None </option>
                                @foreach($services as $dept)
                                <option value="{{$dept->id}}" @if($dept->id == $doctor->department) selected @endif>{{$dept->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Specialization </label>
                            <input type="text" name="specialization" class="form-control" placeholder="Enter Specialization" value="{{$doctor->specialization}}"/>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Image</h4>
                        <input type="file" class="dropify" name="uploads" />
                        <img src="{{url('/storage/'.$doctor->image)}}" style="width: 80px;">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name" class="font-weight-bold"> Description </label>
                        <input type="text" id="mytextarea" class="form-control" name="description" placeholder="Enter description" value="{{$doctor->description}}"/>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>

                    </div>
                    {{-- <div class="col-lg-2">
                        <button class="btn btn-danger btn-block" type="reset">Cancel</button>
                    </div> --}}
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
