<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Career;
use App\Models\Category;
use App\Models\Department;
use App\Models\Level;
use App\Models\OrganicUnit;
use App\Models\Partition;
use App\Models\SalaryLevel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeSelectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $branches = Branch::query()->get(['name', 'id']);
        $organic_units = OrganicUnit::query()->get(['name', 'id']);
        $departments = Department::query()->get(['name', 'id']);
        $partitions = Partition::query()->get(['name', 'id']);
        $careers = Career::query()->get(['name', 'id']);
        $categories = Category::query()->get(['name', 'id']);
        $levels = Level::query()->get(['name', 'id']);
        $salary_levels = SalaryLevel::query()->get(['level', 'id']);

        return response()->json([
            'branches' => $branches,
            'organic_units' => $organic_units,
            'departments' => $departments,
            'partitions' => $partitions,
            'careers' => $careers,
            'categories' => $categories,
            'levels' => $levels,
            'salary_levels' => $salary_levels,
        ]);
    }
}
