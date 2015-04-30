@extends('jobtmp')


@section('title')
    My Job Portal
@endsection
@section('opening_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Latest Openings
            </h1>
        </div>
        @foreach($job as $jobs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $jobs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $jobs->Job_cat }}</p>
                        <p>Minimum Salary :  {{ $jobs->min_sal }}</p>
                        <p>Minimum Experience Required :  {{ $jobs->min_experience_required }} years</p>
                        <p>Closing date : {{ $jobs->closing_date }}</p>
                        @if(Auth::guest())
                            <a href="/job/{{ $jobs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/{{ $jobs->id }}" class="btn btn-default">view</a>
                            <a href="/job/apply/{{ $jobs->id }}" class="btn btn-default">apply</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/{{ $jobs->id }}" class="btn btn-default">view</a>
                            <a href="/job/{{ $jobs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/del/{{ $jobs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
