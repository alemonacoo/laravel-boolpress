<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;
 

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['Azione', 'Avventura', 'Sci-Fi', 'Giallo', 'Thriller', 'Horror', 'Romantico', 'Altro'];

        foreach($tags as $model){
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($tag->name);
            $tag->save();



        }
    }
}
