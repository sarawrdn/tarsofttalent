@extends('admin.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as Admin!') }}
                    <br>
                    <a href="/admin/jobs">View Jobs</a><br>
                    <a href="/admin/job-applications">View Applications</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
