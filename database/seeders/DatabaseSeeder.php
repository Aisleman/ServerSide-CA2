<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        // Get the first user (or create one if needed)
        $user = User::first(); // You can change this logic to fetch any specific user

        if (!$user) {
            // If no user exists, create a default one
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Create a post with the correct user_id
        Post::create([
            'slug' => 'a-new-post',
            'title' => 'A new Post',
            'description' => 'A nice Description',
            'image_path' => 'iahuhasas',
            'user_id' => $user->id, // Correct way to assign user_id
        ]);

    }
}
