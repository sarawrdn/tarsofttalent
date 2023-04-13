@extends('admin.sidebar')

@section('body')

<div class="card shadow-lg mx-4">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{asset ('assets/img/team-1.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              {{ $profile->user->name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              {{ $jobApplication->job->name }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav">
              <a class="btn btn-primary btn-sm ms-auto" href="{{$profile->attachment_url}}" target="_blank" role="button">View Resume</a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0"><b>{{ __('Applicant Information') }}</b></p>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Full Name</label>
                    <input class="form-control" type="text" value="{{ $profile->user->name }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email Address</label>
                    <input class="form-control" type="email" value="{{ $profile->user->email }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Phone Number</label>
                    <input class="form-control" type="text" value="{{ $profile->phone }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">IC</label>
                    <input class="form-control" type="text" value="{{ $profile->ic }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address</label>
                    <input class="form-control" type="text" value="{{ $profile->user_address }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">JOB APPLICATION</p>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Job Title</label>
                    <input class="form-control" type="text" value="{{ $jobApplication->job->name }}" style="background-color: #fff;" disabled>
                  </div>
                  <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Applied Date</label>
                    <input class="form-control" type="text" value="{{ $jobApplication->created_at }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Status</label>
                    <input class="form-control" type="email" value="{{ $jobApplication->status }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Allowance</label>
                    <input class="form-control" type="email" value="{{ $profile->expected_allowance }}" style="background-color: #fff;" disabled>
                  </div>
                </div>
              </div>
                </div>
              </div>
              <div class="text-center">
                <a class="btn btn-primary btn-sm ms-auto btn btn-light" href="{{ route('admin.manage.interview', ['jobApplicationId' => $jobApplication->id]) }}" role="button">Manage Interview</a>
                <a class="btn btn-primary btn-sm ms-auto btn btn-success" href="{{ route('admin.generate.offerletter', ['jobApplicationId' => $jobApplication->id]) }}" role="button">Generate Offer Letter</a>
                <a onclick="return confirm('Are your sure?')" class="btn btn-primary btn-sm ms-auto btn btn-danger" href="{{ route('admin.reject.applicant', ['jobApplicationId' => $jobApplication->id]) }}" role="button">Reject Candidate</a>
        </div>
            </div>
          </div>
        </div>

@endsection