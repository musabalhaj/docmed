<?php
 
namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Salary\CreateSalaryRequest;
use App\Http\Requests\Salary\UpdateSalaryRequest;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        return view('Accounting/Salary.index')
        ->with('Salary',Salary::all())
        ->with('User',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Accounting/Salary.create')->with('User',User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSalaryRequest $request , Salary $Salary)
    {
        $salary = $request->salary;
        $allowance = $request->allowance;
        $incentive = $request->incentive;
        $deduction = $request->deduction;
        $total_salary =$salary+$allowance+$incentive-$deduction; 
        $Salary->create([
            'user_id'=>$request->user_id,
            'salary'=>$salary,
            'allowance'=>$allowance,
            'incentive'=>$incentive,
            'deduction'=>$deduction,
            'total_salary'=>$total_salary
            ]);
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Salary.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $Salary)
    {
        return view('Accounting/Salary.edit')
        ->with('Salary' , $Salary)
        ->with('User' , User::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaryRequest $request, Salary $Salary)
    {
        $salary = $request->salary;
        $allowance = $request->allowance;
        $incentive = $request->incentive;
        $deduction = $request->deduction;
        $total_salary =$salary+$allowance+$incentive-$deduction; 
        $Salary->update([
            'user_id'=>$request->user_id,
            'salary'=>$salary,
            'allowance'=>$allowance,
            'incentive'=>$incentive,
            'deduction'=>$deduction,
            'total_salary'=>$total_salary
            ]);
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Salary.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $Salary)
    {
        $Salary->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Salary.index'));
    }
}