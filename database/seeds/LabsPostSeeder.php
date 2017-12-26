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
            'title' => "Creative 1",
            'slug' => 'creative-1',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Creative 1 Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Creative 2",
            'slug' => 'creative-2',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Creative 2 Decsription de mon second post en moins de 300 mots',
            'content' => '<p><h1>Mon deuxième Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Creative 3",
            'slug' => 'creative-3',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Creative 4",
            'slug' => 'creative-4',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Creative 5",
            'slug' => 'creative-5',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier Labs Posr</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);


        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Second Labs Post",
            'slug' => 'second-labs-post',
            'author' => 'Seeder',
            'category_id' => 2,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon Deuxièeme Labs Posr</h1> voici mon deuxième post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
        ]);
        DB::table('labs_posts')->insert([
            'keywords' => 'mots clés de mon premier labs post, mon premier labs post, labs post, 8-24',
            'title' => "Mondrian",
            'slug' => 'mondrian',
            'author' => 'Seeder',
            'category_id' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon Troisième Labs Posr</h1> voici mon troisième post : <iframe src="http://localhost:8000/iframe/mondrian-generator-234" width="100%" height="680" scrolling="no" style="border:0;"></iframe> </p>',
        ]);
    }
}
