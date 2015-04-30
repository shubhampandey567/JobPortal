@extends('jobtmp')


@section('title')
My Job Portal
@endsection

@section('slider')

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <hr>
@endsection


<!-- end of slider -->



@section('search_panel')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><ul class="nav nav-tabs"><li role="presentation" class="active"><a href="#">All Jobs</a></li>
                        <li role="presentation"><a href="#">Government Jobs</a></li> <li role="presentation"><a href="#">International Jobs</a></li></ul>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="col-md-2">
                            1
                        </div>
                        <div class="col-md-2">2
                        </div>
                        <div class="col-md-2">3
                        </div>
                        <div class="col-md-2">4
                        </div>
                        <div class="col-md-2">5
                        </div>
                        <div class="col-md-2">6
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        <div class="col-md-12">
            <a href="{{ asset('/job/openings') }}">view all</a>
            <hr/><br/>
        </div>
    </div>
@endsection

@section('walkins_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Walkins
            </h1>
        </div>
        @foreach($wlk as $trs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $trs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $trs->Job_cat }}</p>
                        <p>Address : {{ $trs->address }}</p>
                        <p>Closing date : {{ $trs->closing_date }}</p>
                        @if(Auth::guest())
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/wlk/{{ $trs->id }}" class="btn btn-default">view</a>
                            <a href="/job/wlk/{{ $trs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/wlk/del/{{ $trs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            <a href="{{ asset('/job/walkins') }}">view all</a>
            <hr/><br/>
        </div>
    </div>

@endsection

@section('training_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Training Institutes
            </h1>
        </div>@foreach($trg as $trs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $trs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $trs->Job_cat }}</p>
                        <p>Address : {{ $trs->address }}</p>
                        <p>Closing date : {{ $trs->closing_date }}</p>
                        @if(Auth::guest())
                            <a href="trg/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="trg/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="trg/{{ $trs->id }}" class="btn btn-default">view</a>
                            <a href="trg/{{ $trs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="trg/del/{{ $trs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            <a href="{{ asset('/job/training') }}">view all</a>
            <hr/><br/>
        </div>
    </div>

@endsection

@section('consultancies_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                consultancies
            </h1>
        </div>
        @foreach($cons as $trs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $trs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $trs->Job_cat }}</p>
                        <p>Address : {{ $trs->address }}</p>
                        @if(Auth::guest())
                            <a href="/job/cons/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/cons/{{ $trs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/cons/{{ $trs->id }}" class="btn btn-default">view</a>
                            <a href="/job/cons/{{ $trs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/cons/del/{{ $trs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            <a href="{{ asset('/job/consult') }}">view all</a>
            <hr/><br/>
        </div>
    </div>

@endsection

@section('preparation_panel')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                preparation
            </h1>
        </div>
        @foreach($pre as $jobs)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>{{ $jobs->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>Category : {{ $jobs->Job_cat }}</p>
                        <p>Link of Material : <a href="{{ $jobs->link }}"> {{ $jobs->link }} </a></p>
                        @if(Auth::guest())
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'user')
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                        @elseif(Auth::user()->authority == 'employer')
                            <a href="/job/prepare/{{ $jobs->id }}" class="btn btn-default">view</a>
                            <a href="/job/prepare/{{ $jobs->id }}/edit" class="btn btn-default">edit</a>
                            <a href="/job/prepare/del/{{ $jobs->id }}" class="btn btn-default">delete</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12">
            <a href="{{ asset('/job/preparation') }}">view all</a>
            <hr/><br/>
        </div>
    </div>

@endsection