<?php

namespace App\Http\Controllers\backend;

use App\Models\Item;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Stock::all();
        return view('admin.pages.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        return view('admin.pages.stock.create',compact('items'));
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
            
            'item_id'=>'required',
            'quantity'=>'required',
           
        ]);
        $item=Item::where('id',$request->item_id)->first();
        Stock::create([
            'item_id'=>$request->item_id,  
            'price'=>$request->quantity*$item->price, 
            'quantity'=>$request->quantity,
        ]);
        return redirect()->back()->with('success','Stock Added Successfully');
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
        $items=Item::all();
        $stock=Stock::find($id);
        return view('admin.pages.stock.edit',compact('stock','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $stock=Stock::find($id);
        $item=Item::where('name',$request->item)->first();
        $stock->update([
              
            'price'=>$request->quantity*$item->price, 
            'quantity'=>$request->quantity,
        
        ]);
    
        return redirect()->route('stock.index')->with('success',"Stock Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
