<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['boss'])->sortable()->paginate(25);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bosses = Employee::all();
        $employee = new Employee();
        return view('employees.create', compact('employee', 'bosses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $path = $request->file('img')->store('uploads', 'public');
//        $path = '/storage/' . $path;
        $employee = new Employee();
        $employee->fio = $request->fio;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->boss_id = $request->boss_id;
        $employee->work_start_at = $request->work_start_at;
        if ($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            \Image::make($image)->resize(300, 300)->save( 'th'.$filename);
            \Image::make($image)->save($filename);
            $employee->thubnaill = 'th' . $filename;
            $employee->avatar = $filename;
            $employee->save();
        }
        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $bosses = Employee::all();
        return view('employees.edit', compact('employee', 'positions', 'bosses', 'delimetr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->fio = $request->fio;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->boss_id = $request->boss_id;
        $employee->work_start_at = $request->work_start_at;
        if ($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            \Image::make($image)->resize(300, 300)->save( 'th'.$filename);
            \Image::make($image)->save($filename);
            $employee->thubnaill = 'th' . $filename;
            $employee->avatar = $filename;
            $employee->save();
        }
        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
