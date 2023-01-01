@extends('admin.includes.content')

@section('contents')
<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Feedback
             
        </h4>
    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th style="width: 15%;">Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    {{-- <th>Time</th>
                    <th class="">Approve</th> --}}
                </tr>
            </thead>
            <tbody>
                @php 
                $count = 0; 
                @endphp
                @foreach($feedbacks as $feedback)
                @php
                $count = $count+1    
                @endphp
                <tr>
                <td>{{$count}}</td>
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->email}}</td>
                    <td> <a href="{{route('feedback.show',$feedback->id)}}" title="Show"><i
                        class="mdi mdi-eye"></i></a>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection