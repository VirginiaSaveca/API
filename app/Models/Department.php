<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function organicUnit()
    {
        return $this->belongsTo(OrganicUnit::class, 'organic_unit_id');
    }

    public function partitions()
    {
        return $this->hasMany(Partition::class);
    }
}
