<?php

namespace Database\Seeders;

use App\Models\Generasi;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $generations = [
    //         [
    //             'generasi'   => '2021',
    //             'status'     => 'on',
    //             'start_at'   => '2020-09-01',
    //             'end_at' => '2021-08-31'
    //         ],
    //         [
    //             'generasi'   => '2022',
    //             'status'     => 'on',
    //             'start_at'   => '2021-09-01',
    //             'end_at' => '2022-08-31'
    //         ],
    //         [
    //             'generasi'   => '2023',
    //             'status'     => 'on',
    //             'start_at'   => '2022-09-01',
    //             'end_at' => '2023-08-31'
    //         ]
    //     ];

    //     foreach ($generations as $generation)
    //     {
    //         $generation = Generasi::create($generation);

    //         $this->addStudentWithGeneration($generation);
    //     }
    // }

    // private function addStudentWithGeneration(Generasi $generation)
    // {
    //     Student::factory()
    //     ->count(7)
    //     ->create(['generasi_id' => $generation->id]);
    // }

    public function run(): void
    {
        $generations = [
            [
                'generasi'   => '2021',
                'status'     => 'on',
                'start_at'   => '2020-09-01',
                'end_at' => '2021-08-31'
            ],
            [
                'generasi'   => '2022',
                'status'     => 'on',
                'start_at'   => '2021-09-01',
                'end_at' => '2022-08-31'
            ],
            [
                'generasi'   => '2023',
                'status'     => 'on',
                'start_at'   => '2022-09-01',
                'end_at' => '2023-08-31'
            ]
        ];
        
        foreach ($generations as $generation)
        {
            Generasi::create($generation);
        }
    }
}
