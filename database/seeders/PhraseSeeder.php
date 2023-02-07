<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phrases')->insert([
            'phrase' => 'Soy una frase',
            'author' => 'Yo',
            'image' => 'https://www.nationalgeographic.com.es/medio/2023/01/12/imagen-de-un-atomo_952cc086_230112124807_1280x988.jpg',
            'created_at' => '2020/01/01'

        ]);
    }
}
