<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\OfferLetter;
use Storage;
use App\Models\JobApplication;

class SignaturePadController extends Controller
{
    public function index($jobApplicationId)
    {
        return view('signaturePad',['jobApplicationId' => $jobApplicationId]);
    }

    public function upload(Request $request,$jobApplicationId)
    {

        $jobApplication = JobApplication::findOrFail($jobApplicationId);
        $cname = $jobApplication->profile->user->name;
        $position = $jobApplication->job->name;
        $salary = $jobApplication->profile->expected_allowance;

        //Image Process
        $folderPath = storage_path('app/public/signature/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1]; 
        $image_base64 = base64_decode($image_parts[1]);
        $name = uniqid() . '.'.$image_type;
        $file = $folderPath . $name;
        file_put_contents($file, $image_base64);

        $data = ['name'=>$name,'position'=>$position,'salary'=>$salary,'cname'=>$cname];
        $pdf = PDF::loadView('myPDF', $data);


        //Insert into table
        $offerLetter = OfferLetter::whereHas('jobApplication', function ($query) use ($jobApplicationId) {
            $query->where('id', $jobApplicationId);
        })->first();

        $offerLetter->new_file = $cname.'Signed-Offer-Letter-'.$position.'.pdf';
        $offerLetter->save();
        $jobApplication->status = 'Accepted';
        $jobApplication->save();

        $storagePath = storage_path('app/public/signed-offer-letter/'.$jobApplication->offerLetter->new_file, $pdf); // change the file path to your desired storage location
        $pdf->save($storagePath);

        // Return the offer letter PDF to the user
        return $pdf->download('signed-offer-letter.pdf');

        return redirect()->route('jobs.applied');

    }
}
