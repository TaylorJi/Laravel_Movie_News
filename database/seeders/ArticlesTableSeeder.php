<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s1 = new \App\Models\Articles([
            'title' => 'John',
            'description' => "logo",
            'picUrl' => 1
        ]);
        $s1->save();

        $s2 = new \App\Models\Articles([
            'title' => 'John',
            'description' => "logo",
            'picUrl' => 1
        ]);
        $s2->save();
    }
}
