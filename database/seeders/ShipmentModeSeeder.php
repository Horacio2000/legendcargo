<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShipmentMode;

class ShipmentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Créez les types d'expédition

        // Mode aérien
        ShipmentMode::create([
            'name' => 'Aérien',
        ]);

        // Mode maritime
        ShipmentMode::create([
            'name' => 'Maritime',
        ]);
    }
}
