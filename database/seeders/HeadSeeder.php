<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting\Head\Head::create([

            'name' => "Md Mostafizur Rahman",
			'designation' => "Engineer",
            'description' => "Null",
            'contract' => "01511100752",
            'email' => "mostafizur@kapadamam.com",
        ]);
    }
}
