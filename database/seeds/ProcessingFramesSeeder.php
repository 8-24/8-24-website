<?php

use Illuminate\Database\Seeder;

class ProcessingFramesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('processing_frames')->insert([
            'title' => "Mondiran Generator",
            'slug' => "mondrian-generator-234",
            'script' => "p5.disableFriendlyErrors = true;function setup(){createCanvas(window.innerWidth, window.innerHeight, WEBGL);
            background(0);
            }
            var r = 0;
            function draw(){
                stroke(255);
                fill(255);
                rect(100 , 100, 100, 100 - r );
            r += 1;
            }"]);
    }
}
