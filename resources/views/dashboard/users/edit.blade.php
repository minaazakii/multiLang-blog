@extends('dashboard.layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <strong>Edit</strong>
        <small>Form</small>
    </div>
    <form action="{{ route('dashboard.users.update',$user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-block">
            <div class="form-group col-sm-6">
                <label for="company">Name</label>
                <input type="text" class="form-control" name="name"  value="{{ $user->name }}">
            </div>

            <div class="form-group col-sm-6">
                <label for="vat">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </div>

            <div class="form-group col-sm-6">
                <label class="col-md-3 form-control-label" for="select">Status</label>
                <div class="">
                    <select id="select" name="status" class="form-control input-lg" size="1">
                        <option value="writer"@if($user->status == 'writer') selected @endif>Writer</option>
                        <option value="admin"@if($user->status == 'admin') selected @endif>Admin</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn btn-outline-primary">Submit</button>
                <button class="btn btn-outline-danger">Cancel</button>
            </div>

        </div>
    </form>
</div>



@endsection
