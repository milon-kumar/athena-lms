<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        BusinessSetting::insert(
            [
                ['type'=>'home_page_title','value'=>'Oraska LMS'],
                ['type'=>'home_page_sub_title','value'=>'Oraska Sub Description Here'],
            ]
        );
    }
}
