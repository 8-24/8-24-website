<?php

use Illuminate\Database\Seeder;

class LabCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labs_categories')->insert([
            'keywords' => 'mots clés de creative-coding lab, ma première catégorie labs, creative-coding, 8-24',
            'title' => "Creative Coding",
            'slug' => 'creative-coding',
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => "creative-coding On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte."
        ]);

        DB::table('labs_categories')->insert([
            'keywords' => 'mots clés de photographie labs, ma première catégorie labs, creative-coding, 8-24',
            'title' => "Photographie",
            'slug' => 'photographie',
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => "photo On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte."
        ]);

        DB::table('labs_categories')->insert([
            'keywords' => 'mots clés de graphisme labs, ma première catégorie labs, creative-coding, 8-24',
            'title' => "Graphisme",
            'slug' => 'graphisme',
            'cover' => 'http://lorempicsum.com/futurama/255/200/2',
            'description' => "graphisme On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte."
        ]);
    }
}
