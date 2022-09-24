<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employeeDtls = Employee::latest()->paginate(5);

        return view('employee.index',compact('employeeDtls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'employee_id' => 'required',
            'expreience' => 'required',
            'mobile' => 'required',
            'status' => 'required',
        ]);

        $employee = new Employee();
       $employee->name = $request->name;
       $employee->employee_id = $request->employee_id;
       $employee->expreience = $request->expreience;
       $employee->status = $request->status;
       $employee->mobile = $request->mobile;
       $employee->save();
        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'employee_id' => 'required',
            'expreience' => 'required',
            'mobile' => 'required',
            'status' => 'required',
        ]);
         $employee = Employee::find($id);
        $employee->name = $request->name;
       $employee->employee_id = $request->employee_id;
       $employee->expreience = $request->expreience;
       $employee->status = $request->status;
       $employee->mobile = $request->mobile;
       $employee->save();

        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
   {
       $employee = Employee::find($id);
       $employee->delete();
       return redirect()->back()->with('delete','Employee deleted successfully');;
   }
}
