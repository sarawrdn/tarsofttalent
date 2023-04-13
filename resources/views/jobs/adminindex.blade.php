@extends('admin.sidebar')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job List') }}
                @auth
                    @if(auth()->user()->type=='admin')
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.jobs.create')}}" class="btn btn-primary"> Add New Job </a>
                    @endif
                @endauth
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Vacancy</th>
                                <th>Allowance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->name}}</td>
                                <td>{{$job->address}}</td>
                                <td>{{$job->vacancy}}</td>
                                <td>{{$job->allowance}}</td>

                                @auth
                                    @if(auth()->user()->type=='admin')
                                        <td>

                                        <a href="{{route ('admin.jobs.show', $job) }}"><i class="bi bi-eye text-primary" style="font-size: 1em;"></i></a>
                                        <a href="{{route ('admin.jobs.edit', $job) }}"><i class="bi bi-pencil text-success" style="font-size: 1em;"></i><a>
                                        <a href="{{route ('admin.jobs.delete', $job) }}" onclick="if(confirm('Are you sure you want to delete this job?')) {alert('Job has been deleted!');} else {return false;}"><i class="bi bi-trash text-danger" style="font-size: 1em;"></i></a>
                                        </td>

                                    @else
                                        <td><a href="{{route ('admin.jobs.show', $job) }}">View Details</a></td>
                                    @endif
                                @endauth
                                
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