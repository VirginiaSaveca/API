<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, HasUuids;
    
    protected $guarded = [];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function partitions(){
        return $this->hasMany(Partition::class);
    }
    public function organic_units(){
        return $this->belongsToMany(OrganicUnit::class);
    }
    public function internal_transfers(){
        return $this->hasMany(InternalTransfer::class);
    }

}
