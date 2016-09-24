<?php

namespace app\Http\Controllers\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use app\Department;
use app\Employee;
use app\Http\Controllers\Controller;
use app\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $id
     * @return \Illuminate\View\View
     */
    public function index($id = null)
    {
        if(isset($id)){
            $employee = Employee::where('departmentId',Auth::user()->dept_id)->orderby($id)->paginate(20);
            return view('employee.employee.index', compact('employee'));
        }
        $employee = Employee::where('departmentId',Auth::user()->dept_id)->paginate(20);
        return view('employee.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $temp = Department::all();
        return view('employee.employee.create')->withtemp($temp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EmployeeRequest $request)
    {

        
        Employee::create($request->all());

        Session::flash('message', 'Employee added!');

        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $department = Department::findOrfail($employee->departmentId);

        return view('employee.employee.show', compact('employee', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $e = Employee::where('departmentId',Auth::user()->dept_id)->get();
        foreach ($e as $t){
            if($t->id == $id){
                $employee = Employee::findOrFail($id);
                return view('employee.employee.edit', compact('employee'));
            }
        }
        return redirect('/employee');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request|EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, EmployeeRequest $request)
    {

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        Session::flash('message', 'Employee updated!');

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {


        $e = Employee::where('departmentId',Auth::user()->dept_id)->get();
        foreach ($e as $t){
            if($t->id == $id){
                Employee::destroy($id);
                Session::flash('message', 'Employee deleted!');
            }
        }
        return redirect('/employee');


    }
}
