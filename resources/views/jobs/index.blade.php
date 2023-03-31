@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Job List') }}
                @auth
                    @if(auth()->user()->type=='admin')
                        <a href="" class="btn btn-primary"> Add New Task </a>
                    @endif
                @endauth
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Vacancy</th>
                                <th>Allowance</th>
                                <th>Description</th>
                                <th>Requirement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->name}}</td>
                                <td>{{$job->address}}</td>
                                <td>{{$job->vacancy}}</td>
                                <td>{{$job->allowance}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->requirement}}</td>
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