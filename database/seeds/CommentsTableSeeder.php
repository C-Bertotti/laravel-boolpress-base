<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //1.seleziono solo i post pubblicati
        $posts = Post::where('published', 1)->get();
        
        //2. Ciclo su post 
        foreach($posts as $post) {

            //per ognuno dei post creo dei commenti, o no nel caso in cui non ci sia la condizione necessaria per entare nel ciclo;
            for($i = 0; $i < rand(0, 3); $i++) {
                $newComment = new Comment();
                $newComment->post_id = $post->id;
                $newComment->name = $faker->name();
                $newComment->content = $faker->text();
                $newComment->save();
            }
        }
    }
}
