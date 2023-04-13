
@extends('user.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session()->has('alert'))
        <div class="alert {{session()->get('alert-type')}} alert-dismissible fade show">
            {{session()->get('alert')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
            @endif
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
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>IC:</label>
                            <input type="text" class="form-control" name="ic" placeholder="Enter your IC">
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your Phone Number" >
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea class="form-control" name="user_address" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nationality:</label>
                            <input type="text" class="form-control" name="nationality" placeholder="Enter your nationality">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <input type="text" class="form-control" name="gender" placeholder="Enter your gender" >
                        </div>
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" placeholder="Enter your age" >
                        </div>
                        <div class="form-group">
                            <label>Date Of Birth:</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter your DOB" >
                        </div>
                        <div class="form-group">
                            <label>Expected Allowance/Salary:</label>
                            <input type="number" class="form-control" name="expected_allowance" placeholder="Enter your expected allowance or salary">
                        </div>
                        <div class="form-group">
                            <label>Resume:</label>
                            <input type="file" class="form-control" name="resume">
                        </div>                        
                        <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save My Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection