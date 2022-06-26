<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
