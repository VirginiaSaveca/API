<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $employees_count = Employee::count();
        $branches_count = Branch::count();
        $users_count = User::count();

        return view('dashboard', [
            'employees_count' => $employees_count,
            'branches_count' => $branches_count,
            'users_count' => $users_count,
        ]);
    }
}
