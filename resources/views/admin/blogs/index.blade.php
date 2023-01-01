@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Blog

                <a href="{{route('blogs.create')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-note icon-sm">Add Blog</span></a>
                <a href="{{route('categories.index')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-sort icon-sm">Add Category</span></a>
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Title</th>
                    <th>Category</th>
                    <th>Feature Image</th>
                    <th>Action</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($blogs as $blog)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->cat->name}}</td>
                <td><img src="{{url('/storage/'.$blog->image)}}" style="width: 200px; height:100px"></td>
                <td>
                    <a href="{{route('blogs.edit', $blog->id)}}" title="Edit"><i
                        class="mdi mdi-pencil-box"></i></a>
                    <a href="{{route('blogs.destroy',$blog->id)}}" title="Delete"><i
                        class="mdi mdi-delete"></i></a>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection