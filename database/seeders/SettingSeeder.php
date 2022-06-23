<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting\Setting::create([

            'title' => "Kaliapara Dakatia Mazeda Mazid High School",
            'description' => "Knowlage Is Power",
            'address' => "Araipara Bazar,Valuka Road,Sakhipur,Tangail",
            'contract' => "01511100752",
            'email' => "info@kapadamam.com",
        ]);
    }
}
