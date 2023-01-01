@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Appointments

                {{-- <a href="{{route('appointments.create')}}" class="btn btn-success float-right" title="Add" style="margin: 2px;"><span
                    class="mdi mdi-cross icon-sm">Add</span></a> --}}
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Name</th>
                    <th>Number</th>
                    <th>Department</th>
                    <th style="">Doctor</th>
                    <th>Date</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($appointments as $app)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$app->name}}</td>
                <td>{{$app->phone_no}}</td>
                <td>{{$app->department}}</td>
                <td>{{$app->doctor_id}}</td>
                <td>{{$app->date}}</td>
                {{-- <td>{{$app->time}}</td>
                <td>
                    <div class="form-group">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection