@extends('jobtmp')


@section('title')
    Create a New Consultancy
@endsection
@section('general')
    <div class="container">
        <div class="row">
            {!!  Form::open(array('url' => '/job/strcons', 'role' => 'form', 'method' => 'post'))  !!}
            <div class="col-lg-6">
                <h2>Create a New Job</h2>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Title of Consultancy : </label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Consultancy title" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1">Consultancy For : </label>
                    <select class="form-control" id="sel1" name="Job_cat">
                        @foreach($jobCat as $jcat)
                            <option value={{ $jcat->cat_name }}>{{ $jcat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="add">Address of Consultancy : </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="add" name="address" placeholder="Address of Consultancy"  required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pdate">Publishing Date : </label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="pdate" name="created_at" placeholder="Publishing Date" required>
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