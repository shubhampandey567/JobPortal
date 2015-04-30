
@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update {{ $usr->name }}</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            {!!  Form::model($usr,['class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'action' => ['JobsController@updateusr', $usr->id]  ])  !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="authority" value="user">

                            <div class="form-group">
                                <i> Email ID can't be updated once Registered</i><hr/>
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'name', null, ['class'=>'form-control', 'required']) !!}
                                    <!-- <input type="text" class="form-control" name="name" value="{{ old('name') }}">-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Contact No.</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'contact', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="text" class="form-control" name="contact" value="{{ old('contact') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Location</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'location', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="text" class="form-control" name="location" value="{{ old('location') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Qualification</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'qualification', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="text" class="form-control" name="qualification" value="{{ old('qualification') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">University</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'university', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="text" class="form-control" name="university" value="{{ old('university') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Marks</label>
                                <div class="col-md-6">
                                    {!! Form::input('number', 'marks', null, ['class'=>'form-control', 'min'=>'0', 'max'=>'100']) !!}
                                    <!-- <input type="number"  min="0" max="100"  class="form-control" name="marks" value="{{ old('marks') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Skill</label>
                                <div class="col-md-6">
                                    {!! Form::input('text', 'skill', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="text" class="form-control" name="skill" value="{{ old('skill') }}"> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Logo/Image Path</label>
                                <div class="col-md-6">
                                    {!! Form::input('url', 'logo', null, ['class'=>'form-control']) !!}
                                    <!-- <input type="url" class="form-control" name="logo" value="{{ old('logo') }}"> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                            {!! Form::close(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
