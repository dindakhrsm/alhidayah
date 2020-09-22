<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
//use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the posts table
        DB::table('posts')->truncate();

        //generate 10 dummy posts data
        $posts = [];
        $faker = Factory::create();
        //below is based on tut part 2.7 27022020
        $date = Carbon::create(2020, 2, 18, 9);


        for($i = 1; $i <= 10; $i++)
        {
            $image = "Post_Image_" . rand(1, 3) . ".jpeg";
          //  $date = date("Y-m-d H:i:s", strtotime("2020-02-07 08:00:00 + {$i} days")); (before)
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);

            $posts[] =
                [
                    'author_id' => rand(1, 3),
                    'title' => $faker->sentence(rand(8, 12)),
                    'excerpt' => $faker->text(rand(250, 300)),
                    'body' => $faker->paragraphs(rand(10, 15), true),
                    'slug' => $faker->slug(),
                    'image' => rand(0, 1) == 1 ? $image : NULL,
                    /*'created_at' => $date,
                    'updated_at' => $date,*/
                    'created_at' => clone($date),
                    'updated_at' => clone($date),
                    //'published_at' => $i > 5 && rand(0,1) == 0 ? NULL : $publishedDate->addDays($i + 4)
                    'published_at' => $i < 5 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) )

                ];
        }

        DB::table('posts')->insert($posts);
    }
}
