<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rule;

class CreateRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_penyakit' => 'P1',
                'G1' => true,
                'G11' => true,
                'G12' => true,
                'G13' => true,
                'G14' => true,
                'G19' => true,
                'G20' => true,
                'G21' => true,
                'G22' => true
            ],
            [
                'kode_penyakit' => 'P2',
                'G1' => true,
                'G2' => true,
                'G3' => true,
                'G6' => true,
                'G7' => true,
                'G15' => true,
                'G16' => true

            ],
            [
                'kode_penyakit' => 'P3',
                'G1' => true,
                'G2' => true,
                'G3' => true,
                'G6' => true,
                'G7' => true,
                'G8' => true,
                'G18' => true

            ],
            [
                'kode_penyakit' => 'P4',
                'G1' => true,
                'G2' => true,
                'G4' => true,
                'G5' => true,
                'G9' => true,
                'G10' => true,
                'G17' => true
            ],

        ];

        foreach($data as $row) {
            Rule::create($row);
        }
    }
}
