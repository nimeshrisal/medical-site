@extends('admin.includes.content')
@section('contents')


<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Site Setting
        </h4>
    </div>  
    <div class="box-body">
        <form class="form-sample" method="POST" action="{{route('setting.save',$siteData->id)}}"
            enctype="multipart/form-data" id="appform">
            {{ csrf_field() }}
            <div class="st-set">
                <div class="st-set-title">Contact Details
                </div>
                <div class="st-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$siteData->address}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Phone No</label>
                                <input type="text" class="form-control" name="contact_no" value="{{$siteData->contact_no}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">E-mail Address<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" class="form-control" name="email" value="{{$siteData->email}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="st-set">
                <div class="st-set-title">About Us
                </div>
                <div class="st-body">
                    {{-- <div class="row"> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$siteData->title}}" />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="font-weight-bold">Description<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" class="form-control" id="mytextarea" name='description' value="{{$siteData->description}}" />
                            </div>
                        </div>
                       
                    {{-- </div> --}}
                </div>
            </div>
            <div class="st-set">
                <div class="st-body">
                    <div class="row">
                    </div>
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
</div>

<script src="https://cdn.tiny.cloud/1/kx3c2mohg71489rpmlce05yxoaezaw6e09krip8c19i49jgl/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
     tinymce.init({
        selector: '#mytextarea'
      });
</script>

@endsection
