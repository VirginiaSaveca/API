<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    // public function setBirthdateAttribute($value)
    // {
    //     $this->attributes['birthdate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }

    // public function getBirthdateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    // public function setBiValidateAttribute($value)
    // {
    //     $this->attributes['bi_validate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }

    // public function getBiValidateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function organic_unit()
    {
        return $this->belongsTo(OrganicUnit::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function partition()
    {
        return $this->belongsTo(Partition::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function salary_level()
    {
        return $this->belongsTo(SalaryLevel::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function internal_transfers()
    {
        return $this->hasMany(InternalTransfer::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    public function administrative_acts()
    {
        return $this->hasMany(AdministrativeAct::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class);
    }

    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }
}
