<?php

namespace App\Http\Controllers\backend;

use App\Models\Item;
use App\Models\Stock;
use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Models\ItemRequisition;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendRequisitionNotificanJob;
use App\Mail\RequisitionNotificationMail;
use Illuminate\Support\Facades\Validator;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(auth()->user()->role->name=='Admin' || auth()->user()->role->name=='Store Executive')
        $requisitions=Requisition::with('item_requisitions')->get();
        else
        $requisitions=Requisition::with('item_requisitions')->where('user_id',auth()->user()->id)->get();
        // dd($requisitions);
        return view('admin.pages.requisition.index',compact('requisitions'));
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
       
        $validator = Validator::make($request->all(), [
            'quantity.*' => 'required|min:1',
        ]);

        if($validator->fails())
        {   
           toastr()->error('Quantity Required.');
           return redirect()->back();
        }
        $requisition=Requisition::create([
            'user_id'=>Auth::user()->id

        ]);
        $items=$request->item_id;
        $quantites=$request->quantity;
        // dd($items,$quantites);
        foreach($items as $key=>$data){
            $totalPrice=0;
            $requested_quantity= $quantites[$key];
            while($quantites[$key]>0)
            {
                $stock=Stock::where('item_id',$data)
                ->where('quantity','!=',0)
                ->first();


                if($stock->quantity>=$quantites[$key])
                {
                   

                    $totalPrice+=$quantites[$key]*$stock->price;
                    $stock->decrement('quantity',$quantites[$key]);
                    $quantites[$key]=0;
                    
                }else
                {
                    $quantites[$key]=$quantites[$key]-$stock->quantity;
                    $totalPrice+=$stock->quantity*$stock->price;
                    $stock->decrement('quantity',$stock->quantity);
                }
               
               
            }
            ItemRequisition::create([
                'requisition_id'=>$requisition->id,
                'item_id'=>$data,
                'quantity'=>$requested_quantity,
                'price'=>$totalPrice,
            ]);
            
        }
        // Mail::to('admin@gmail.com')->send(new RequisitionNotificationMail($details));
        return redirect()->back()->with('success',"Requisition created and mail sent to admin");


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
    public function approveRequisition($id)
    {
        $approved=Requisition::find($id);
        $approved->update([
            'status'=>'Approved'
        ]);
        return redirect()->back();
    }
    public function rejectRequisition($id)
    {
        $rejected=Requisition::find($id);
        $rejected->update([
            'status'=>'Rejected'
        ]);
        return redirect()->back();
    }
}
