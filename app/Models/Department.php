<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function organic_unit(){
        return $this->belongsTo(OrganicUnit::class);
    }

    public function partitions(){
        return $this->hasMany(Partition::class);
    }

}
