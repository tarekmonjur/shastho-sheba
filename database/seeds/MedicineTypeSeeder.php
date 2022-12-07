<?php

use App\Models\MedicineType;
use Illuminate\Database\Seeder;

class MedicineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicineType::insert([
            ['type_name' => 'Tablet'],
            ['type_name' => 'Capsule'],
            ['type_name' => 'Syrup'],
            ['type_name' => 'Injectable'],
            ['type_name' => 'Drop'],
            ['type_name' => 'Cream'],
            ['type_name' => 'Gel'],
            ['type_name' => 'Lotion'],
            ['type_name' => 'Suppositories'],
            ['type_name' => 'Suspention'],
            ['type_name' => 'Nebulizer'],
            ['type_name' => 'Inhaler'],
            ['type_name' => 'Spray'],
            ['type_name' => 'Insulin'],
            ['type_name' => 'Others'],
            ['type_name' => 'Penfill'],
            ['type_name' => 'Ointment'],
        ]);
    }
}
