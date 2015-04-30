<?php namespace App\Http\Controllers;

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

class OtherController extends Controller {


    public function ctraining()
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('/auth/login');
        }
        // elseif(Auth::id()->authority)
        elseif(Auth::user()->authority == 'employer')
        {
            $jobCat = Job_Category::all();
            return view('otherjob.createtr', compact('jobCat'));
        }
        else
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
    }
    public function storetraining(Requests\CreateTrainingRequest $request)
    {
        $input = Request::capture()->all();
        $input['Employer_id']=Auth::id();
        $input['updated_at']=Carbon::now();
        Training::create($input);
        \Session::flash('msg', 'You Have Successfully Added Training : '.$input['title']);
        // return $input;
        //return $input['Employer_id'];
        return redirect('job/training');
    }
    public function showtr($id)
    {
        $job=Training::find($id);
        $eid= $job->Employer_id;
        $emp=User::where('authority', 'employer')->find($eid);
        return view('job.viewt', compact('job', 'emp'));
    }
    public function edittr($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $trg = Training::findOrFail($id);
        if(Auth::id() != $trg['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $jobCat = Job_Category::all();

        //return $id;
        return view('otherjob.edittr',compact('jobCat', 'trg'));
    }
    public function updatetr($id, Requests\CreateTrainingRequest $request)
    {
        $trg=Training::findOrFail($id);
        $trg['title']=$request['title'];
        $trg['Job_cat']=$request['Job_cat'];
        $trg['address']=$request['address'];
        $trg['closing_date']=$request['closing_date'];
        $trg['created_at']=$request['created_at'];
        $trg['updated_at']=Carbon::now();

        $trg->save();
        \Session::flash('msg', 'You Have Successfully Updated Training : '.$trg->title);
        return redirect('job/training');
        //return $trg;
        //return 'hello';
    }
    public function deltr($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $trg = Training::findOrFail($id);
        if(Auth::id() != $trg['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if(Training::find($id)->delete())
        {
            \Session::flash('msg', 'You Have Successfully Deleted Training : '.$trg->title);
            return redirect('job/training');
        }

    }




    //*************** methods for walkins starts here
    public function cwalkins()
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('/auth/login');
        }
        // elseif(Auth::id()->authority)
        elseif(Auth::user()->authority == 'employer')
        {
            $jobCat = Job_Category::all();
            return view('walkins.createwalkin', compact('jobCat'));
        }
        else
        {
            return redirect('job');
        }
    }
    public function storewalkins(Requests\CreateTrainingRequest $request)
    {
        $input = Request::capture()->all();
        $input['Employer_id']=Auth::id();
        $input['updated_at']=Carbon::now();
        Walkins::create($input);
        \Session::flash('msg', 'You Have Successfully Created Walkin : '.$input['title']);
        // return $input;
        //return $input['Employer_id'];
        return redirect('job/walkins');
    }
    public function showwalk($id)
    {

        $job=Walkins::find($id);
        $eid= $job->Employer_id;
        $emp=User::where('authority', 'employer')->find($eid);
        return view('job.viewwalk', compact('job', 'emp'));
    }
    public function editwalk($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $walk = Walkins::findOrFail($id);
        if(Auth::id() != $walk['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $jobCat = Job_Category::all();

        //return $id;
        return view('walkins.editwalk',compact('jobCat', 'walk'));
    }
    public function updatewalk($id, Requests\CreateTrainingRequest $request)
    {
        $trg=Walkins::findOrFail($id);
        $trg['title']=$request['title'];
        $trg['Job_cat']=$request['Job_cat'];
        $trg['address']=$request['address'];
        $trg['closing_date']=$request['closing_date'];
        $trg['created_at']=$request['created_at'];
        $trg['updated_at']=Carbon::now();

        $trg->save();
        \Session::flash('msg', 'You Have Successfully Updated Walkin : '.$trg->title);
        return redirect('job/walkins');
        //return $trg;
        //return 'hello';
    }
    public function delwalk($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $trg = Walkins::findOrFail($id);
        if(Auth::id() != $trg['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if(Walkins::find($id)->delete())
        {
            \Session::flash('msg', 'You Have Successfully Deleted Walkin : '.$trg->title);
            return redirect('job/walkins');
        }

    }



    //*************** methods for Consultancies starts here
    public function ccons()
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('/auth/login');
        }
        // elseif(Auth::id()->authority)
        elseif(Auth::user()->authority == 'employer')
        {
            $jobCat = Job_Category::all();
            return view('walkins.ccons', compact('jobCat'));
        }
        else
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
    }
    public function storecons(Requests\CreateConsultancyaRequest $request)
    {
        $input = Request::capture()->all();
        $input['Employer_id']=Auth::id();
        $input['updated_at']=Carbon::now();
        Consultancies::create($input);
        \Session::flash('msg', 'You Have Successfully Created a Consultancy : '.$input['title']);
        // return $input;
        //return $input['Employer_id'];
        return redirect('job/consult');
    }
    public function showcons($id)
    {
        $job=Consultancies::find($id);
        $eid= $job->Employer_id;
        $emp=User::where('authority', 'employer')->find($eid);
        return view('job.viewc', compact('job', 'emp'));
    }
    public function editcons($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $cons = Consultancies::findOrFail($id);
        if(Auth::id() != $cons['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $jobCat = Job_Category::all();

        //return $id;
        return view('walkins.editcons',compact('jobCat', 'cons'));
    }
    public function updatecons($id, Requests\CreateConsultancyaRequest $request)
    {
        $trg=Consultancies::findOrFail($id);
        $trg['title']=$request['title'];
        $trg['Job_cat']=$request['Job_cat'];
        $trg['address']=$request['address'];
        $trg['created_at']=$request['created_at'];
        $trg['updated_at']=Carbon::now();

        $trg->save();
        \Session::flash('msg', 'You Have Successfully Updated Consultancy : '.$trg->title);
        return redirect('job/consult');
        //return $trg;
        //return 'hello';
    }
    public function delcons($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $trg = Consultancies::findOrFail($id);
        if(Auth::id() != $trg['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if(Consultancies::find($id)->delete())
        {
            return redirect('job/consult');
        }

    }


    //*************** methods for Preparation Material starts here
    public function cprepare()
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('/auth/login');
        }
        // elseif(Auth::id()->authority)
        elseif(Auth::user()->authority == 'employer')
        {
            $jobCat = Job_Category::all();
            return view('otherjob.cprepare', compact('jobCat'));
        }
        else
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
    }
    public function storeprepare(Requests\CreatePreparationRequest $request)
    {
        $input = Request::capture()->all();
        $input['Employer_id']=Auth::id();
        $input['updated_at']=Carbon::now();
        Preparation::create($input);
        \Session::flash('msg', 'You Have Successfully Added Preparation Material : '.$input['title']);
        // return $input;
        //return $input['Employer_id'];
        return redirect('job/preparation');
    }
    public function showprepare($id)
    {
        $job=Preparation::find($id);
        $eid= $job->Employer_id;
        $emp=User::where('authority', 'employer')->find($eid);
        return view('job.viewp', compact('job', 'emp'));
    }
    public function editprepare($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $cons = Preparation::findOrFail($id);
        if(Auth::id() != $cons['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $jobCat = Job_Category::all();

        //return $id;
        return view('otherjob.editprepar',compact('jobCat', 'cons'));
    }
    public function updateprepare($id, Requests\CreatePreparationRequest $request)
    {
        $trg=Preparation::findOrFail($id);
        $trg['title']=$request['title'];
        $trg['Job_cat']=$request['Job_cat'];
        $trg['link']=$request['address'];
        $trg['created_at']=$request['created_at'];
        $trg['updated_at']=Carbon::now();

        $trg->save();
        \Session::flash('msg', 'You Have Successfully Updated Preparation Material : '.$trg->title);
        return redirect('job/preparation');
        //return $trg;
        //return 'hello';
    }
    public function delprepare($id)
    {
        if(Auth::guest())
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        $trg = Preparation::findOrFail($id);
        if(Auth::id() != $trg['Employer_id'])
        {
            \Session::flash('msg', ' No Permission for that Request');
            return redirect('job');
        }
        if(Preparation::find($id)->delete())
        {
            \Session::flash('msg', 'You Have Successfully Deleted Preparation Material : '.$trg->title);
            return redirect('job/preparation');
        }

    }


}
