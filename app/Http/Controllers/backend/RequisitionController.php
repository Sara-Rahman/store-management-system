<?php

namespace App\Http\Controllers\backend;

use App\Models\Item;
use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Models\ItemRequisition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item_requisition=ItemRequisition::with('item_requisitions')->get();
        // dd($item_requisition->item->name);
        $requisitions=Requisition::all();
        return view('admin.pages.requisition.index',compact('requisitions','item_requisition'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        return view('admin.pages.requisition.create',compact('items'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all(),auth()->user()->name);
        Requisition::create([
            'requested_by'=>Auth::user()->name

        ]);
        $items=$request->item_id;
        $quantites=$request->quantity;
        $requisition=Requisition::where('requested_by',auth()->user()->name)->first();

        // dd($items,$quantites);
        foreach($items as $key=>$data){
            ItemRequisition::create([
                'requisition_id'=>$requisition->id,
                'item_id'=>$data,
                'quantity'=>$quantites[$key]
            ]);

        }
        return redirect()->back();


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
    public function update(Request $request, $id)
    {
        //
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
