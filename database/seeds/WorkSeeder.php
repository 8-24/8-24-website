<?php

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'keywords' => 'mots clés de mon premier work, mon premier work, work, 8-24',
            'title' => "Premier work",
            'slug' => 'premier-work',
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Work</h1> voici mon premier work : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
    }
}
