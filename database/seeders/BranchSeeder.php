<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Reitoria',
                'address' => 'Estrada Nacional Nr. 1, Parcela Nr. 76 Distrito de Chongoene-Venhene-Gaza',
            ],
            [
                'name' => 'Maxixe',
                'address' => 'Av. A Boavida s/n-CP 12 Maxixe-Inhambane',
            ], [
                'name' => 'Massinga',
                'address' => 'Av. FPLM. Bairro Cimento Massinga CP 111 Inhambane',
            ],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
