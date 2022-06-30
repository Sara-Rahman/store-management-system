<?php

namespace App\Http\Controllers\backend;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Traits\HasApiResponsesTrait;
use Brian2694\Toastr\Facades\Toastr;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use HasApiResponsesTrait;
    public function getItems()
    {
        $items=Item::all();
        $data = ItemResource::collection($items);
        return $this->responseWithSuccess('Item list loaded', $data);
    }

    public function index()
    {
        $items=Item::all();
        $data = ItemResource::collection($items);
        return view('admin.pages.item.index',compact('items'));
        // return $this->responseWithSuccess('Item list loaded', [$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $image_name=null;
        if($request->hasFile('item_image'))
        {
            $image_name=date('Ymdhis').'.'.$request->file('item_image')->getClientOriginalExtension();
            $request->file('item_image')->storeAs('/uploads/items',$image_name);
        }

        $request->validate([
            
            'name'=>'required',
            'description'=>'required',
            
           
        ]);
        $data=Item::create([
            'name'=>$request->name,   
            'description'=>$request->description,
            'image'=>$image_name,
        ]);
        // return $this->responseWithSuccess('Item created', [$data]);
        return redirect()->route('item.index')->with('success','Item Added Successfully');
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
        $item=Item::find($id);
        return view('admin.pages.item.edit',compact('item'));
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
        $item=Item::find($id);
        $data=$item->update([
            'name'=>$request->name,   
            'description'=>$request->description,
            
        
        ]);
        return $this->responseWithSuccess('Item updated', [$data]);
        // return redirect()->route('item.index')->with('success',"Item Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Item::find($id)->delete();
        return $this->responseWithSuccess('Item deleted', [$data]);

        // return redirect()->back()->with('danger',"Item Deleted");
    }
   
    
}
