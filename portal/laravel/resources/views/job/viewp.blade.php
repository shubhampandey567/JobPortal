@extends('jobtmp')


@section('title')
    {{ $job->title }}
@endsection
@section('opening_panel')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-check"></i>{{  $job->title }}
            </h1>
        </div>
        <div class="col-lg-12">
            <p>Category :
                <strong> {{ $job->Job_cat }}</strong>
            </p>
            <p>Link of Material :
                <strong><a href="{{ $job->link }}"> {{ $job->link }} </a></strong>
            </p>
            <p>Employer Name :
                <strong> {{ $emp->name }}</strong>
            </p>
            <p>Contact :
                <strong> {{ $emp->contact }}</strong>
            </p>
            <p>Email :
                <strong> {{ $emp->email }}</strong>
            </p>
        </div>
    </div>
@endsection
