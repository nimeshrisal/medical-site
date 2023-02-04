@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Slider

                <a href="{{route('slider.create')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-cross icon-sm">Add</span></a>
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Title</th>
                    <th>Open Image</th>
                    <th>Action</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($slider_data as $sd)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$sd->title}}</td>
                <td><a href="{{asset('storage/'.$sd->image)}}" target="_blank"><i class="mdi mdi-export"></i></a></td>
                <td>
                    <a href="{{route('slider.edit', $sd->id)}}" title="Edit"><i
                        class="mdi mdi-pencil-box"></i></a>
                    <a href="{{route('slider.delete',$sd->id)}}" title="Delete"><i
                        class="mdi mdi-delete"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection