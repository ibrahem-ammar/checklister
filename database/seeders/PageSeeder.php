<?php

namespace Database\Seeders;

use App\Models\Admin\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'Welcome',
            'content' => 'welcome content'
        ]);

        Page::create([
            'title' => 'Get Consultion',
            'content' => 'Get Consultion content'
        ]);
    }
}
