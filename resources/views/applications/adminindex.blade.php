@extends('admin.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job Applications') }}
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Name of Candidate</th>
                                <th>Name</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobApplications as $jobApplication)
                            <tr>
                                <td>{{ $jobApplication->profile->user->name }}</td>
                                <td>{{$jobApplication->job->name}}</td>
                                <td>{{$jobApplication->created_at}}</td>
                                <td>{{$jobApplication->status}}</td>
                                @if ($jobApplication->status == "Viewed")
                                <td>{{$jobApplication->interview->interview_date}}
                                    <br>
                                    <a href="{{$jobApplication->interview->link}}" target="_blank">{{$jobApplication->interview->link}}</a>
                                </td>
                                
                                @elseif ($jobApplication->status == "Offered")
                                <td><a href="{{$jobApplication->offerLetter->offer_url}}" target="_blank"><i class="bi bi-file-pdf">Download Offer Letter</i></a></td>

                                @elseif ($jobApplication->status == "Rejected" || "Received")
                                <td>Remarks</td>

            
                                @endif
                                <td><a href="{{route ('admin.show.applicant', [$jobApplication->profile->user->id, $jobApplication->id]) }}"><i class="bi bi-eye text-primary" style="font-size: 1em;"></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection