@extends('jobtmp')


@section('title')
    Requests
@endsection
@section('opening_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Requests :
            </h1>
        </div>
        @foreach($var as $vr)
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3> ID : {{ $vr->id }}</h3>
                        <p>User ID :   <a href="/job/user/{{ $vr->user_id }}" class="btn btn-default">{{ $vr->user_id }}</a>    <i>click user id to view user's profile</i></p>
                        <p>Job ID :   <a href="/job/{{ $vr->job_id }}" class="btn btn-default">{{ $vr->job_id }}</a>    <i>click Job id to view Job</i></p>
                        <p>Time When Applied :  {{ $vr->time_when_applied }} </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
