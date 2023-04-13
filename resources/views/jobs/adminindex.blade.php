@extends('admin.sidebar')
@section('body')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Job List') }}
                @auth
                    @if(auth()->user()->type=='admin')
                        <a href="{{route('admin.jobs.create')}}" class="btn btn-primary"> + Create New Job </a>
                    @endif
                @endauth
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
=======
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ __('Job List') }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vacancy</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Allowance</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jobs as $job)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$job->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$job->address}}</p>
                      </td>
                      <td class="align-middle text-center text-sm" >
                        <span class="badge badge-sm bg-gradient-success">{{$job->vacancy}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$job->allowance}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="{{route ('admin.jobs.show', $job) }}"><i class="bi bi-eye text-primary" style="font-size: 1em;"></i></a>
>>>>>>> 7f4480ae300fcd449f405e1c20dec4f510dfa886
                                        <a href="{{route ('admin.jobs.edit', $job) }}"><i class="bi bi-pencil text-success" style="font-size: 1em;"></i><a>
                                        <a href="{{route ('admin.jobs.delete', $job) }}" onclick="if(confirm('Are you sure you want to delete this job?')) {alert('Job has been deleted!');} else {return false;}"><i class="bi bi-trash text-danger" style="font-size: 1em;"></i></a>
                      </td>
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