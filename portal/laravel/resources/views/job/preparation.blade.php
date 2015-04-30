@extends('jobtmp')

@section('title')
    Preparation Material
@endsection
@section('opening_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Preparation Material
            </h1>
        </div>
        @foreach($pre as $jobs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $jobs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $jobs->Job_cat }}</p>
                        <p>Link of Material : <a href="{{ $jobs->link }}"> {{ $jobs->link }} </a></p>
                        @if(Auth::guest())
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                            <a href="/job/prepare/{{ $jobs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/prepare/del/{{ $jobs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
