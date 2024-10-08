<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // GERD
            [
                'penyakit_id' => 1,
                'gejala_id' => 1,
                'value_cf' => 1
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 11,
                'value_cf' => 0.2
            ],
            [
            'penyakit_id' => 1,
            'gejala_id' => 12,
            'value_cf' => 0.6
            ],
            [
            'penyakit_id' => 1,
            'gejala_id' => 13,
            'value_cf' => 0.8
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 19,
                'value_cf' => 0.2
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 20,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 21,
                'value_cf' => 0.8
            ],
            [
                'penyakit_id' => 1,
                'gejala_id' => 22,
                'value_cf' => 0.2
            ],
            // Dispepsia
            [
                'penyakit_id' => 2,
                'gejala_id' => 1,
                'value_cf' => 1
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 2,
                'value_cf' => 0.4
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 5,
                'value_cf' => 0.2
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 6,
                'value_cf' => 0.2
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 7,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 15,
                'value_cf' => 0.8
            ],
            [
                'penyakit_id' => 2,
                'gejala_id' => 16,
                'value_cf' => 0.4
            ],


            // Tukak lambung
            [
                'penyakit_id' => 3,
                'gejala_id' => 1,
                'value_cf' => 1
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 2,
                'value_cf' => 0.4
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 3,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' =>4,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 9,
                'value_cf' => 0.8
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 10,
                'value_cf' => 1
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 14,
                'value_cf' => 0.4
            ],
            [
                'penyakit_id' => 3,
                'gejala_id' => 17,
                'value_cf' => 0.8
            ],

            // Gastritis
            [
                'penyakit_id' => 4,
                'gejala_id' => 1,
                'value_cf' => 1
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 2,
                'value_cf' => 0.4
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 3,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 4,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 5,
                'value_cf' => 0.2
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 6,
                'value_cf' => 0.2
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 8,
                'value_cf' => 0.6
            ],
            [
                'penyakit_id' => 4,
                'gejala_id' => 18,
                'value_cf' => 0.2
            ],




        ];

        DB::table('gejala_penyakit')->insert($data);
    }
}
