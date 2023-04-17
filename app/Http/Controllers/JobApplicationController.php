<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Job;
use Illuminate\Http\Request;


class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;

        $jobApplications = JobApplication::where('user_id', $user->id)
            ->with('job','interview')
            ->get();

        return view('applications.index', compact('jobApplications'));

    }

    public function adminIndex(Request $request)
    {

        if($request->keyword)
        {
            $keyword = $request->keyword;

            $jobApplications = JobApplication::with('job', 'profile.user')
                                ->whereHas('profile.user', function ($query) use ($keyword) {
                                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                                })
                                ->paginate(4);
        }

    else {
        $jobApplications = JobApplication::paginate(4);
    }

        return view('applications.adminindex', compact('jobApplications'));

    }

    public function approved()
    {

        $jobApplications = JobApplication::with('job', 'profile.user')
                                 ->where('status', 'Offered')
                                 ->get();

        return view('applications.adminindex', compact('jobApplications'));

    }


    public function apply(Request $request, Job $job)
    {
        
        $user = auth()->user();
        if ($user->profile) {        
            $profile = auth()->user()->profile;   
            
            $applicant = JobApplication::where('user_id', $user->id)->where('job_id', $job->id)->first();
            
            if ($applicant)
            {
                //If user already applied for the job
             return redirect()->route('user.jobs.index');
            }

            else
            {
                    // Create a new job application
                $jobApplication = new JobApplication([
                    'user_id' => auth()->id(),
                    'job_id' => $job->id,
                ]);                
                
                // Save the job application to the database
                $jobApplication->save();
                return redirect()->route('jobs.applied');
            }
        }
        return redirect()->route('user.profile.create')->with([
            'alert-type'=>'alert-danger',
            'alert' => 'Please fill in your profile!'
        ]);
    }




    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
