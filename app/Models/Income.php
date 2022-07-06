<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branch(){
        return $this->belongsTo(Branch::class, 'beneficiary_branch_id');
    }

    public function from_branch(){
        return $this->belongsTo(Branch::class, 'from_branch_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function shipment(){
        return $this->belongsTo(Shipment::class, 'shipment_id');
    }
}
