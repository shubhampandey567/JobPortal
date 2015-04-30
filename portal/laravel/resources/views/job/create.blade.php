@extends('jobtmp')


@section('title')
    Create a New Job
@endsection
@section('general')
    <div class="container">
        <div class="row">
            {!!  Form::open(array('url' => '/job', 'role' => 'form', 'method' => 'post'))  !!}
                <div class="col-lg-6">
                    <h2>Create a New Job</h2>
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                    <div class="form-group">
                        <label for="InputName">Job Title : </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Job title" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Job Category list : </label>
                        <select class="form-control" id="sel1" name="Job_cat">
                            @foreach($jobCat as $jcat)
                                <option value={{ $jcat->cat_name }}>{{ $jcat->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="MinSal">Minimum Salary : </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="minSal" name="min_sal" placeholder="Minimum Salary" min="1000" max="9999999999" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MinExp">Minimum Experience : </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="minExp" name="min_experience_required" placeholder="Minimum Experience" min="0" max="50" required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="closedate">Closing Date : </label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="closedate" name="closing_date" placeholder="Closing Date" required>
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