@extends('dashboard.layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <strong>User</strong>Form
    </div>
    <div class="card-block">
        <form action="{{ route('dashboard.users.store') }}" method="post" class="form-horizontal ">
            @csrf
            <div class="form-group col-sm-12 ">
                <label class="form-control-label" for="hf-email">Name</label>
                <div >
                    <input type="text" id="hf-email" name="name" class="form-control" placeholder="Enter Email..">
                </div>
            </div>

            <div class="form-group col-sm-12 ">
                <label class="form-control-label" for="hf-email">Email</label>
                <div >
                    <input type="email" id="hf-email" name="email" class="form-control" placeholder="Enter Email..">
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label class="form-control-label" for="hf-password">Password</label>
                <div>
                    <input type="password" id="hf-password" name="password" class="form-control" placeholder="Enter Password..">
                </div>
            </div>

            <div class="col-md-9">
                <select id="select" name="status" class="form-control input-lg" size="1">
                    <option disabled selected>Status</option>
                    <option value="writer">Writer</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
    </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>
        </form>
</div>

@endsection
