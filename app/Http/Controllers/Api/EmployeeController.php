<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Branch;
use App\Models\Career;
use App\Models\Category;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Level;
use App\Models\OrganicUnit;
use App\Models\Partition;
use App\Models\SalaryLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::query()
            ->with(['branch', 'organic_unit', 'department', 'partition', 'career', 'category', 'level', 'salary_level'])
            ->paginate();

        return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => ['required', 'integer', Rule::exists(Branch::class, 'id')],
            'organic_unit_id' => ['required', 'integer', Rule::exists(OrganicUnit::class, 'id')],
            'department_id' => ['required', 'integer', Rule::exists(Department::class, 'id')],
            'partition_id' => ['required', 'integer', Rule::exists(Partition::class, 'id')],
            'career_id' => ['required', 'integer', Rule::exists(Career::class, 'id')],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
            'level_id' => ['required', 'integer', Rule::exists(Level::class, 'id')],
            'salary_level_id' => ['required', 'integer', Rule::exists(SalaryLevel::class, 'id')],
            'name' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'contact' => ['required', 'numeric', Rule::unique(Employee::class, 'contact')],
            'nationality' => ['required', 'string'],
            'naturality' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(Employee::class, 'email')],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'bi_nr' => ['required', 'string', Rule::unique(Employee::class, 'bi_nr')],
            'bi_validate' => ['required', 'date'],
            'nuit' => ['required', 'numeric', Rule::unique(Employee::class, 'nuit')],
        ]);

        $employee = Employee::create(
            $validated
        );

        return (new EmployeeResource($employee))
            ->response($request)
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load(['branch', 'organic_unit', 'department', 'partition', 'career', 'category', 'level', 'salary_level']);

        return EmployeeResource::make($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'branch_id' => ['required', 'integer', Rule::exists(Branch::class, 'id')],
            'organic_unit_id' => ['required', 'integer', Rule::exists(OrganicUnit::class, 'id')],
            'department_id' => ['required', 'integer', Rule::exists(Department::class, 'id')],
            'partition_id' => ['required', 'integer', Rule::exists(Partition::class, 'id')],
            'career_id' => ['required', 'integer', Rule::exists(Career::class, 'id')],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
            'level_id' => ['required', 'integer', Rule::exists(Level::class, 'id')],
            'salary_level_id' => ['required', 'integer', Rule::exists(SalaryLevel::class, 'id')],
            'name' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'contact' => ['required', 'numeric', Rule::unique(Employee::class, 'contact')->ignore($employee->id)],
            'nationality' => ['required', 'string'],
            'naturality' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(Employee::class, 'email')->ignore($employee->id)],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'bi_nr' => ['required', 'string', Rule::unique(Employee::class, 'bi_nr')->ignore($employee->id)],
            'bi_validate' => ['required', 'date'],
            'nuit' => ['required', 'numeric', Rule::unique(Employee::class, 'nuit')->ignore($employee->id)],
        ]);

        $employee->update($validated);

        return EmployeeResource::make($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json();
    }
}
