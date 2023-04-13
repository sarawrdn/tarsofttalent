@extends('user.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label> Name: </label>
                        <input type ="text" value="{{auth()->user()->name}}" name= "title" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label> Email: </label>
                        <input type ="text" value="{{auth()->user()->email}}" name= "title" class="form-control" readonly>
                    </div>
                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>IC:</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->profile->ic }}" name="ic" placeholder="Enter your IC">
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your Phone Number" value="{{ auth()->user()->profile->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea class="form-control" name="user_address" placeholder="Enter your address">{{ auth()->user()->profile->user_address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nationality:</label>
                            <input type="text" class="form-control" name="nationality" placeholder="Enter your nationality" value="{{ auth()->user()->profile->nationality }}">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <input type="text" class="form-control" name="gender" placeholder="Enter your gender" value="{{ auth()->user()->profile->gender }}">
                        </div>
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" placeholder="Enter your age" value="{{ auth()->user()->profile->age }}">
                        </div>
                        <div class="form-group">
                            <label>Date Of Birth:</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter your DOB" value="{{auth()->user()->profile->dob }}">
                        </div>
                        <div class="form-group">
                            <label>Expected Allowance/Salary:</label>
                            <input type="number" class="form-control" name="expected_allowance" placeholder="Enter your expected allowance or salary" value="{{ auth()->user()->profile->expected_allowance}}" >
                        </div>
                        <div class="form-group">
                            @if (auth()->user()->profile->resume)
                            <a target="_blank" href="{{auth()->user()->profile->attachment_url}}" class="btn btn-link">View Resume</a>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update My Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection