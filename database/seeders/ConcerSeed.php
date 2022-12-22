<?php

namespace Database\Seeders;

use App\Models\Concer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConcerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concer = [
            [
                'concer_name' => 'Konser Ari Lasso Spesial Tahun Baru',
                'slug' => Str::slug('Konser Ari Lasso Spesial Tahun Baru'),
                'poster' => null,
                'price' => '500000',
                'concer_place' => 'Gor Satria',
                'quota' => '3000',
                'sold'  =>  0,
                'concer_time' => '2022-12-31 20:00:00',
                'open_date' => '2022-11-30',
                'close_date' => '2022-12-30',
                'is_active' => 1,
            ],
            [
                'concer_name' => 'Konser Agnes Monica Menyambut Tahun Baru',
                'slug' => Str::slug('Konser Agnes Monica Spesial Tahun Baru'),
                'poster' => null,
                'price' => '500000',
                'concer_place' => 'Stadion GBK',
                'quota' => '3000',
                'sold' => null,
                'concer_time' => '2023-01-01 20:00:00',
                'open_date' => '2022-11-30',
                'close_date' => '2022-12-31',
                'is_active' => 1,
            ]
        ];

        for($i = 0; $i < count($concer); $i++){ 
            Concer::create($concer[$i]); 
        }

    }
}
