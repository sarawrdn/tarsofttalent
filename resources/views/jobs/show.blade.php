@extends('user.sidebar')
@section('body')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job Details') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label> Job: </label>
                        <input type ="text" value="{{ $job->name }}" name= "name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address: </label>
                        <input type ="text" value="{{ $job->address }}" name= "name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Vacancy: </label>
                        <input type ="text" value="{{ $job->vacancy }}" name= "name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Allowance: </label>
                        <input type ="text" value="{{ $job->allowance }}" name= "name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label> Description: </label>
                        <textarea name="description" class="form-control" readonly>{{ $job->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Requirement: </label>
                        <textarea name="description" class="form-control" readonly>{{ $job->requirement }}</textarea>
                    </div>
                    <br>
                    @auth
                        @if(auth()->user()->type=='user')
                    <div class="text-center">
                        <a href="{{route ('jobs.apply', $job) }}">
                        <button type="submit" class="btn btn-primary">Apply Now</button>
                        </a>
                    </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection