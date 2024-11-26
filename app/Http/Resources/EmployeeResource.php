<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'branch' => $this->branch->name,
            'organic_unit' => $this->organic_unit->name,
            'department' => $this->department->name,
            'partition' => $this->partition->name,
            'career' => $this->career->name,
            'category' => $this->category->name,
            'level' => $this->level->name,
            'salary_level' => $this->salary_level->level,
            'name' => $this->name,
            'birthdate' => $this->birthdate,
            'contact' => $this->contact,
            'nationality' => $this->nationality,
            'naturality' => $this->naturality,
            'email' => $this->email,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'bi_nr' => $this->bi_nr,
            'bi_validate' => $this->bi_validate,
            'nuit' => $this->nuit,
        ];
    }
}
