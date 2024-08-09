<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class CreateGejalaSeeder extends Seeder
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
                'nama' => 'Nyeri Ulu Hati',
                'kode' => 'G1'
            ],
            [
                'nama' => 'Mual',
                'kode' => 'G2'
            ],
            [
                'nama' => 'Muntah',
                'kode' => 'G3'
            ],
            [
                'nama' => 'Perut Sakit Secara Keseluruhan',
                'kode' => 'G4'
            ],
            [
                'nama' => 'Pusing',
                'kode' => 'G5'
            ],
            [
                'nama' => 'Lemah Letih Lesu',
                'kode' => 'G6'
            ],
            [
                'nama' => 'Perut kembung',
                'kode' => 'G7'
            ],
            [
                'nama' => 'Nafsu Makan Berkurang',
                'kode' => 'G8'
            ],
            [
                'nama' => 'Berat Badan Turun',
                'kode' => 'G9'
            ],
            [
                'nama' => 'Muntah Darah',
                'kode' => 'G10'
            ],
            [
                'nama' => 'Suara Serak',
                'kode' => 'G11'
            ],
            [
                'nama' => 'Disfagia (Sulit Menelan)',
                'kode' => 'G12'
            ],
            [
                'nama' => 'Odinofagia (Nyeri saat Menelan)',
                'kode' => 'G13'
            ],
            [
                'nama' => 'Sendawa',
                'kode' => 'G14'
            ],
            [
                'nama' => 'Nyeri Dada',
                'kode' => 'G15'
            ],
            [
                'nama' => 'Mudah Kenyang',
                'kode' => 'G16'
            ],
            [
                'nama' => 'Sesak Nafas',
                'kode' => 'G17'
            ],
            [
                'nama' => 'Makan tidak teratur',
                'kode' => 'G18'
            ],
            [
                'nama' => 'Mulut pahit',
                'kode' => 'G19'
            ],
            [
                'nama' => 'Obesitas',
                'kode' => 'G20'
            ],
            [
                'nama' => 'Rasa terbakar di dada/tenggorokan',
                'kode' => 'G21'
            ],
            [
                'nama' => 'Batuk',
                'kode' => 'G22'
            ]
        ];

        Gejala::insert($data);
    }
}

