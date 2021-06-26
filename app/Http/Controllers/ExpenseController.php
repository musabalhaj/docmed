<?php
 
namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use App\Models\Cat;
use App\Models\PaymentMethod;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Expense\CreateExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounting/Expense.index')
        ->with('Expenses',Expense::all())
        ->with('Cats',Cat::all())
        ->with('Suppliers',Supplier::all())
        ->with('PaymentMethod',PaymentMethod::all())
        ->with('User',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Supplier = DB::table('suppliers')->where('status',1)->get(); 
        $PaymentMethod = DB::table('payment_methods')->where('status',1)->get();
        $Cat = DB::table('cats')->where('type',0)->get();  
        return view('Accounting/Expense.create')
        ->with('Cats',$Cat)
        ->with('Supplier',$Supplier)
        ->with('PaymentMethod',$PaymentMethod);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpenseRequest $request , Expense $Expense , Cat $Cat)
    {
        $cat_balance =  DB::table('cats')->where('id',$request->cat_id)->get()->first();  
        $balance = $cat_balance->balance+$request->amount;
        $user_id = Auth()->user()->id;
        $Expense->create([
            'date'=>$request->date,
            'amount'=>$request->amount,
            'supplier_id'=>$request->supplier_id,
            'description'=>$request->description,
            'cat_id'=>$request->cat_id,
            'payment_method_id'=>$request->payment_method_id,
            'added_by'=>$user_id
            ]);

        $Cat = DB::table('cats')->where('id',$request->cat_id)->update(['balance'=> $balance]);

        session()->flash('success','Added Successfully');
        
        return redirect(route('Expense.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $Expense)
    {
        $Supplier = DB::table('suppliers')->where('status',1)->get(); 
        $Cat = DB::table('cats')->where('type',0)->get(); 
        $PaymentMethod = DB::table('payment_methods')->where('status',1)->get(); 
        return view('Accounting/Expense.edit')
        ->with('Expense',$Expense)
        ->with('Supplier',$Supplier)
        ->with('Cats',$Cat)
        ->with('PaymentMethod',$PaymentMethod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $Expense)
    {
        $Expense->update(request(['date' ,'amount', 'supplier_id','description', 'cat_id','payment_method_id']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Expense.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $Expense)
    {
        $balance = DB::table('cats')->where('id',$Expense->cat_id)->get()->sum('balance'); 
        DB::table('cats')->where('id',$Expense->cat_id)->update(['balance'=> $balance-$Expense->amount]);         
        $Expense->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Expense.index'));
    }
}
