<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Storage;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
        $user = auth()->user();
        if ($user->profile) {
            return redirect()->route('user.profile.edit');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store in database 
        $profile = $request->user()->profile()->create($request->all());
        $name = $request->user()->name;

        
        if($request->hasFile('resume')){

            $filename= $name.'-'.date('Y-m-d').'-'.$request->resume->getClientOriginalExtension();
            Storage::disk('public')->put('attachments/'.$filename, File::get($request->resume));

            $profile->resume = $filename;
            $profile->save();

        }

        return redirect()->route('user.profile.create');
    }

    /**
     * Display the specified resource.
     */
    public function showApplicant($user_id, $jobApplicationId)
    {
        $user = User::findOrFail($user_id);
        $profile = $user->profile;
        $jobApplication = JobApplication::with('job')->find($jobApplicationId);

        return view('profile.show', [
            'profile' => $profile,
            'jobApplication' => $jobApplication
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $user = auth()->user();
        $user->profile->update([
            'ic' => $request->input('ic'),
            'phone' => $request->input('phone'),
            'user_address' => $request->input('user_address'),
            'nationality' => $request->input('nationality'),
            'age' => $request->input('age'),
            'dob' => $request->input('dob'),
            'expected_allowance' => $request->input('expected_allowance'),
        ]);

        return redirect()->route('user.profile.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
