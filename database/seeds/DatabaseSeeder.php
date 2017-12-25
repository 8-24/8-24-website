<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HomeSeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(SeoPagesSeeder::class);
        $this->call(LabsPostSeeder::class);
        $this->call(LabCategorySeeder::class);
        $this->call(ProcessingFramesSeeder::class);
    }
}
