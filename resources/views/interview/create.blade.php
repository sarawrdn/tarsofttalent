@extends('admin.sidebar')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Manage Interview') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.interview',$jobApplicationId) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Date Of Interview:</label>
                            <input type="datetime-local" class="form-control" name="interview_date" placeholder="Enter Date of Interview" >
                        </div>
                        <div class="form-group">
                            <label>Link:</label>
                            <input type="text" class="form-control" name="link" placeholder="Enter link">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Interview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection