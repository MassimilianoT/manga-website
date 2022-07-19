<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$mangas = \App\Models\Manga::factory(12)->create();
                //$categories = \App\Models\Category::factory(10)->create();
                //foreach ($categories as $category){
               //     $category->mangas()->attach($mangas[rand(1,11)]);
                //}
                //\App\Models\Chapter::factory(10)->create(['manga_id' => 1]);
                //\App\Models\Chapter::factory(10)->create(['manga_id' => 2]);
        \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'isAdmin' => true,
            'avatar' => '/images/avatar.png',

        ]);
        \App\Models\Category::factory(10)->create();
        //Pulisco tutte le directories
        try{
            File::deleteDirectory(public_path('avatars/'));
            File::deleteDirectory(public_path('mangacovers/'));
            File::deleteDirectory(public_path('mangas/'));
        }
        catch(\Exception $e){
            print($e);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
