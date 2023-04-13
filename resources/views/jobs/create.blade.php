
@extends('admin.sidebar')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List New Job') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.jobs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter job name">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter job address">
                        </div>
                        <div class="form-group">
                            <label>Vacancy:</label>
                            <input type="number" class="form-control" name="vacancy" placeholder="Enter job vacancy">
                        </div>
                        <div class="form-group">
                            <label>Salary/Allowance Range:</label>
                            <input type="text" class="form-control" name="allowance" placeholder="Enter salary/allowance range">
                        </div>
                        <label>Description:</label>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Enter job description"></textarea>
                        </div>
                        <label>Requirement:</label>
                        <div class="form-group">
                            <textarea class="form-control" name="requirement" placeholder="Enter job requirement"></textarea>
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection