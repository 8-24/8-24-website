<?php

use Illuminate\Database\Seeder;

class LabsPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Premier Labs Post",
            'slug' => 'premier-labs-post',
            'script_state' => null,
            'script_content' => null,
            'author' => 'Seeder',
            'category_id' => 1,
            //'script_state' => null,
            //'script_content' => null,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Second Labs Post",
            'slug' => 'second-labs-post',
            'script_state' => null,
            'script_content' => null,
            'author' => 'Seeder',
            'category_id' => 2,
            //'script_state' => null,
            //'script_content' => null,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon Deuxièeme Labs Posr</h1> voici mon deuxième post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Troisieme Labs Post",
            'slug' => 'troisi-labs-post',
            'script_state' => null,
            'script_content' => null,
            'author' => 'Seeder',
            'category_id' => 3,
            //'script_state' => null,
            //'script_content' => null,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon Troisième Labs Posr</h1> voici mon troisième post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
    }
}
