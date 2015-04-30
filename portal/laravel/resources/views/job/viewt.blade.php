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
            <p>Training Category :
                <strong> {{ $job->Job_cat }}</strong>
            </p>
            <p>Address of our Center :
                <strong> {{ $job->address }}</strong>
            </p>
            <p>Employer Name :
                <strong> {{ $emp->name }}</strong>
            </p>
            <p>Contact :
                <strong> {{ $emp->contact }}</strong>
            </p>
            <p>Last Date of Registration :
                <strong> {{ $job->closing_date }}</strong>
            </p>
            <p>Email :
                <strong> {{ $emp->email }}</strong>
            </p>
        </div>
    </div>
@endsection
