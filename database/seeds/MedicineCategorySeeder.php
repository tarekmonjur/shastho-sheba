<?php

use App\Models\MedicineCategory;
use Illuminate\Database\Seeder;

class MedicineCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicineCategory::insert([
            ['parent_id' => 0, 'category_name' => 'Prescription',       'category_slug' => 'prescriptions',         'category_image' => 'prescriptions.jpeg', 'is_feature' => 'no', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 0, 'category_name' => 'Non Prescription',   'category_slug' => 'non-prescriptions',     'category_image' => 'non-prescriptions.jpeg', 'is_feature' => 'no', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Anti Diabetic',      'category_slug' => 'anti-diabetic',         'category_image' => 'anti-diabetic.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Anti Histamine',     'category_slug' => 'anti-histamine',        'category_image' => 'anti-histamine.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Anti Ulcer',         'category_slug' => 'anti-ulcer',            'category_image' => 'anti-ulcer.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Anti Hypertensive',  'category_slug' => 'anti-hypertensive',     'category_image' => 'anti-hypertensive.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Cardiac',            'category_slug' => 'cardiac',               'category_image' => 'cardiac.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Cephalosporin Antibiotic', 'category_slug' => 'cephalosporin-antibiotic','category_image' => 'cephalosporin-antibiotic.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Macrolide Antibiotic', 'category_slug' => 'macrolide-antibiotic','category_image' => 'macrolide-antibiotic.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'NSAID',              'category_slug' => 'nsaid',                 'category_image' => 'nsaid.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Anticonvulsant',     'category_slug' => 'anticonvulsant',        'category_image' => 'anticonvulsant.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 1, 'category_name' => 'Analgesic',          'category_slug' => 'analgesic',             'category_image' => 'analgesic.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 2, 'category_name' => 'OTC',                'category_slug' => 'otc',                   'category_image' => 'otc.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 2, 'category_name' => 'Diabetes',           'category_slug' => 'diabetes',              'category_image' => 'diabetes.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
            ['parent_id' => 2, 'category_name' => 'Personal Care',      'category_slug' => 'personal-care',         'category_image' => 'personal-care.jpeg', 'is_feature' => 'yes', 'is_top' => 'no', 'category_status'=> 'active'],
        ]);
    }
}
