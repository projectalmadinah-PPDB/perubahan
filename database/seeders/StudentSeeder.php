<?php

namespace Database\Seeders;

use App\Models\Generasi;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $users = User::skip(1)->take(25)->get();
        
    //     foreach ($users as $user)
    //     {
    //         Student::factory()->create([
    //             'user_id' => $user->id,
    //         ]);
    //     }
        
    //     $this->connectStudentWithGeneration();
    // }

    // private function connectStudentWithGeneration()
    // {
    //     $students = Student::all();
    //     $generations = Generasi::all();

    //     foreach ($students as $student)
    //     {
    //         $student->update(['generasi_id' => $generations->random()->id]);
    //     }
    // }

    public function run(): void
    {
        $users = User::skip(1)->take(25)->get();
        $generations= Generasi::all();

        foreach ($users as $user)
        {
            $student = Student::factory()->create([
                'user_id' => $user->id,
            ]);

            // Hubungkan siswa dengan sebuah generasi secara acak
            // $student->generasi()->associate($generations->random())->save();
        }
    }

    private function connectStudentWithGeneration()
    {
        $students = Student::all();
        $generations = Generasi::all();

        foreach ($students as $student)
        {
            $student->update(['generasi_id' => $generations->random()->id]);
        }
    }
}
