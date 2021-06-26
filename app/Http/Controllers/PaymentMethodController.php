<?php
  
namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentMethod\CreatePaymentMethodRequest;
use App\Http\Requests\PaymentMethod\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/PaymentMethod.index')
        ->with('PaymentMethod',PaymentMethod::all());
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
    public function store(CreatePaymentMethodRequest $request,PaymentMethod $PaymentMethod)
    {
        $PaymentMethod->create(request(['name','description']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('PaymentMethod.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $PaymentMethod)
    {
        return view('Admin/PaymentMethod.edit')->with('PaymentMethod',$PaymentMethod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $PaymentMethod)
    {
        $PaymentMethod->update(request(['name','description']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('PaymentMethod.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $PaymentMethod)
    {
        $PaymentMethod->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('PaymentMethod.index'));
    }

    public function ActivePaymentMethod($id)
    {

        DB::table('payment_methods')->where('id',$id)->update(['status'=> '1']);
        
        session()->flash('success','Activeted Successfully');
        
        return redirect(route('PaymentMethod.index'));

    }

    public function InActivePaymentMethod($id)
    {

        DB::table('payment_methods')->where('id',$id)->update(['status'=> '0']);
        
        session()->flash('success','InActiveted Successfully');
        
        return redirect(route('PaymentMethod.index'));

    }
}
