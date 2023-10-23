<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganicUnit extends Model
{
    use HasFactory;

    public function departments(){
        return $this->hasMany(Department::class);
    }

}
