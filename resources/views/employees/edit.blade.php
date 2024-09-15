@extends('layouts.app')

@section('content')
<div class="container my-3" style="width: 60%;">
    <div class="container-fluid" style="background-color: whitesmoke; padding:1rem; border-radius:1rem">
        <h1 class="text-center">Edit Employee Details</h1>
    </div>
    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
        </div>
        <div class="form-group mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
        </div>
        <div class="form-group mb-3">
            <label>Mobile:</label>
            <input type="text" name="mobile" class="form-control" value="{{ $employee->mobile }}">
        </div>
        <div class="form-group mb-3">
            <label>Date of Birth:</label>
            <input type="date" name="dob" class="form-control" value="{{ $employee->dob }}">
        </div>
        <div class="form-group mb-3">
            <label>Existing Image:</label>
            @if($employee->image)
            <div class="mb-3">
                <img src="{{ asset($employee->image) }}" alt="Employee Image" width="100" height="100">
            </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-outline-danger" href="{{route('dashboard')}}" role="button">Cancel</a>
        </div>
    </form>
</div>
@endsection