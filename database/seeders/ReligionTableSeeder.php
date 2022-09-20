<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religionName = [
            'RC',
            'INC',
            'Aglipay',
            'Born Again',
            'Methodist',
            'Islam',
            'ZLTM',
            'IDBCJ',
            'UCCP',
            'Baptist',
            'Aglipay',
            'Anglican',
            'CAMACOP',
            'Church of Christ',
            'Mormons'
        ];

        $description = [
            'Roman Catholic',
            'Iglesia ni Cristo',
            'Aglipay',
            'Born Again',
            'Methodist',
            'Islam',
            'ZLTM',
            'IDBCJ',
            'UCCP',
            'Baptist',
            'Aglipay',
            'Anglican',
            'CAMACOP',
            'Church of Christ',
            'Mormons'
        ];

        foreach($religionName as $key => $name) {
            Religion::create([
                'name' => $name,
                'description' => $description[$key]
            ]);
        }
    }
}
