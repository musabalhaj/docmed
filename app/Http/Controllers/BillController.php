<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Cat;
use App\Models\BillInfo;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Bill\CreateBillRequest;
use App\Http\Requests\Bill\UpdateBillRequest;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounting/Bill.index')
        ->with('Bills',Bill::all())
        ->with('test',BillInfo::all())
        ->with('Cats',Cat::all())
        ->with('Suppliers',Supplier::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cat = DB::table('cats')->where('type',0)->get(); 
        $Supplier = DB::table('suppliers')->where('status',1)->get(); 
        return view('Accounting/Bill.create')
        ->with('Cats',$Cat)
        ->with('Supplier',$Supplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request , Bill $Bill)
    {
        $cat_balance =  DB::table('cats')->where('id',$request->cat_id)->get()->first();
        $bill_id = rand(1,10000000000000000);
        $data = $request->all();
        if (count($request->item_name) > 0) {
            foreach($request->item_name as $item=>$v){
                $data2 = array(
                   'bill_id'=>$bill_id,
                   'item'=>$request->item_name[$item],
                   'quantity'=>$request->quantity[$item],
                   'price'=>$request->price[$item],
                   'amount'=>$request->quantity[$item]*$request->price[$item],
                   'created_at'=>now()
                );
                BillInfo::insert($data2);
            }
            $data3 = array(
                'bill_id'=>$bill_id, 
                'bill_date'=>$request->bill_date, 
                'due_date'=>$request->due_date,
                'supplier_id'=>$request->supplier_id,
                'cat_id'=>$request->cat_id,
                'note'=>$request->note,
                'created_at'=>now()
             );
            Bill::insert($data3);
        }
        $bill_balance = DB::table('bill_infos')->where('bill_id',$bill_id)->get()->sum('amount');
        $balance = $cat_balance->balance+$bill_balance;
        $Cat = DB::table('cats')->where('id',$request->cat_id)->update(['balance'=> $balance]);
        session()->flash('success','Added Successfully');
        
        return redirect(route('Bill.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $Bill)
    {
        $Cat = DB::table('cats')->where('type',0)->get(); 
        $Supplier = DB::table('suppliers')->where('status',1)->get(); 
        $BillInfo = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->get();
        return view('Accounting/Bill.show')
        ->with('Cats',$Cat)
        ->with('Bill',$Bill)
        ->with('BillInfo',$BillInfo)
        ->with('Supplier',$Supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $Bill)
    {
        $Cat = DB::table('cats')->where('type',0)->get(); 
        $BillInfo = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->get(); 
        $Supplier = DB::table('suppliers')->where('status',1)->get(); 
        return view('Accounting/Bill.edit')
        ->with('Bill',$Bill)
        ->with('BillInfo',$BillInfo)
        ->with('Cats',$Cat)
        ->with('Supplier',$Supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, Bill $Bill,BillInfo $BillInfo)
    {
        if (count($request->item_name) > 0) {
            $BillInfo->where('bill_id',$Bill->bill_id)->delete();
            foreach($request->item_name as $item=>$v){
                $data2 = array(
                   'bill_id'=>$Bill->bill_id,
                   'item'=>$request->item_name[$item],
                   'quantity'=>$request->quantity[$item],
                   'price'=>$request->price[$item],
                   'amount'=>$request->quantity[$item]*$request->price[$item],
                   'created_at'=>now()
                );
                BillInfo::insert($data2);
                
            }
            $data3 = array( 
                'bill_date'=>$request->bill_date, 
                'due_date'=>$request->due_date,
                'supplier_id'=>$request->supplier_id,
                'cat_id'=>$request->cat_id,
                'note'=>$request->note,
                'created_at'=>now()
             );
             $Bill->where('id',$Bill->id)->update($data3);
        }

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Bill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $Bill)
    {
        $balance = DB::table('cats')->where('id',$Bill->cat_id)->get()->sum('balance'); 
        $amount = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->get()->sum('amount');
        DB::table('cats')->where('id',$Bill->cat_id)->update(['balance'=> $balance-$amount]);        
        $BillInfo = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->delete();

        $Bill->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Bill.index'));
    }

    public function print()
    {
        return view('Accounting/Bill.print');

    }
}
