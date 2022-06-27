<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemRequisition extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function item_requisitions()
    {
        return $this->hasMany(ItemRequisition::class,'requisition_id','id');

    }
    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');

    }
}
