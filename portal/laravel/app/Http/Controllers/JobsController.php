<?php namespace App\Http\Controllers;

use App\ApplyJob;
use App\Consultancies;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Job;
use App\Employer;
use App\Job_Category;
use App\Preparation;
use App\Training;
use App\User;
use App\Walkins;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {

        $job = Job::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->paginate(4);
        $wlk = Walkins::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->paginate(4);
        $trg = Training::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->paginate(4);
        $pre = Preparation::latest('created_at')->where('created_at', '<=', Carbon::now())->paginate(4);
        $cons = Consultancies::latest('created_at')->where('created_at', '<=', Carbon::now())->paginate(4);
        return view('job.index', compact('job', 'wlk', 'trg', 'pre', 'cons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('/auth/login');
        } // elseif(Auth::id()->authority)
        elseif (Auth::user()->authority == 'employer') {
            $jobCat = Job_Category::all();
            return view('job.create', compact('jobCat'));
        } else {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CreateJobRequest $request)
    {
        $input = Request::capture()->all();

        $input['Employer_id'] = Auth::id();
        $input['updated_at'] = Carbon::now();
        Job::create($input);
        \Session::flash('msg', 'You Have Successfully Added Job' . $input['title']);
        // return $input;
        //return $input['Employer_id'];
        return redirect('job/openings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $eid = $job->Employer_id;
        $emp = User::where('authority', 'employer')->find($eid);
        return view('job.view', compact('job', 'emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $job = Job::findOrFail($id);
        if (Auth::id() != $job['Employer_id']) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $jobCat = Job_Category::all();

        //return $job;
        return view('job.edit', compact('jobCat', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Requests\CreateJobRequest $request)
    {
        $job = Job::findOrFail($id);
        $job['title'] = $request['title'];
        $job['Job_cat'] = $request['Job_cat'];
        $job['min_sal'] = $request['min_sal'];
        $job['min_experience_required'] = $request['min_experience_required'];
        $job['closing_date'] = $request['closing_date'];
        $job['created_at'] = $request['created_at'];
        $job['updated_at'] = Carbon::now();

        $job->save();
        \Session::flash('msg', 'You Have Successfully Updated Job : ' . $job->title);
        return redirect('job/openings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function openings()
    {
        $job = Job::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->get();
        return view('job.opening', compact('job'));
    }

    public function walkins()
    {
        $wlk = Walkins::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->get();
        return view('job.walkins', compact('wlk'));
    }

    public function training()
    {
        $trg = Training::latest('created_at')->where('created_at', '<=', Carbon::now())->where('created_at', '<=', 'closing_date')->get();
        return view('job.training', compact('trg'));
    }

    public function preparation()
    {
        $pre = Preparation::latest('created_at')->where('created_at', '<=', Carbon::now())->get();
        return view('job.preparation', compact('pre'));
    }

    public function consultancies()
    {
        $trg = Consultancies::latest('created_at')->where('created_at', '<=', Carbon::now())->get();
        return view('job.consult', compact('trg'));
    }

    public function deljob($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $job = Job::findOrFail($id);
        if (Auth::id() != $job['Employer_id']) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if (Job::find($id)->delete())
            \Session::flash('msg', 'You Have Successfully Deleted Job : ' . $job->title);
        return redirect('job/openings');
    }

    public function apply($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $job = Job::findOrFail($id);
        //$usr = User::findOrFail(Auth::id());
        if (Auth::user()->authority == 'user') {
            $var = new ApplyJob();
            $var['job_id'] = $job['id'];
            $var['employer_id'] = $job['Employer_id'];
            $var['user_id'] = Auth::id();
            $var['time_when_applied'] = Carbon::now();
            $var->save();
            \Session::flash('msg', 'You Have Successfully Applied for This Job : ' . $job->title);
            return redirect('job');
        } else
            \Session::flash('msg', ' No Permission for that Request');
        return redirect('job');
    }

    public function applye($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $usr = User::findOrFail($id);
        //$usr = User::findOrFail(Auth::id());
        if (Auth::user()->authority == 'employer' && Auth::id() == $usr->id) {
            $var = ApplyJob::where('employer_id', '=', Auth::id())->select('id', 'user_id', 'job_id', 'time_when_applied')->get();

            return view('job.viewreq', compact('var'));
        } else
            \Session::flash('msg', ' No Permission for that Request');
        return redirect('job');

    }

    public function applyu($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $usr = User::findOrFail($id);
        //$usr = User::findOrFail(Auth::id());
        if (Auth::user()->authority == 'user' && Auth::id() == $usr->id) {
            $var = ApplyJob::where('user_id', '=', Auth::id())->select('id', 'user_id', 'job_id', 'time_when_applied')->get();

            return view('job.viewreq', compact('var'));
        } else
            \Session::flash('msg', ' No Permission for that Request');
        return redirect('job');

    }

    public function uprofile($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $usr = User::where('authority', '=', 'user')->findOrFail($id);
        if (Auth::id() != $usr->id || Auth::user()->authority == 'employer') {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        //$usr = User::findOrFail(Auth::id());
        if (Auth::user()->authority == 'employer' || Auth::id() == $usr->id) {
            if (Auth::user()->authority == 'employer') {
                \Session::flash('msg', 'Hi ' . Auth::user()->name . ' you are visiting ' . $usr->name);
            } else
                \Session::flash('msg', 'Hi ' . Auth::user()->name);

            return view('job.uprofile', compact('usr'));
        } else
            \Session::flash('msg', ' No Permission for that Request');
        return redirect('job');

    }

    public function editprof($id)
    {
        if (Auth::guest()) {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $usr = User::findOrFail($id);
        if (Auth::user()->authority == 'employer') {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if(Auth::user()->authority == 'user' && Auth::id() == $usr->id)
        return view('auth.editprof', compact('usr'));
    }

    public function updateusr($id, Requests\UpdateUserRequest $request)
    {
        $usr = User::findOrFail($id);
        if($usr->authority == $request['authority'])
        {
            $usr['name'] = $request['name'];
            $usr['contact'] = $request['contact'];
            $usr['location'] = $request['location'];
            $usr['qualification'] = $request['qualification'];
            $usr['university'] = $request['university'];
            $usr['marks'] = $request['marks'];
            $usr['skill'] = $request['skill'];;
            $usr['logo'] = $request['logo'];
            $usr['email'] = $usr->email;
            $usr['password'] = bcrypt($request['password']);
            $usr['updated_at'] = Carbon::now();

            $usr->save();
            \Session::flash('msg', 'You Have Successfully Updated  : ' . $usr->name);
            return redirect('job/user/'.$usr->id);
        }
    }
}


