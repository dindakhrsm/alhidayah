<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->truncate();

        $khutbahjumat = new Tag;
        $khutbahjumat->name = "Khutbah Jumat";
        $khutbahjumat->slug = "khutbahjumat";
        $khutbahjumat->save();

        $kajianrutin = new Tag;
        $kajianrutin->name = "Kajian Rutin";
        $kajianrutin->slug = "kajianrutin";
        $kajianrutin->save();

        $sirohnabi = new Tag;
        $sirohnabi->name = "Shiroh Nabi";
        $sirohnabi->slug = "sirohnabi";
        $sirohnabi->save();

        $sirohsahabat = new Tag;
        $sirohsahabat->name = "Shiroh Sahabat";
        $sirohsahabat->slug = "sirohsahabat";
        $sirohsahabat->save();

        $kemuslimahan = new Tag;
        $kemuslimahan->name = "Kemuslimahan";
        $kemuslimahan->slug = "kemuslimahan";
        $kemuslimahan->save();

        $bedahbuku = new Tag;
        $bedahbuku->name = "Bedah Buku";
        $bedahbuku->slug = "bedahbuku";
        $bedahbuku->save();

        $tags = [
            $khutbahjumat->id,
            $kajianrutin->id,
            $sirohnabi->id,
            $sirohsahabat->id,
            $kemuslimahan->id,
            $bedahbuku->id
        ];

        foreach(Post::all() as $post)
        {
            shuffle($tags);

            for($i = 0; $i < rand(0, count($tags)-1); $i++)
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}
