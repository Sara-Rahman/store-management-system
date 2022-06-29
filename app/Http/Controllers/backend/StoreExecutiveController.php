<?php

namespace App\Http\Controllers\backend;

use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreExecutiveController extends Controller
{
    
    public function receivedItems()
    {
        
        $received=Requisition::with('item_requisitions')->where('status','Approved')->get();
        // dd($received);
        return view('admin.pages.item.received_items',compact('received'));
    }
}
