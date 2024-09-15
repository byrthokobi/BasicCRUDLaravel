@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: whitesmoke; padding:1rem; border-radius:1rem">
    <h1 class="text-center">Welcome to WAFI Employee Management System</h1>
</div>
<div class="container my-3">
    <div class="row">
        <div class="col-md-3" style="background-color: aquamarine;">
            <ul class="list-group my-3">
                <li class="list-group-item list-group-item-info"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="list-group-item list-group-item-info"><a href="{{ route('dashboard') }}">Employee</a></li>
                <li class="list-group-item list-group-item-info"><a href="{{ route('employees.create') }}">Add Employee</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <table id="employeesTable" class="table table-stripped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Date of Birth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr class="text-center">
                        <td><img src="{{ asset($employee->image) }}" alt="{{asset($employee->image)}}" height="50" width="50"></td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->mobile }}</td>
                        <td>{{ $employee->dob }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}"><i class="fas fa-edit"></i></a>
                            <a href="#" onclick="event.preventDefault(); confirmDelete({{ $employee->id }});"><i class="fa-solid fa-trash"></i></a>
                            <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $employees->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Do you want to delete this record?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    $(document).ready(function() {
        $('#employeesTable').DataTable({
            searching: true,
            paging: true,
            ordering: true,
            order: [],
            columnDefs: [{
                orderable: false,
                targets: [0, 5]
            }]
        });
    });
</script>
@endsection