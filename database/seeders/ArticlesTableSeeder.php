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
            'newsletter_id' => 1,
            'title' => 'John',
            'description' => "logo",
            'picUrl' => 'yes'
        ]);
        $s1->save();

        $s2 = new \App\Models\Articles([
            'newsletter_id' => 1,
            'title' => 'John',
            'description' => "logo",
            'picUrl' => 'no'
        ]);
        $s2->save();

        $s2 = new \App\Models\Articles([
            'newsletter_id' => 2,
            'title' => 'John Wick',
            'description' => "logo1",
            'picUrl' => 'no no'
        ]);
        $s2->save();
    }
}
