@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Testimonial

                <a href="{{route('testimonial.create')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-cross icon-sm">Add</span></a>
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Clients Name</th>
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
                @foreach($testimonials as $sd)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$sd->clients_name}}</td>
                <td><a href="{{asset('storage/'.$sd->image)}}" target="_blank"><i class="mdi mdi-export"></i></a></td>
                <td>
                    <a href="{{route('testimonial.edit', $sd->id)}}" title="Edit"><i
                        class="mdi mdi-pencil-box"></i></a>
                    <a href="{{route('testimonial.delete',$sd->id)}}" title="Delete"><i
                        class="mdi mdi-delete"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection