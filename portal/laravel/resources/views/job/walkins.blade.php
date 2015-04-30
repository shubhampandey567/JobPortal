@extends('jobtmp')

@section('title')
    Walkins
@endsection
@section('training_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Walkins
            </h1>
        </div>

        @foreach($wlk as $trs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $trs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $trs->Job_cat }}</p>
                        <p>Address : {{ $trs->address }}</p>
                        <p>Closing date : {{ $trs->closing_date }}</p>
                        @if(Auth::guest())
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                            <a href="/job/wlk/{{ $trs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/wlk/del/{{ $trs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection