@extends('jobtmp')


@section('title')
    edit : {{ $job->title }}
@endsection
@section('general')
    <div class="container">
        <div class="row">
            {!!  Form::model($job,['role' => 'form', 'method' => 'PATCH', 'action' => ['JobsController@update', $job->id]  ])  !!}
            <div class="col-lg-6">
                <h2>Edit : {{ $job->title }}</h2>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="title">Job Title : </label>
                    <div class="input-group">
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                       <!-- <input type="text" class="form-control" name="title" id="title" placeholder="Job title" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Job_cat">Job Category list : </label>
                    <select class="form-control" id="sel1" name="Job_cat">
                        @foreach($jobCat as $jcat)
                            <option value={{ $jcat->cat_name }}>{{ $jcat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="min_sal">Minimum Salary : </label>
                    <div class="input-group">
                        {!! Form::input('number', 'min_sal', null, ['class'=>'form-control']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="min_experience_required">Minimum Experience : </label>
                    <div class="input-group">
                        {!! Form::input('number', 'min_experience_required', null, ['class'=>'form-control']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="closing_date">Closing Date : </label>
                    <div class="input-group">
                        {!! Form::input('date', 'closing_date', null, ['class'=>'form-control']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="created_at">Publishing Date : </label>
                    <div class="input-group">
                        {!! Form::input('date', 'created_at', null, ['class'=>'form-control']) !!}
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>



                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
            {!! Form::close(); !!}
            <!-- <div class="col-lg-5 col-md-push-1">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                    </div>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    @if($errors->any())
        @foreach($errors -> all() as $err)
            <li class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>{{ $err }}</li>
        @endforeach
    @endif
@endsection