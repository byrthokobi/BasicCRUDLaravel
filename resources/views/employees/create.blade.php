@extends('layouts.app')

@section('content')
<div class="container my-3" style="width:60%;">
    <div class="container-fluid" style="background-color: whitesmoke; padding:1rem; border-radius:1rem">
        <h1 class="text-center">Add New Employee to the Database</h1>
    </div>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Mobile:</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Date of Birth:</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Image:</label>
            <input type="file" name="image" class="form-control" accept=".jpg, .png, .jpeg, .webp" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add New Employee</button>
            <a class="btn btn-outline-danger" href="{{route('dashboard')}}" role="button">Cancel</a>
        </div>
    </form>
</div>
@endsection