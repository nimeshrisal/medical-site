@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Doctors

                <a href="{{route('doctors.create')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-add icon-sm">Add</span></a>
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Name</th>
                    {{-- <th>Number</th> --}}
                    <th>Department</th>
                    <th style="">Specialization</th>
                    <th>Action</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($doctors as $doc)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$doc->name}}</td>
                <td>{{$doc->service->title}}</td>
                <td>{{$doc->specialization}}</td>
                <td>
                    <a href="{{route('doctors.edit', $doc->id)}}" title="Edit"><i
                        class="mdi mdi-pencil-box"></i></a>
                <a href="{{route('doctors.destroy',$doc->id)}}" title="Delete"><i
                        class="mdi mdi-delete"></i></a>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection