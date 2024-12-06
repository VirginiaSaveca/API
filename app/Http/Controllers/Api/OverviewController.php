<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $employees_count = Employee::count();
        $branches_count = Branch::count();
        $users_count = User::count();

        return response()->json([
            'employees_count' => $employees_count,
            'branches_count' => $branches_count,
            'users_count' => $users_count,
        ]
        );
    }
}
