@extends('jobtmp')


@section('title')
    {{ $usr->name }}
@endsection
@section('opening_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ $usr->name }}
            </h1>
        </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Location : {{ $usr->location }}</h4>
                        <h4>Qualification : {{ $usr->qualification }}</h4>
                        <h4>university : {{ $usr->university }}</h4>
                        <h4>Marks : {{ $usr->marks }}</h4>
                        <h4>Skills : {{ $usr->skill }}</h4>
                        <h4>Email : {{ $usr->email }}</h4>
                        <h4>Contact : {{ $usr->contact }}</h4>
                        @if(Auth::user()->authority == 'user')
                            <a href="/job/usr/{{ $usr->id }}/edit" class= "btn btn-default" > Edit Your Profile </a>
                        @endif
                    </div>
                </div>
            </div>
    </div>
@endsection
