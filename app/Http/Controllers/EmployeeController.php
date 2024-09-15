<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use App\Models\Employee;
use Intervention\Image\Drivers\Gd\Driver;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('dashboard', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required',
            'dob' => 'required|date',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;
        //$manager = new ImageManager(new Driver());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . '.' . $file->extension();
            $Path = public_path('storage/employee_images/' . $fileName);

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(300, 300);
            $image->toJpeg(80)->save($Path);
            $imagePath = 'storage/employee_images/' . $fileName;
        }

        Employee::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'dob' => $validated['dob'],
            'image' => $imagePath
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'mobile' => 'required',
            'dob' => 'required|date',
            'image' => 'nullable|image'
        ]);


        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = date('YmdHi') . '.' . $file->extension();
            $Path = public_path('storage/employee_images/' . $fileName);
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(300, 300);
            $image->toJpeg(80)->save($Path);
            $imagePath = 'storage/employee_images/' . $fileName;

            // Update employee image
            $employee->update(['image' => $imagePath]);
        }

        // Update other fields
        $employee->update($validated);

        return redirect()->route('dashboard');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('dashboard');
    }
}
