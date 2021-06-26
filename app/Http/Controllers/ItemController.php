<?php
 
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Item\CreateItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/Item.index')
        ->with('Item',Item::all()->sortByDESC('id'))
        ->with('Category',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Item.create')->with('Category',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemRequest $request , Item $Item)
    {
        $Item->create(request(['name','description','price','qty','category_id']));
        
        session()->flash('success','Added Successfully');
        
        return redirect(route('Item.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $Item)
    {
        return view('Admin/Item.edit')
        ->with('Item',$Item)
        ->with('Category',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $Item)
    {
        $Item->update(request(['name','description','price','qty','category_id']));
        
        session()->flash('success','Updated Successfully');
        
        return redirect(route('Item.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $Item)
    {
        $Item->delete();

        session()->flash('success','Deleted Successfully');
        
        return redirect(route('Item.index'));
    }
}
