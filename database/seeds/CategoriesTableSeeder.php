<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title'=> 'Info Kegiatan',
                'slug' => 'info-kegiatan'
            ],

            [
                'title' => 'Resume Ceramah',
                'slug' => 'resume-ceramah'
            ],

            [
                'title' => 'Shahibul Hikayat',
                'slug' => 'shahibul-hikayat'
            ],

            [
                'title' => 'Shiroh Nabi dan Sahabat',
                'slug' => 'shiroh-nabi-dan-sahabat'
                ],

            [
                'title' => 'Laporan Keuangan',
                'slug' => 'laporan-keuangan'

            ],

        ]);
        //update the posts data
        for($post_id = 1; $post_id <= 10; $post_id++){
            $category_id = rand(1, 5);
            DB::table('posts')
                ->where('id', $post_id)
                ->update(['category_id' => $category_id]);
        }
    }
}
