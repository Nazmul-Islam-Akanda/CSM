<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function tobranch(){
        return $this->belongsTo(Branch::class, 'to_branch_id');
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function toarea(){
        return $this->belongsTo(Area::class, 'to_area_id');
    }

    public function fromarea(){
        return $this->belongsTo(Area::class, 'from_area_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }


}
