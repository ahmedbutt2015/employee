<?php

namespace app\Http\Controllers\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use app\Department;
use app\Http\Controllers\Controller;
use app\Http\Requests\DepartmentRequest;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $department = Department::paginate(20);

        return view('department.department.index')->with('department', $department);
    }

    /**
     * @param $id
     * @return mixed
     * @internal param Request $request
     */
    public function indexSort($id)
    {

        $department = Department::orderby($id)->paginate(20);

        return view('department.department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('department.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DepartmentRequest $request)
    {


        Department::create($request->all());

        Session::flash('flash_message', 'Department added!');

        return redirect('department');
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
        $department = Department::findOrFail($id);

        return view('department.department.show', compact('department'));
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
        $department = Department::findOrFail($id);

        return view('department.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request|DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, DepartmentRequest $request)
    {

        $department = Department::findOrFail($id);

        $department->update($request->all());

        Session::flash('flash_message', 'Department updated!');

        return redirect('department');
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
        Department::destroy($id);

        Session::flash('flash_message', 'Department deleted!');

        return redirect('department');
    }
}
