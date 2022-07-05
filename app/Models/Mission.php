<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function to_branch(){
        return $this->belongsTo(Branch::class, 'to_branch_id');
    }

    public function mission_details(){
        return $this->hasMany(MissionDetail::class);
    }
}
