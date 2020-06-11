<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employer;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        $employers = Employer::with('user')->paginate(10);

        $status = [ 'test period','worker'];

        $classification = [ 'full time','part time'];

        // foreach ($employers as $emp) {
        //     dd($emp->user->first_name);
        // }
        if ($request->datas === "All Employees" || $request->datas === "Employees") {
            $employer = $employers;
        }
        else{
            $employer = $request->datas;
        }

        // if ($request->navbar === "Employees") {
        //     $employer = $employers;
        // }else{
        //     $employer = $request->navbar;
        // }

        return $employer;

        //return view('employees.home', compact('employers','status','classification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $user = User::create(
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'occupation' => $request->input('occupation'),
                'password' => bcrypt('password'),
                'email_verified_at' => now()
        ]);

        if ($request->input('first_name') && $request->input('email')) {
            $employee = Employer::create([
                'user_id' => $user->id,
                'status' => $request->input('status'),
                'status_time' => $request->input('status_time'),
                'salary' => $request->input('salary'),
                'classification' => $request->input('classification')
            ]);
        }

        //return $employee;

        session()->flash('success', 'Employee created successfully');
        return redirect()->route('employee.home');
    }

    public function ajaxEmployer()
    {
        return response()->json($this->store(), 201);
    }

    public function ajaxEmployerNav(Request $request)
    {
        return response()->json($this->index($request), 201);
    }

    public function ajaxEmployerNavTop(Request $request)
    {
        return response()->json($this->index($request), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employer::with('user')->where('id',$id)->firstOrFail();

        $user = User::where('id', $employee->user->id)->firstOrFail();

        //dd($request);
        
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'occupation' => $request->input('occupation')
        ]);

        if ($user->id) {
            $employee->update([
                'user_id' => $user->id,
                'status' => $request->input('status'),
                'status_time' => $request->input('status_time'),
                'salary' => $request->input('salary'),
                'classification' => $request->input('classification')
            ]);
        }

        session()->flash('success', 'Employee Updated Successfully');
        return redirect()->route('employee.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employer::with('user')->where('id',$id)->firstOrFail();

        $user = User::where('id', $employee->user->id)->firstOrFail();

        if($employee ){
            $employee->delete();
            $user->delete();
            
            session()->flash('success', 'Employee Deleted Successfully');
            return redirect()->route('employee.home');
        }
        else{
            session()->flash('error', 'Employee Not Found');
            return back();
        }
    }
}
