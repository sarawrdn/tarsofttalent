
@extends('admin.sidebar')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job Details') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route ('admin.jobs.update', $job) }}">
                    @csrf
                    <div class="form-group">
                        <label> Job: </label>
                        <input type ="text" value="{{ $job->name }}" name= "name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Address: </label>
                        <input type ="text" value="{{ $job->address }}" name= "address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Vacancy: </label>
                        <input type ="text" value="{{ $job->vacancy }}" name= "vacancy" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Allowance: </label>
                        <input type ="text" value="{{ $job->allowance }}" name= "allowance" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Description: </label>
                        <textarea name="description" class="form-control" >{{ $job->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Requirement: </label>
                        <textarea name="requirement" class="form-control" >{{ $job->requirement }}</textarea>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection