<?php

use Illuminate\Database\Seeder;

class SeoPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page home',
            'title' => "Home",
            'slug' => '/',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page home'
        ]);
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page works',
            'title' => "Works",
            'slug' => 'works',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page works'
        ]);
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page blog',
            'title' => "Blog",
            'slug' => 'blog',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page blog'
        ]);
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page contact',
            'title' => "Contact",
            'slug' => 'contact',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page contact'
        ]);
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page labs',
            'title' => "Labs",
            'slug' => 'labs',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page labs'
        ]);
        DB::table('seo_pages')->insert([
            'keywords' => 'mots clés de ma page error 404',
            'title' => "Error 404",
            'slug' => 'error-404',
            'cover_pic_vid' => 1,
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => 'Description SEO de ma page error 404'
        ]);


    }
}
