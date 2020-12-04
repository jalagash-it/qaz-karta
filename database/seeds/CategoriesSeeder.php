<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          [  'name_kk' => "Вокзал Әуежай",
             'name_rr' => "Вокзал Аэропорт ",
             'name_en' => "Railways station Airport ",
        ],

        [   'name_kk' => "Асхана",
            'name_rr' => "Столовая",
            'name_en' => "Dining room",
        ],

        [   'name_kk' => "Банкоматтар",
            'name_rr' => "Банкоматы",
            'name_en' => "ATM",

        ],

        [   'name_kk' => "Қонақүйлер",
            'name_rr' => "Гостиницы",
            'name_en' => "Hotels & Hostels",
    ],

       [    'name_kk' => "Дәріханалар",
            'name_rr' => "Аптеки",
            'name_en' => "Pharmacy",
       ],

            
        ]);
    }
}
