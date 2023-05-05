@extends('admin.sidebar')
@section('body')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="text-align:left;float:left;">{{ __('Job List') }}</h6>
              @auth
                    @if(auth()->user()->type=='admin')
                        <a style="text-align:right;float:right;" href="{{route('admin.jobs.create')}}" class="btn btn-primary"> + New Job </a>
                    @endif
                @endauth
            </div>
            
            <form
              class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
              method="GET"
              action = "{{ route ('admin.jobs.index')}}"
              >
                <div class="input-group">
                  <input 
                    class="form-control"
                    type="text" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2"
                    name="keyword"
                    value="{{ request()->get('keyword') }}"
                    />
                    <div class="input-group-appened">
                      <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
              </div>
            </form>

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
                        @if ($job->vacancy > 0)
                        <span class="badge badge-sm bg-gradient-success">{{$job->vacancy}}</span>
                        @else
                        <span class="badge badge-sm bg-gradient-danger">{{$job->vacancy}}</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$job->allowance}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="{{route ('admin.jobs.show', $job) }}"><i class="bi bi-eye text-primary" style="font-size: 1em;"></i></a>
                                        <a href="{{route ('admin.jobs.edit', $job) }}"><i class="bi bi-pencil text-success" style="font-size: 1em;"></i><a>
                                        <a href="{{route ('admin.jobs.delete', $job) }}" onclick="if(confirm('Are you sure you want to delete this job?')) {alert('Job has been deleted!');} else {return false;}"><i class="bi bi-trash text-danger" style="font-size: 1em;"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $jobs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection