<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganicUnitResource;
use App\Models\Branch;
use App\Models\OrganicUnit;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class OrganicUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organic_units = OrganicUnit::query()
            ->paginate();

        return OrganicUnitResource::collection($organic_units);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique(OrganicUnit::class, 'name')],
            'branches' => ['nullable', 'array'],
            'branches.*' => ['numeric', Rule::exists(Branch::class, 'id')],
        ]);

        try {
            DB::beginTransaction();

            $organic_unit = OrganicUnit::create([
                'name' => $validated['name'],
            ]);

            $request->whenFilled('branches', function ($branches) use ($organic_unit) {
                foreach ($branches as $key => $branch) {
                    $organic_unit->branches()->attach($branch);
                }
            });
            DB::commit();

            return (new OrganicUnitResource($organic_unit))
                ->response($request)
                ->setStatusCode(Response::HTTP_CREATED);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message' => $th->getMessage()], status: Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganicUnit $organic_unit)
    {
        return OrganicUnitResource::make($organic_unit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrganicUnit $organic_unit)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique(OrganicUnit::class, 'name')->ignore($organic_unit->id)],
            'branches' => ['nullable', 'array'],
            'branches.*' => ['numeric', Rule::exists(Branch::class, 'id')],
        ]);

        try {
            DB::beginTransaction();

            $organic_unit->update([
                'name' => $validated['name'],
            ]);

            $request->whenFilled('branches', function ($branches) use ($organic_unit) {
                $organic_unit->branches()->detach();

                foreach ($branches as $key => $branch) {
                    $organic_unit->branches()->attach($branch);
                }
            });
            DB::commit();

            return OrganicUnitResource::make($organic_unit);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message' => $th->getMessage()], status: Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganicUnit $organic_unit)
    {
        $organic_unit->delete();

        return response()->json();
    }
}
