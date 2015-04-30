@extends('jobtmp')


@section('title')
    {{ $job->title }}
@endsection
@section('opening_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-check"></i>{{  $job->title }}
            </h1>
        </div>
        <div class="col-lg-12 panel-body panel panel-default">
            <p>Category :
                <strong> {{ $job->Job_cat }}</strong>
            </p>
            <p>Minimum Salary :
                <strong> {{ $job->min_sal }}</strong>
            </p>
            <p>Minimum Experience Required :
                <strong> {{ $job->min_experience_required }}</strong> years
            </p>
            <p>Employer Name :
                <strong> {{ $emp->name }}</strong>
            </p>
            <p>Location :
                <strong> {{ $emp->location }}</strong>
            </p>
            <p>Contact :
                <strong> {{ $emp->contact }}</strong>
            </p>
            <p>Email :
                <strong> {{ $emp->email }}</strong>
            </p>
            <p>Closing date :
                <strong> {{ $job->closing_date }}</strong>
            </p>
            @if(Auth::guest())
                <a href="/auth/login" class="btn btn-default">login to apply</a>
            @elseif(Auth::user()->authority == 'user')
                <a href="/job/apply/{{ $job->id }}" class="btn btn-default">apply</a>
            @elseif(Auth::user()->authority == 'employer')
                <a href="/job/{{ $job->id }}/edit" class="btn btn-default">edit</a>
            @endif
        </div>
    </div>
@endsection
