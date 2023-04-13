@extends('admin.sidebar')

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Applicant Information') }}</div>

                <div class="card-body">
                    <!-- Display user's name and email -->
                    <h1>{{ $profile->user->name }}</h1>
                    <p>Email: {{ $profile->user->email }}</p>

                    <!-- Display profile information -->
                    <h2>Profile</h2>
                    <p>IC: {{ $profile->ic }}</p>
                    <p>Phone: {{ $profile->phone }}</p>
                    <p>Address: {{ $profile->user_address }}</p>
                    <p>Allowance: {{ $profile->expected_allowance }}</p>
                    <p>Resume: <a href="{{$profile->attachment_url}}">View Resume</a></p>

                    <!-- Display job applications -->
                    <h2>Job Applications</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Applied On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $jobApplication->job->name }}</td>
                                <td>{{ $jobApplication->created_at }}</td>
                                <td>{{ $jobApplication->status }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('admin.manage.interview', ['jobApplicationId' => $jobApplication->id]) }}"><button type="button" class="btn btn-primary">Manage Interview</button></a>
                    <a href="{{ route('admin.generate.offerletter', ['jobApplicationId' => $jobApplication->id]) }}"><button type="button" class="btn btn-success">Generate Offer Letter</button><a>
                    <a onclick="return confirm('Are your sure?')" href="{{ route('admin.reject.applicant', ['jobApplicationId' => $jobApplication->id]) }}"><button type="button" class="btn btn-danger">Reject Candidate</button></a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection