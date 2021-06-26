<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Account.index')
        ->with('Account',Account::all())
        ->with('Banks',Bank::all())
        ->with('Branches',Branch::all());
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
    public function store(CreateAccountRequest $request ,Account $Account)
    {
        $Account->create(request(['name','bank_id','branch_id','account_num','amount']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Account.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $Account)
    {
        return view('Admin/Account.edit')
        ->with('Account',$Account)
        ->with('Banks',Bank::all())
        ->with('Branches',Branch::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $Account)
    {
        $Account->update(request(['name','bank_id','branch_id','account_num','amount']));

        session()->flash('success','Updated Successfully');
        
        return redirect(route('Account.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $Account)
    {
        $Account->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Account.index'));
    }
}
