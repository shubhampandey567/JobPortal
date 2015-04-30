@extends('jobtmp')


@section('title')
    Preparation Material
@endsection
@section('general')
    <div class="container">
        <div class="row">
            {!!  Form::open(array('url' => '/job/strprepare', 'role' => 'form', 'method' => 'post'))  !!}
            <div class="col-lg-6">
                <h2>Preparation Material</h2>
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Title of Material : </label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Preparation Material title" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1">Material For : </label>
                    <select class="form-control" id="sel1" name="Job_cat">
                        @foreach($jobCat as $jcat)
                            <option value={{ $jcat->cat_name }}>{{ $jcat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="link">Link : (we do not store any file so you need to put the link form other service provider) </label>
                    <div class="input-group">
                        <input type="url" class="form-control" id="link" name="link" placeholder="Link form external service provider like google docs etc."  required>
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