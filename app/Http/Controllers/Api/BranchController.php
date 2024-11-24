<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::query()
            ->paginate();

        return BranchResource::collection($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique(Branch::class, 'name')],
            'address' => ['required', 'string', 'min:2', 'max:255'],
        ]);

        $branch = Branch::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);

        return (new BranchResource($branch))
            ->response($request)
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch): JsonResource
    {
        return BranchResource::make($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique(Branch::class, 'name')->ignore($branch->id)],
            'address' => ['required', 'string', 'min:2', 'max:255'],
        ]);

        $branch->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);

        return BranchResource::make($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json();
    }
}
