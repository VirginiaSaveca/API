<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalTransfer extends Model
{
    use HasFactory, HasUuids;

    
    protected $guarded = [];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    
}