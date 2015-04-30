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
        <div class="col-lg-12">
            <p>Category :
                <strong> {{ $job->Job_cat }}</strong>
            </p>
            <p>Address :
                <strong> {{ $job->address }}</strong>
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
            <p>Last date :
                <strong> {{ $job->closing_date }}</strong>
            </p>
        </div>
    </div>
@endsection
