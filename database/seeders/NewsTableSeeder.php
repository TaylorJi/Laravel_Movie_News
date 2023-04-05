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
            'title' => 'Global News',
            'logoUrl' => "https://globalnews.ca/wp-content/themes/shaw-globalnews/_img/logos/dark/bc_2x.png",
            'is_active' => 1
        ]);
        $s1->save();

        $s2 = new \App\Models\News([
            'title' => 'Movie News',
            'logoUrl' => "https://logopond.com/logos/dae90504146a4ed356e9a2c0923de4c9.png",
            'is_active' => 1
        ]);
        $s2->save();

    }
}
