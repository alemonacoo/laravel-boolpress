<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for($i = 0; $i < 20; $i++){
            $post = new Post();
            $post->title = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $post->content = $faker->text();

            $slug = Str::slug($post->title);

            //slug di partenza 
            $slug_base = $slug;

            $counter = 1;

            //cerca un post che abbia slug uguale a slug appena creato 
            $existingPost = Post::where('slug', $slug)->first();

            //fintanto che esiste un post con slug selezionato  
            while($existingPost){
                // incrementiamo slug con counter 
                $slug = $slug_base . '_' . $counter;
                $existingPost = Post::where('slug', $slug)->first();
                $counter++;
            }

            $post->slug = $slug;
            $post->save();
        }
    }
}
