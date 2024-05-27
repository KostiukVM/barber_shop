<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Working_schedule;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['position', 'workingSchedule'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $positions = Position::all();
        $workingSchedules = Working_schedule::all();
        return view('employees.create', compact('positions', 'workingSchedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'working_schedule_id' => 'required|exists:working_schedules,id',
            'photo' => 'required|image|max:2048',
        ]);

        $photo = $request->file('photo')->store('barber_photo', 'public');

        Employee::create([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'working_schedule_id' => $request->working_schedule_id,
            'photo' => $photo,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show($id)
    {
        $employee = Employee::with(['position', 'workingSchedule'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::all();
        $workingSchedules = Working_Schedule::all();
        return view('employees.edit', compact('employee', 'positions', 'workingSchedules'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'working_schedule_id' => 'required|exists:working_schedules,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        $employee = Employee::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('barber_photo', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
