@extends('user.sidebar')

@section('body')
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ __('Job Applications') }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name of Candidate</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">JOB NAME</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DETAILS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Applied</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jobApplications as $jobApplication)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $jobApplication->profile->user->name }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $jobApplication->profile->user->email }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$jobApplication->job->name}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$jobApplication->status}}</span>
                      </td>
                      @if ($jobApplication->status == "Viewed")
                                 <td class="text-xs font-weight-bold mb-0 text-center">{{$jobApplication->interview->interview_date}}
                                    <br>
                                    <a href="{{$jobApplication->interview->link}}" target="_blank">{{$jobApplication->interview->link}}</a>
                                </td>
                                
                                @elseif ($jobApplication->status == "Offered")
                                <td class="text-xs font-weight-bold mb-0 text-center"><a href="{{$jobApplication->offerLetter->offer_url}}" target="_blank"><i class="bi bi-file-pdf">Download Offer Letter</i></a></td>

                                @elseif ($jobApplication->status == "Rejected" || "Received")
                                <td class="text-xs font-weight-bold mb-0 text-center">Remarks</td>

            
                                @endif
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$jobApplication->created_at}}</span>
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