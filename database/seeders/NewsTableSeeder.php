<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $title = "John";
        // $logoUrl = "logo";
        // $is_active = 1;
        // $newsletter = News::where('title', '=', $title)->first();
        // if ($newsletter === null) {
        //     $user = News::create([
        //         'title' => $title,
        //         'logoUrl' => $logoUrl,
        //         'is_active' => $is_active,
        //     ]);
        // }

        $s1 = new \App\Models\News([
            'title' => 'John',
            'logoUrl' => "logo",
            'is_active' => 1
        ]);
        $s1->save();

        $s2 = new \App\Models\News([
            'title' => 'Johny',
            'logoUrl' => "logio",
            'is_active' => 1
        ]);
        $s2->save();

    }
}
