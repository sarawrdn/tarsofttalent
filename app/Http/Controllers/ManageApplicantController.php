<?php

namespace App\Http\Controllers;
use App\Models\JobApplication;
use App\Models\Interview;
use Dompdf\Dompdf;
use App\Models\OfferLetter;
use Storage;

use Illuminate\Http\Request;

class ManageApplicantController extends Controller
{
    public function reject ($jobApplicationId)
    {
        $jobApplication = JobApplication::findOrFail($jobApplicationId);
        $jobApplication->status = 'Rejected';
        $jobApplication->save();

        return redirect()->route('admin.jobs.applications');
    }

    public function manageInterview ($jobApplicationId)
    {
        return view('interview.create',['jobApplicationId' => $jobApplicationId]);
    }

    public function storeInterview (Request $request, $jobApplicationId)
    {
        $jobApplication = JobApplication::findOrFail($jobApplicationId);

        $interview = new Interview;
        $interview->job_application_id = $jobApplicationId;
        $interview->interview_date = $request->interview_date;
        $interview->link = $request->link;
        $interview->save();

        $jobApplication->status = 'Viewed';
        $jobApplication->save();

        return redirect()->route('admin.jobs.applications');
    }

    public function generateOfferLetter($jobApplicationId)
    {
        $jobApplication = JobApplication::findOrFail($jobApplicationId);

        if($jobApplication->offerLetter)
        {
            return redirect()->back();
        }
        // Generate the offer letter credentials
        $name = $jobApplication->profile->user->name;
        $position = $jobApplication->job->name;
        $salary = $jobApplication->profile->expected_allowance;
        
        // Generate the offer letter 
        $dompdf = new Dompdf();
        $html = view('offer-letter', compact('name', 'position', 'salary'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfData = $dompdf->output();
        
        
        $offerLetter = new OfferLetter;
        $offerLetter->job_application_id = $jobApplicationId;
        $offerLetter->file = $name.'-Offer-Letter-'.$position.'.pdf';
        $offerLetter->save();

        // Save the PDF to disk
        Storage::disk('public')->put('offer-letter/'.$offerLetter->file, $pdfData);

        $jobApplication->status = 'Offered';
        $jobApplication->save();

        // Return the offer letter PDF to the user
        return $dompdf->stream('offer-letter.pdf');
    }
}
