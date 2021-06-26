<?php
 
namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\User;
use App\Models\Cat;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Income\CreateIncomeRequest;
use App\Http\Requests\Income\UpdateIncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounting/Income.index')
        ->with('Incomes',Income::all())
        ->with('Cats',Cat::all())
        ->with('User',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $Cat = DB::table('cats')->where('type',1)->get(); 
        return view('Accounting/Income.create')
        ->with('Cats',$Cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIncomeRequest $request , Income $Income , Cat $Cat)
    {
        $cat_balance =  DB::table('cats')->where('id',$request->cat_id)->get()->first();  
        $balance = $cat_balance->balance+$request->amount;
        $user_id = Auth()->user()->id;
        $Income->create([
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description,
            'cat_id'=>$request->cat_id,
            'added_by'=>$user_id
            ]);

        $Cat = DB::table('cats')->where('id',$request->cat_id)->update(['balance'=> $balance]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Income.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $Income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $Income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $Income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $Income)
    {
        $Cat = DB::table('cats')->where('type',1)->get();
        return view('Accounting/Income.edit')
        ->with('Income',$Income)
        ->with('Cats',$Cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $Income
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request, Income $Income)
    {
        $Income->update(request(['date' ,'amount','description', 'cat_id']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Income.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $Income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $Income)
    {
        $balance = DB::table('cats')->where('id',$Income->cat_id)->get()->sum('balance'); 
        DB::table('cats')->where('id',$Income->cat_id)->update(['balance'=> $balance-$Income->amount]); 
        $Income->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Income.index'));
    }

}
