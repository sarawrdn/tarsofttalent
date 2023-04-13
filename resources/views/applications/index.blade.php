@extends('user.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job Applied') }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                                <th>Application's Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobApplications as $jobapplied)
                            <tr>
                                <td>{{$jobapplied->job->name}}</td>
                                <td>{{$jobapplied->created_at}}</td>
                                <td>{{$jobapplied->status}}</td>

                                @if ($jobapplied->status == "Viewed")
                                <td>{{$jobapplied->interview->interview_date}}
                                    <br>
                                    <a href="{{$jobapplied->interview->link}}" target="_blank">{{$jobapplied->interview->link}}</a>
                                </td>
                                
                                @elseif ($jobapplied->status == "Offered")
                                <td><a href="{{$jobapplied->offerLetter->offer_url}}" target="_blank"><i class="bi bi-file-pdf">View Offer Letter</i></a>
                                <br>
                                <button type="submit" class="btn btn-success">Sign Agreement</button>
                                </td>
                                @endif

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