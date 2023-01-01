@extends('admin.includes.content')

@section('contents')
<div class="box-body">
    <form class="form-sample" action="{{route('categories.store')}}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="st-set">
            <div class="st-set-title">Add Category
            </div>
            <div class="st-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="box">    
    <div class="box-header with-border">
        <h4 class="box-title">Category
            <a href="{{route('blogs.index')}}" class="btn btn-warning float-right" title="Add" style="margin: 2px;"><span
                class="mdi mdi-chevron-double-left icon-sm"></span></a>
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Name</th>
                    {{-- <th>Category</th>
                    <th>Feature Image</th> --}}
                    <th>Action</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($categories as $cat)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$cat->name}}</td>
                {{-- <td>{{$blog->category}}</td> --}}
                {{-- <td><img src="{{url('/storage/'.$blog->image)}}" style="width: 200px; height:100px"></td> --}}
                <td>
                    <a href="{{route('categories.destroy',$cat->id)}}" title="Delete"><i
                        class="mdi mdi-delete"></i></a>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection