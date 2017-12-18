<?php

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->insert([
            'category' => 1,
            'keywords' => 'mots clés de mon premier post, mon premier post, post, 8-24',
            'title' => "Premier Post",
            'slug' => 'premier-post',
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Decsription de mon premier post en moins de 300 mots',
            'content' => '<p><h1>Mon premier post</h1> voici mon premier post : <iframe width="560" height="315" src="https://www.youtube.com/embed/8NtADkilQdM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> </p>',
            'author' => 'Seeder'
        ]);
    }
}
