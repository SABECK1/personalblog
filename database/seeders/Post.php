<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post as PostModel;
use App\Models\Comment as CommentModel;
use App\Models\Category as CategoryModel;

class Post extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();


        PostModel::factory(30)->has(CommentModel::factory(15))->has(CategoryModel::factory(5))->for($user)->create();
    }
}
