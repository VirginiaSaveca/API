<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeAct extends Model
{
    use HasFactory, HasUuids;
    
    protected $guarded = [];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }


    public function getAppointmentDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    
    public function setVisaDateAttribute($value)
    {
        $this->attributes['visa_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }


    public function getVisaDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
