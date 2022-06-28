<?php

namespace App\Models;

use App\Models\ItemRequisition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requisition extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function item_requisitions()
    {
        return $this->hasMany(ItemRequisition::class,'requisition_id','id');

    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }
   
}
